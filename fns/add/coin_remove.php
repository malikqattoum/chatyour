<?php
if(role(['permissions' => ['coins' => 'deduct_coins_from_members']])) {
    if (isset($data['removed_user_id'], $data['coins_to_remove']) && is_numeric($data['coins_to_remove'])) {
        $remover_user_id = (int)Registry::load('current_user')->id;
        $removed_user_id = $data['removed_user_id'];
        $coins_to_remove = (int) $data['coins_to_remove'];
    
        // Update recipient's balance
        $removed_coin_balance = DB::connect()->select("user_coins", "coins_balance", ["user_id" => $removed_user_id]);
    
        if (!empty($removed_coin_balance)) {
            // Update recipient's balance
            DB::connect()->update(
                "user_coins",
                ["coins_balance" => ((int)$removed_coin_balance[0] - $coins_to_remove)],
                ["user_id" => $removed_user_id]
            );
        } else {
            $result['success'] = false;
            $result['message'] = 'There is no available coins to remove';
    
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
            "action_date" => date("Y-m-d H:i:s")
        ]);
    
        // Send success result
        $result['success'] = true;
        $result['message'] = 'Coins removed successfully';
    
    } else {
        // Send invalid input error
        $result['success'] = false;
        $result['message'] = 'Invalid input';
    }
}

?>
