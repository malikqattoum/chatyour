<?php
if(
    ($data['ban_type'] == "send" && role(['permissions' => ['coins' => 'coins', 'coins' => 'ban_member_from_sending_coins']]))
    ||
    ($data['ban_type'] == "receive" && role(['permissions' => ['coins' => 'coins', 'coins' => 'ban_member_from_receiving_coins']]))
)
{

    if (isset($data['ban_type'], $data['user_id'])) {
        $ban_by_user_id = (int)Registry::load('current_user')->id;
        $user_id = $data['user_id'];
        $ban_type = $data['ban_type'];
    
        $columns = [
            'site_users.user_id', 'site_users.is_banned_receive_coins', 'site_users.is_banned_send_coins'
        ];
    
        $where["site_users.user_id"] = $user_id;
        $where["LIMIT"] = 1;
    
        $user = DB::connect()->select('site_users', $columns, $where);
    
        if (isset($user[0]) && !empty($user[0])) {
    
            if($ban_type == "send") {
                DB::connect()->update(
                    "site_users",
                    ["is_banned_send_coins" => 1, 'coins_banned_by_user_id' => $ban_by_user_id],
                    ["user_id" => $user_id]
                );

                DB::connect()->insert("site_notifications", [
                    "user_id" => $user_id,
                    "notification_type" => 'ban_send_coins_notify',
                    "related_user_id" => $ban_by_user_id,
                    "created_on" => Registry::load('current_user')->time_stamp,
                    "updated_on" => Registry::load('current_user')->time_stamp,
                ]);
            }
            else
            {
                DB::connect()->update(
                    "site_users",
                    ["is_banned_receive_coins" => 1, 'coins_banned_by_user_id' => $ban_by_user_id],
                    ["user_id" => $user_id]
                );

                DB::connect()->insert("site_notifications", [
                    "user_id" => $user_id,
                    "notification_type" => 'ban_receive_coins_notify',
                    "related_user_id" => $ban_by_user_id,
                    "created_on" => Registry::load('current_user')->time_stamp,
                    "updated_on" => Registry::load('current_user')->time_stamp,
                ]);
            }
    
            DB::connect()->insert("coin_actions_log", [
                "user_id" => $ban_by_user_id,
                "target_user_id" => $user_id,
                "action_type" => 'ban '.$ban_type, // 'send', 'receive', 'grant', 'remove', 'purchase', 'ban', 'unban'
                "coins_amount" => 0,
                "deleted_by" => '[]',
                "action_date" => date("Y-m-d H:i:s")
            ]);

            DB::connect()->insert("admin_coin_actions_log", [
                "user_id" => $ban_by_user_id,
                "target_user_id" => $user_id,
                "action_type" => 'ban '.$ban_type, // 'send', 'receive', 'grant', 'remove', 'purchase', 'ban', 'unban'
                "coins_amount" => 0,
                "deleted_by" => '[]',
                "action_date" => date("Y-m-d H:i:s")
            ]);
    
            $result['success'] = true;
            $result['todo'] = 'reload';
            $result['reload'] = 'site_users';
            $result['info_box']['user_id'] = $user_id;
            // $result['error_message'] = 'User banned from '.$ban_type.' successfully';
        } else {
            $result['success'] = false;
            $result['error_message'] = Registry::load('strings')->the_user_is_not_exist;
        }
    } else {
        // Invalid input error
        $result['success'] = false;
        $result['error_message'] = Registry::load('strings')->invalid_input;
    }
}

?>
