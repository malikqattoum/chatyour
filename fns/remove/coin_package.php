<?php

$result = array();
$noerror = true;

$result['success'] = false;
$result['error_message'] = Registry::load('strings')->went_wrong;
$result['error_key'] = 'something_went_wrong';
$package_ids = [];

if (role(['permissions' => ['coins' => 'coins']])) {

    if (isset($data['package_id'])) {
        if (!is_array($data['package_id'])) {
            $data["package_id"] = filter_var($data["package_id"], FILTER_SANITIZE_NUMBER_INT);
            $package_ids[] = $data["package_id"];
        } else {
            $package_ids = array_filter($data["package_id"], 'ctype_digit');
        }
    }

    if (!empty($package_ids)) {
        DB::connect()->delete("coin_packages", ["package_id" => $package_ids]);

        if (!DB::connect()->error) {

            foreach ($package_ids as $package_id) {
                foreach (glob("assets/files/coins/".$package_id.Registry::load('config')->file_seperator."*.*") as $oldimage) {
                    unlink($oldimage);
                }
            }

            $result = array();
            $result['success'] = true;
            $result['todo'] = 'reload';
            $result['reload'] = ['coin_package'];

        } else {
            $result['error_message'] = Registry::load('strings')->went_wrong;
            $result['error_key'] = 'something_went_wrong';
        }
    }
}
?>