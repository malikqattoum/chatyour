<?php
$result = array();
$result['success'] = false;
$result['error_message'] = Registry::load('strings')->went_wrong;
$result['error_key'] = 'something_went_wrong';

if (role(['permissions' => ['coins' => 'coins']])) {

    $result['error_message'] = Registry::load('strings')->invalid_value;
    $result['error_key'] = 'invalid_value';
    $result['error_variables'] = [];

    $max_input_vars = ini_get('max_input_vars');

    include 'fns/filters/load.php';
    include 'fns/files/load.php';

    $noerror = true;
    $disabled = 0;

    if (!isset($data['name']) || empty($data['name'])) {
        $result['error_variables'][] = ['name'];
        $noerror = false;
    }
    if (!isset($data['coins']) || empty($data['coins'])) {
        $result['error_variables'][] = ['coins'];
        $noerror = false;
    }

    if (!isset($data['price']) || empty($data['price'])) {
        $result['error_variables'][] = ['price'];
        $noerror = false;
    }

    if (!isset($data['description']) || empty($data['description'])) {
        $result['error_variables'][] = ['description'];
        $noerror = false;
    }

    // if ((int)$max_input_vars < 1999) {
    //     $result['error_message'] = 'Increase the max_input_vars limit in your server php.ini to 3000 or higher.';
    //     $result['error_key'] = 'max_input_vars_exceeded';
    //     $result['error_variables'] = [];
    //     $noerror = false;
    // }

    if ($noerror) {
        $data['name'] = htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8');

        if (isset($data['active']) && $data['active'] == 1) {
            $isActive = 1;
        }

        DB::connect()->insert("coin_packages", [
            "name" => $data['name'],
            "coins" => $data['coins'],
            "price" => $data['price'],
            "description" => $data['description'],
            "active" => $isActive,
            "created_at" => Registry::load('current_user')->time_stamp,
        ]);

        if (!DB::connect()->error) {

            $package_id = DB::connect()->id();
            $insert_data = array();
            $columns = [
                'coin_packages.string_id', 'coin_packages.string_constant',
                'coin_packages.string_value', 'coin_packages.string_type',
                'coin_packages.skip_update', 'coin_packages.skip_cache'
            ];

            $where["coin_packages.package_id"] = 1;
            $strings = DB::connect()->select('coin_packages', $columns, $where);

            $i = 0;
            foreach ($strings as $string) {
                $string_field = 'string_'.$string['string_id'];
                $string_constant = $string['string_constant'];
                $insert_data[$i]['string_constant'] = $string['string_constant'];
                $insert_data[$i]['string_type'] = $string['string_type'];
                $insert_data[$i]['skip_update'] = $string['skip_update'];
                $insert_data[$i]['skip_cache'] = $string['skip_cache'];
                $insert_data[$i]['package_id'] = $package_id;

                if (isset($importjson->$string_constant) && !empty($importjson->$string_constant)) {
                    $insert_data[$i]['string_value'] = $importjson->$string_constant;
                } else if (isset($data[$string_field]) && !empty($data[$string_field])) {
                    $insert_data[$i]['string_value'] = htmlspecialchars($data[$string_field], ENT_QUOTES, 'UTF-8');
                } else {
                    $insert_data[$i]['string_value'] = $string['string_value'];
                }

                $i = $i+1;
            }

            if (!empty($insert_data)) {
                DB::connect()->insert('coin_packages', $insert_data);
            }

            if (isset($_FILES['icon']['name']) && !empty($_FILES['icon']['name'])) {
                if (isImage($_FILES['icon']['tmp_name'])) {

                    $extension = pathinfo($_FILES['icon']['name'])['extension'];
                    $filename = $package_id.Registry::load('config')->file_seperator.random_string(['length' => 6]).'.'.$extension;

                    if (files('upload', ['upload' => 'icon', 'folder' => 'languages', 'saveas' => $filename])['result']) {
                        files('resize_img', ['resize' => 'coins/'.$filename, 'width' => 150, 'height' => 150, 'crop' => true]);
                    }

                }
            }

            $result = array();
            $result['success'] = true;
            $result['todo'] = 'reload';
            $result['reload'] = 'coin_package';

        } else {
            $result['error_message'] = Registry::load('strings')->went_wrong;
            $result['error_key'] = 'something_went_wrong';
        }

    }
}
?>