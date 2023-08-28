<?php
if(role(['permissions' => ['coins' => 'allow_conversion']])) {

    if (isset($data['recipient_user_id'], $data['coins_to_send']) && is_numeric($data['coins_to_send'])) {
        $sender_user_id = (int)Registry::load('current_user')->id;
        $recipient_user_id = $data['recipient_user_id'];
        $coins_to_send = (int) $data['coins_to_send'];
        if(role(['permissions' => ['groups' => 'super_privileges']]))
        {
            $minimum_value_to_send_coins = Registry::load('settings')->minimum_conversion_value;
            $maximum_value_to_send_coins = Registry::load('settings')->maximum_conversion_value;
        }
        else
        {
            $minimum_value_to_send_coins = role(['find' => 'minimum_value_to_convert_coins']);
            $maximum_value_to_send_coins = role(['find' => 'maximum_value_to_convert_coins']);
        }
        $available_balance_to_send_coins = role(['find' => 'available_balance_to_convert_coins']);
        if($minimum_value_to_send_coins > $coins_to_send)
        {
            $result['success'] = false;
            $result['message'] = 'You can\' not send less than '.$minimum_value_to_send_coins.' coins';
            return;
        }

        if($maximum_value_to_send_coins < $coins_to_send)
        {
            $result['success'] = false;
            $result['message'] = 'You can\' not send more than '.$maximum_value_to_send_coins.' coins';
            return;
        }
        $sender_balance = DB::connect()->select("user_coins", "coins_balance", ["user_id" => $sender_user_id]);
    
        if (isset($sender_balance[0]) && $sender_balance[0] >= $coins_to_send) {
            if($available_balance_to_send_coins > $sender_balance[0])
            {
                $result['success'] = false;
                $result['message'] = 'You should have more than '.$available_balance_to_send_coins.' to send coins coins';
                return;
            }
            // Start a transaction
            // Update sender's balance
            $recipient_coin_balance = DB::connect()->select("user_coins", "coins_balance", ["user_id" => $recipient_user_id]);
    
            if (!empty($recipient_coin_balance)) {
                // Update recipient's balance
                DB::connect()->update(
                    "user_coins",
                    ["coins_balance" => ((int)$recipient_coin_balance[0] + $coins_to_send)],
                    ["user_id" => $recipient_user_id]
                );
            } else {
                // Insert recipient's balance record
                DB::connect()->insert(
                    "user_coins",
                    ["user_id" => $recipient_user_id, "coins_balance" => $coins_to_send]
                );
            }
            // Update recipient's balance
            DB::connect()->update("user_coins", ["coins_balance" => ((int)$sender_balance[0] - $coins_to_send)], ["user_id" => $sender_user_id]);
    
            // Record the transaction
            DB::connect()->insert("coins", [
                "sender_user_id" => $sender_user_id,
                "receiver_user_id" => $recipient_user_id,
                "coins_amount" => $coins_to_send,
                "transaction_type" => 'send',
                "transaction_date" => date("Y-m-d H:i:s")
            ]);
    
            DB::connect()->insert("coin_actions_log", [
                "user_id" => $sender_user_id,
                "target_user_id" => $recipient_user_id,
                "action_type" => 'send', 
                "coins_amount" => $coins_to_send,
                "action_date" => date("Y-m-d H:i:s")
            ]);
    
            // Send success result
            $result['success'] = true;
            $result['message'] = 'Coins sent successfully';
        } else {
            // Send insufficient balance error
            $result['success'] = false;
            $result['message'] = 'Insufficient balance to send coins';
        }
    } else {
        // Send invalid input error
        $result['success'] = false;
        $result['message'] = 'Invalid input';
    }
}

?>
