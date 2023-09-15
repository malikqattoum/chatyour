<?php
if(role(['permissions' => ['coins' => 'deduct_coins_from_members']])) {
    if (isset($data['removed_user_id'], $data['coins_to_remove']) && is_numeric($data['coins_to_remove'])) {
        $remover_user_id = (int)Registry::load('current_user')->id;
        $removed_user_id = $data['removed_user_id'];
        $coins_to_remove = (float) $data['coins_to_remove'];
    
        // Update recipient's balance
        $removed_coin_balance = DB::connect()->select("user_coins", "coins_balance", ["user_id" => $removed_user_id]);
    
        if (!empty($removed_coin_balance)) {
            // Update recipient's balance
            DB::connect()->update(
                "user_coins",
                ["coins_balance" => ((float)$removed_coin_balance[0] - $coins_to_remove)],
                ["user_id" => $removed_user_id]
            );
        } else {
            $result['success'] = false;
            $result['error_message'] = Registry::load('strings')->no_available_coins_to_remove;
    
            return;
        }
        // Record the transaction
        DB::connect()->insert("coins", [
            "sender_user_id" => $remover_user_id,
            "receiver_user_id" => $removed_user_id,
            "coins_amount" => $coins_to_remove,
            "transaction_type" => 'remove',
            "transaction_date" => date("Y-m-d H:i:s")
        ]);
    
        DB::connect()->insert("coin_remove", [
            "removed_user_id" => $removed_user_id,
            "removed_by_user_id" => $remover_user_id,
            "amount" => $coins_to_remove,
            "reason" => '',
            "created_at" => date("Y-m-d H:i:s")
        ]);
    
        DB::connect()->insert("coin_actions_log", [
            "user_id" => $remover_user_id,
            "target_user_id" => $removed_user_id,
            "action_type" => 'remove', 
            "coins_amount" => $coins_to_remove,
            "deleted_by" => '[]',
            "action_date" => date("Y-m-d H:i:s")
        ]);

        DB::connect()->insert("admin_coin_actions_log", [
            "user_id" => $remover_user_id,
            "target_user_id" => $removed_user_id,
            "action_type" => 'remove', 
            "coins_amount" => $coins_to_remove,
            "deleted_by" => '[]',
            "action_date" => date("Y-m-d H:i:s")
        ]);

        DB::connect()->insert("site_notifications", [
            "user_id" => $removed_user_id,
            "notification_type" => 'remove_coins_notify',
            "related_user_id" => $remover_user_id,
            "created_on" => Registry::load('current_user')->time_stamp,
            "updated_on" => Registry::load('current_user')->time_stamp,
        ]);
    
        // $result['error_message'] = 'Coins removed successfully';
        $result['success'] = true;
        $result['todo'] = 'reload';
        $result['reload'] = 'site_users';
        $result['info_box']['user_id'] = $removed_user_id;
    
    } else {
        // Send invalid input error
        $result['success'] = false;
        $result['error_message'] = Registry::load('strings')->invalid_input;
    }
}

?>
