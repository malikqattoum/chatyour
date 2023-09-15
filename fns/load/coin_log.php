<?php

if (role(['permissions' => ['coins' => 'coins']])) {

    $current_user_id = Registry::load('current_user')->id;
    if(!role(['permissions' => ['super_privileges' => 'all_users_coin_logs']]))
    {
        $tableName = 'coin_actions_log';
        $where["AND"]["OR"] = [
            $tableName.".deleted_by[!~]" => $current_user_id,
            $tableName.".deleted_by" => NULL,
        ];
    }
    else
    {
        $tableName = 'admin_coin_actions_log';
    }

    $columns = [
        $tableName.'.log_id', $tableName.'.user_id', $tableName.'.target_user_id',
        $tableName.'.action_type', $tableName.'.coins_amount', $tableName.'.action_date',
        $tableName.'.deleted_by',
        "u1.display_name(performing_user_display_name)",
        "u2.display_name(target_user_display_name)"
    ];

    if (!empty($data["offset"])) {
        $data["offset"] = array_map('intval', explode(',', $data["offset"]));
        $where[$tableName.".log_id[!]"] = $data["offset"];
    }

    if (!empty($data["search"])) {
        $where["performing_user_display_name[~]"] = $data["search"];
    }

    if(!role(['permissions' => ['super_privileges' => 'all_users_coin_logs']]))
    {
        $where["AND"]["OR #first condition"] = ["u2.user_id" => $current_user_id, "u1.user_id" => $current_user_id];
    }

    $where["LIMIT"] = Registry::load('settings')->records_per_call;

    if ($data["sortby"] === 'name_asc') {
        $where["ORDER"] = ["performing_user_display_name" => "ASC"];
    } else if ($data["sortby"] === 'name_desc') {
        $where["ORDER"] = ["performing_user_display_name" => "DESC"];
    } else {
        $where["ORDER"] = [$tableName.".log_id" => "DESC"];
    }

    $join["[>]site_users(u1)"] = [$tableName.'.user_id' => 'user_id'];
    $join["[>]site_users(u2)"] = [$tableName.'.target_user_id' => 'user_id'];

    $coin_actions_log = DB::connect()->select($tableName, $join, $columns, $where);

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

    $output['multiple_select'] = new stdClass();
    $output['multiple_select']->title = Registry::load('strings')->delete;
    $output['multiple_select']->attributes['class'] = 'ask_confirmation';
    $output['multiple_select']->attributes['data-remove'] = 'coin_log';
    $output['multiple_select']->attributes['multi_select'] = 'log_id';
    $output['multiple_select']->attributes['submit_button'] = Registry::load('strings')->yes;
    $output['multiple_select']->attributes['cancel_button'] = Registry::load('strings')->no;
    $output['multiple_select']->attributes['confirmation'] = Registry::load('strings')->confirm_action;

    foreach ($coin_actions_log as $log) {
        $log['action_type'] = preg_replace('/\s+/', '_', $log['action_type']);
        $output['loaded']->offset[] = $log['log_id'];

        $output['content'][$i] = new stdClass();
        $output['content'][$i]->image = get_image(['from' => 'site_users/profile_pics', 'search' => $log['user_id']]);
        if($log['action_type'] == "purchase")
        {
            $output['content'][$i]->title = $log['performing_user_display_name']. ' '.Registry::load('strings')->{$log['action_type']}.' '
            .Registry::load('strings')->coins.' '.$log['coins_amount']. ' '.Registry::load('strings')->coins;
            $output['content'][$i]->subtitle = $log['performing_user_display_name'].' | '.Registry::load('strings')->action.': '
            .Registry::load('strings')->{$log['action_type']}.' | '.Registry::load('strings')->coins.': '.$log['coins_amount']
            .' | Action Date: '.$log['action_date'];
        }
        else
        {
            $output['content'][$i]->title = $log['performing_user_display_name']. ' '.Registry::load('strings')->{$log['action_type']}
            .' '.Registry::load('strings')->coins.' '.Registry::load('strings')->action_on.' '.$log['target_user_display_name'];
            $output['content'][$i]->subtitle = $log['performing_user_display_name']. ' | '
            .Registry::load('strings')->action_on_user.': '.$log['target_user_display_name']
            .' | '.Registry::load('strings')->action.': '.Registry::load('strings')->{$log['action_type']}.' | '
            .Registry::load('strings')->coins.': '.$log['coins_amount'].' | Action Date: '.$log['action_date'];
        }

        $output['content'][$i]->class = "coin_actions_log";
        $output['content'][$i]->identifier = $log['log_id'];



        $output['content'][$i]->icon = 0;
        $output['content'][$i]->unread = 0;

        $i++;
    }
}
?>