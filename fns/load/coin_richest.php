<?php

if (role(['permissions' => ['coins' => 'coins']]) && role(['permissions' => ['coins' => 'richest_of_coins']])) {

    $columns = [
        'user_coins.user_id', 'user_coins.coins_balance',
        "site_users.display_name",
    ];

    if (!empty($data["offset"])) {
        $data["offset"] = array_map('intval', explode(',', $data["offset"]));
        $where["user_coins.user_id[!]"] = $data["offset"];
    }

    if (!empty($data["search"])) {
        $where["site_users.display_name[~]"] = $data["search"];
    }

    $where["LIMIT"] = Registry::load('settings')->richest_of_coins_limit;

    if ($data["sortby"] === 'name_asc') {
        $where["ORDER"] = ["site_users.display_name" => "ASC"];
    } else if ($data["sortby"] === 'name_desc') {
        $where["ORDER"] = ["site_users.display_name" => "DESC"];
    } else {
        $where["ORDER"] = ["user_coins.coins_balance" => "DESC"];
    }

    $join["[>]site_users"] = ['user_coins.user_id' => 'user_id'];


    $user_coins = DB::connect()->select('user_coins', $join, $columns, $where);

    $i = 1;
    $output = array();
    $output['loaded'] = new stdClass();
    $output['loaded']->title = Registry::load('strings')->richest_of_coins;
    $output['loaded']->offset = array();
    $output['loaded']->loaded = 'coin_richest';


    if (!empty($data["offset"])) {
        $output['loaded']->offset = $data["offset"];
    }

    $output['sortby'][1] = new stdClass();
    $output['sortby'][1]->sortby = Registry::load('strings')->sort_by_default;
    $output['sortby'][1]->class = 'load_aside';
    $output['sortby'][1]->attributes['load'] = 'coin_richest';

    $output['sortby'][2] = new stdClass();
    $output['sortby'][2]->sortby = Registry::load('strings')->name;
    $output['sortby'][2]->class = 'load_aside sort_asc';
    $output['sortby'][2]->attributes['load'] = 'coin_richest';
    $output['sortby'][2]->attributes['sort'] = 'name_asc';

    $output['sortby'][3] = new stdClass();
    $output['sortby'][3]->sortby = Registry::load('strings')->name;
    $output['sortby'][3]->class = 'load_aside sort_desc';
    $output['sortby'][3]->attributes['load'] = 'coin_richest';
    $output['sortby'][3]->attributes['sort'] = 'name_desc';

    foreach ($user_coins as $user_coin) {
        $output['loaded']->offset[] = $user_coin['user_id'];

        $output['content'][$i] = new stdClass();
        $output['content'][$i]->image = get_image(['from' => 'site_users/profile_pics', 'search' => $user_coin['user_id']]);
        $output['content'][$i]->title = $user_coin['display_name'];
        $output['content'][$i]->class = "user_coins";
        $output['content'][$i]->identifier = $user_coin['user_id'];

        $output['content'][$i]->subtitle = $user_coin['coins_balance'];

        $output['content'][$i]->icon = 0;
        $output['content'][$i]->unread = 0;

        $i++;
    }
}
?>