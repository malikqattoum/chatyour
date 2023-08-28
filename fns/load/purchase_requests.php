<?php

if (role(['permissions' => ['coins' => 'coins']]) && role(['permissions' => ['groups' => 'super_privileges']])) {

    $columns = [
        'purchased_packages.user_id', 'purchased_packages.purchase_id', 'purchased_packages.package_id',
        'purchased_packages.package_price', 'purchased_packages.purchase_date', 'purchased_packages.status',
        "site_users.display_name", "site_users.email_address", "coin_packages.name(package_name)", "coin_packages.coins"
    ];

    if (!empty($data["offset"])) {
        $data["offset"] = array_map('intval', explode(',', $data["offset"]));
        $where["purchased_packages.package_id[!]"] = $data["offset"];
    }

    if (!empty($data["search"])) {
        $where["site_users.display_name[~]"] = $data["search"];
    }

    $where["LIMIT"] = Registry::load('settings')->records_per_call;

    if ($data["sortby"] === 'name_asc') {
        $where["ORDER"] = ["site_users.display_name" => "ASC"];
    } else if ($data["sortby"] === 'name_desc') {
        $where["ORDER"] = ["site_users.display_name" => "DESC"];
    } else {
        $where["ORDER"] = ["purchased_packages.purchase_id" => "DESC"];
    }

    $join["[>]site_users"] = ['purchased_packages.user_id' => 'user_id'];
    $join["[>]coin_packages"] = ['purchased_packages.package_id' => 'package_id'];

    $purchased_packages = DB::connect()->select('purchased_packages', $join, $columns, $where);

    $i = 1;
    $output = array();
    $output['loaded'] = new stdClass();
    $output['loaded']->title = Registry::load('strings')->purchase_requests;
    $output['loaded']->offset = array();
    $output['loaded']->loaded = 'purchase_requests';


    if (!empty($data["offset"])) {
        $output['loaded']->offset = $data["offset"];
    }

    $output['sortby'][1] = new stdClass();
    $output['sortby'][1]->sortby = Registry::load('strings')->purchase_requests;
    $output['sortby'][1]->class = 'load_aside';
    $output['sortby'][1]->attributes['load'] = 'purchase_requests';

    $output['sortby'][2] = new stdClass();
    $output['sortby'][2]->sortby = Registry::load('strings')->name;
    $output['sortby'][2]->class = 'load_aside sort_asc';
    $output['sortby'][2]->attributes['load'] = 'purchase_requests';
    $output['sortby'][2]->attributes['sort'] = 'name_asc';

    $output['sortby'][3] = new stdClass();
    $output['sortby'][3]->sortby = Registry::load('strings')->name;
    $output['sortby'][3]->class = 'load_aside sort_desc';
    $output['sortby'][3]->attributes['load'] = 'purchase_requests';
    $output['sortby'][3]->attributes['sort'] = 'name_desc';

    foreach ($purchased_packages as $purchase_request) {
        $output['loaded']->offset[] = $purchase_request['user_id'];

        $output['content'][$i] = new stdClass();
        $output['content'][$i]->image = get_image(['from' => 'site_users/profile_pics', 'search' => $purchase_request['user_id']]);
        $output['content'][$i]->title = 'User: '.$purchase_request['display_name'].' Email: '.$purchase_request['email_address'];
        $output['content'][$i]->class = "purchased_packages";
        $output['content'][$i]->identifier = $purchase_request['purchase_id'];

        $output['content'][$i]->subtitle = 'Package: '.$purchase_request['package_name'].' | Status: '.$purchase_request['status'].' | Coins: '.$purchase_request['coins'];

        $output['content'][$i]->icon = 0;
        $output['content'][$i]->unread = 0;

        $output['options'][$i][1] = new stdClass();
        $output['options'][$i][1]->option = Registry::load('strings')->edit;
        $output['options'][$i][1]->class = 'load_form';
        $output['options'][$i][1]->attributes['form'] = 'purchase_requests';
        $output['options'][$i][1]->attributes['data-purchase_id'] = $purchase_request['purchase_id'];

        $i++;
    }
}
?>