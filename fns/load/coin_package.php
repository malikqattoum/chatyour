<?php

if (role(['permissions' => ['coins' => 'coins']])) {

    $columns = [
        'coin_packages.package_id', 'coin_packages.name', 'coin_packages.description',
        'coin_packages.price', 'coin_packages.coins', 'coin_packages.active'
    ];

    if (!empty($data["offset"])) {
        $data["offset"] = array_map('intval', explode(',', $data["offset"]));
        $where["coin_packages.package_id[!]"] = $data["offset"];
    }

    if (!empty($data["search"])) {
        $where["coin_packages.name[~]"] = $data["search"];
    }

    $where["LIMIT"] = Registry::load('settings')->records_per_call;

    if ($data["sortby"] === 'name_asc') {
        $where["ORDER"] = ["coin_packages.name" => "ASC"];
    } else if ($data["sortby"] === 'name_desc') {
        $where["ORDER"] = ["coin_packages.name" => "DESC"];
    } else {
        $where["ORDER"] = ["coin_packages.package_id" => "DESC"];
    }

    $coin_packages = DB::connect()->select('coin_packages', $columns, $where);

    $i = 1;
    $output = array();
    $output['loaded'] = new stdClass();
    $output['loaded']->title = Registry::load('strings')->coins_packages;
    $output['loaded']->offset = array();
    $output['loaded']->loaded = 'coin_package';

    // if (role(['permissions' => ['coin_packages' => 'delete']])) {

        $output['multiple_select'] = new stdClass();
        $output['multiple_select']->title = Registry::load('strings')->delete;
        $output['multiple_select']->attributes['class'] = 'ask_confirmation';
        $output['multiple_select']->attributes['data-remove'] = 'coin_package';
        $output['multiple_select']->attributes['multi_select'] = 'package_id';
        $output['multiple_select']->attributes['submit_button'] = Registry::load('strings')->yes;
        $output['multiple_select']->attributes['cancel_button'] = Registry::load('strings')->no;
        $output['multiple_select']->attributes['confirmation'] = Registry::load('strings')->confirm_action;
    // }

    // if (role(['permissions' => ['coin_packages' => 'create']])) {
        $output['todo'] = new stdClass();
        $output['todo']->class = 'load_form';
        $output['todo']->title = 'Add Package';
        $output['todo']->attributes['form'] = 'coin_package';
    // }


    if (!empty($data["offset"])) {
        $output['loaded']->offset = $data["offset"];
    }

    $output['sortby'][1] = new stdClass();
    $output['sortby'][1]->sortby = Registry::load('strings')->sort_by_default;
    $output['sortby'][1]->class = 'load_aside';
    $output['sortby'][1]->attributes['load'] = 'coin_package';

    $output['sortby'][2] = new stdClass();
    $output['sortby'][2]->sortby = Registry::load('strings')->name;
    $output['sortby'][2]->class = 'load_aside sort_asc';
    $output['sortby'][2]->attributes['load'] = 'coin_package';
    $output['sortby'][2]->attributes['sort'] = 'name_asc';

    $output['sortby'][3] = new stdClass();
    $output['sortby'][3]->sortby = Registry::load('strings')->name;
    $output['sortby'][3]->class = 'load_aside sort_desc';
    $output['sortby'][3]->attributes['load'] = 'coin_package';
    $output['sortby'][3]->attributes['sort'] = 'name_desc';

    foreach ($coin_packages as $package) {
        $output['loaded']->offset[] = $package['package_id'];

        $output['content'][$i] = new stdClass();
        $output['content'][$i]->image = get_image(['from' => 'coin_package', 'search' => $package['package_id']]);
        $output['content'][$i]->title = $package['name'];
        $output['content'][$i]->class = "coin_packages";
        $output['content'][$i]->identifier = $package['package_id'];

        $output['content'][$i]->subtitle = $package['description']. ' | Price: '.$package['price'].' | Coins: '.$package['coins'].' | Status: '.($package['active']? 'Active' :'Inactive');

        $output['content'][$i]->icon = 0;
        $output['content'][$i]->unread = 0;

        if(role(['permissions' => ['coins' => 'purchase_coin_packages']])){
            $output['options'][$i][1] = new stdClass();
            $output['options'][$i][1]->option = Registry::load('strings')->buy;
            $output['options'][$i][1]->class = 'load_aside';
            $output['options'][$i][1]->attributes['load'] = 'coin_buy_package';
            $output['options'][$i][1]->attributes['data-package_id'] = $package['package_id'];
        }


        if (role(['permissions' => ['groups' => 'super_privileges']])) {
            $output['options'][$i][2] = new stdClass();
            $output['options'][$i][2]->option = Registry::load('strings')->edit;
            $output['options'][$i][2]->class = 'load_form';
            $output['options'][$i][2]->attributes['form'] = 'coin_package';
            $output['options'][$i][2]->attributes['data-package_id'] = $package['package_id'];
        }

        // if (role(['permissions' => ['coin_packages' => 'export']])) {
            // $output['options'][$i][3] = new stdClass();
            // $output['options'][$i][3]->option = Registry::load('strings')->export;
            // $output['options'][$i][3]->class = 'download_file';
            // $output['options'][$i][3]->attributes['download'] = 'language';
            // $output['options'][$i][3]->attributes['data-package_id'] = $package['package_id'];
        // }

        if (role(['permissions' => ['groups' => 'super_privileges']])) {
            $output['options'][$i][4] = new stdClass();
            $output['options'][$i][4]->option = Registry::load('strings')->delete;
            $output['options'][$i][4]->class = 'ask_confirmation';
            $output['options'][$i][4]->attributes['data-remove'] = 'coin_package';
            $output['options'][$i][4]->attributes['data-package_id'] = $package['package_id'];
            $output['options'][$i][4]->attributes['submit_button'] = Registry::load('strings')->yes;
            $output['options'][$i][4]->attributes['cancel_button'] = Registry::load('strings')->no;
            $output['options'][$i][4]->attributes['confirmation'] = Registry::load('strings')->confirm_action;
        }

        $i++;
    }
}
?>