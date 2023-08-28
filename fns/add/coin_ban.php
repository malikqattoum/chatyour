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
            }
            else
            {
                DB::connect()->update(
                    "site_users",
                    ["is_banned_receive_coins" => 1, 'coins_banned_by_user_id' => $ban_by_user_id],
                    ["user_id" => $user_id]
                );
            }
    
            DB::connect()->insert("coin_actions_log", [
                "user_id" => $ban_by_user_id,
                "target_user_id" => $user_id,
                "action_type" => 'ban '.$ban_type, // 'send', 'receive', 'grant', 'remove', 'purchase', 'ban', 'unban'
                "coins_amount" => 0,
                "action_date" => date("Y-m-d H:i:s")
            ]);
            
    
            $result['success'] = true;
            $result['message'] = 'User banned from '.$ban_type.' successfully';
        } else {
            $result['success'] = false;
            $result['message'] = 'The user is not exists';
        }
    } else {
        // Invalid input error
        $result['success'] = false;
        $result['message'] = 'Invalid input';
    }
}

?>
