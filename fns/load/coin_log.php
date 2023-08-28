<?php

if (role(['permissions' => ['coins' => 'coins']]) && role(['permissions' => ['groups' => 'super_privileges']])) {

    $columns = [
        'coin_actions_log.log_id', 'coin_actions_log.user_id', 'coin_actions_log.target_user_id',
        'coin_actions_log.action_type', 'coin_actions_log.coins_amount', 'coin_actions_log.action_date',
        "u1.display_name(performing_user_display_name)",
        "u2.display_name(target_user_display_name)"
    ];

    if (!empty($data["offset"])) {
        $data["offset"] = array_map('intval', explode(',', $data["offset"]));
        $where["coin_actions_log.log_id[!]"] = $data["offset"];
    }

    if (!empty($data["search"])) {
        $where["performing_user_display_name[~]"] = $data["search"];
    }

    $where["LIMIT"] = Registry::load('settings')->records_per_call;

    if ($data["sortby"] === 'name_asc') {
        $where["ORDER"] = ["performing_user_display_name" => "ASC"];
    } else if ($data["sortby"] === 'name_desc') {
        $where["ORDER"] = ["performing_user_display_name" => "DESC"];
    } else {
        $where["ORDER"] = ["coin_actions_log.log_id" => "DESC"];
    }

    $join["[>]site_users(u1)"] = ['coin_actions_log.user_id' => 'user_id'];
    $join["[>]site_users(u2)"] = ['coin_actions_log.target_user_id' => 'user_id'];


    $coin_actions_log = DB::connect()->select('coin_actions_log', $join, $columns, $where);

    $i = 1;
    $output = array();
    $output['loaded'] = new stdClass();
    $output['loaded']->title = Registry::load('strings')->coins_log;
    $output['loaded']->offset = array();
    $output['loaded']->loaded = 'coin_log';


    if (!empty($data["offset"])) {
        $output['loaded']->offset = $data["offset"];
    }

    $output['sortby'][1] = new stdClass();
    $output['sortby'][1]->sortby = Registry::load('strings')->sort_by_default;
    $output['sortby'][1]->class = 'load_aside';
    $output['sortby'][1]->attributes['load'] = 'coin_log';

    $output['sortby'][2] = new stdClass();
    $output['sortby'][2]->sortby = Registry::load('strings')->name;
    $output['sortby'][2]->class = 'load_aside sort_asc';
    $output['sortby'][2]->attributes['load'] = 'coin_log';
    $output['sortby'][2]->attributes['sort'] = 'name_asc';

    $output['sortby'][3] = new stdClass();
    $output['sortby'][3]->sortby = Registry::load('strings')->name;
    $output['sortby'][3]->class = 'load_aside sort_desc';
    $output['sortby'][3]->attributes['load'] = 'coin_log';
    $output['sortby'][3]->attributes['sort'] = 'name_desc';

    foreach ($coin_actions_log as $log) {
        $output['loaded']->offset[] = $log['log_id'];

        $output['content'][$i] = new stdClass();
        $output['content'][$i]->image = get_image(['from' => 'site_users/profile_pics', 'search' => $log['user_id']]);
        $output['content'][$i]->title = $log['performing_user_display_name']. ' '.$log['action_type'].' action on '.$log['target_user_display_name'];
        $output['content'][$i]->class = "coin_actions_log";
        $output['content'][$i]->identifier = $log['log_id'];

        $output['content'][$i]->subtitle = $log['performing_user_display_name']. ' | Action on user: '.$log['target_user_display_name']
        .' | Action: '.$log['action_type'].' | Coins: '.$log['coins_amount'];

        $output['content'][$i]->icon = 0;
        $output['content'][$i]->unread = 0;

        $i++;
    }
}
?>