<?php
if(role(['permissions' => ['coins' => 'add_coins_to_members']]))
{
    if (isset($data['recipient_user_id'], $data['coins_to_grant']) && is_numeric($data['coins_to_grant'])) {
        $sender_user_id = (int)Registry::load('current_user')->id;
        $recipient_user_id = $data['recipient_user_id'];
        $coins_to_grant = (float) $data['coins_to_grant'];
    
        // Update recipient's balance
        $recipient_coin_balance = DB::connect()->select("user_coins", "coins_balance", ["user_id" => $recipient_user_id]);
    
        if (!empty($recipient_coin_balance)) {
            // Update recipient's balance
            DB::connect()->update(
                "user_coins",
                ["coins_balance" => ((float)$recipient_coin_balance[0] + $coins_to_grant)],
                ["user_id" => $recipient_user_id]
            );
        } else {
            // Insert recipient's balance record
            DB::connect()->insert(
                "user_coins",
                ["user_id" => $recipient_user_id, "coins_balance" => $coins_to_grant]
            );
        }
        // Record the transaction
        DB::connect()->insert("coins", [
            "sender_user_id" => $sender_user_id,
            "receiver_user_id" => $recipient_user_id,
            "coins_amount" => $coins_to_grant,
            "transaction_type" => 'grant',
            "transaction_date" => date("Y-m-d H:i:s")
        ]);
    
        DB::connect()->insert("coin_grant", [
            "granted_user_id" => $recipient_user_id,
            "granted_by_user_id" => $sender_user_id,
            "amount" => $coins_to_grant,
            "reason" => '',
            "created_at" => date("Y-m-d H:i:s")
        ]);
    
        DB::connect()->insert("coin_actions_log", [
            "user_id" => $sender_user_id,
            "target_user_id" => $recipient_user_id,
            "action_type" => 'grant', 
            "coins_amount" => $coins_to_grant,
            "action_date" => date("Y-m-d H:i:s")
        ]);

        DB::connect()->insert("site_notifications", [
            "user_id" => $recipient_user_id,
            "notification_type" => 'grant_coins_notify',
            "related_user_id" => $sender_user_id,
            "created_on" => Registry::load('current_user')->time_stamp,
            "updated_on" => Registry::load('current_user')->time_stamp,
        ]);
    
        // Send success result
        // $result['error_message'] = 'Coins granted successfully';
        $result['success'] = true;
        $result['todo'] = 'reload';
        $result['reload'] = 'site_users';
        $result['info_box']['user_id'] = $recipient_user_id;
    
    } else {
        // Send invalid input error
        $result['success'] = false;
        $result['error_message'] = 'Invalid input';
    }
}

?>
