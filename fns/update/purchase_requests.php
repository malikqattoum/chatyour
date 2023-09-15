<?php
$result = array();
$result['success'] = false;
$result['error_message'] = Registry::load('strings')->went_wrong;
$result['error_key'] = 'something_went_wrong';

if (role(['permissions' => ['coins' => 'coins']])) {

    $result['error_message'] = Registry::load('strings')->invalid_value;
    $result['error_key'] = 'invalid_value';
    $result['error_variables'] = [];

    include 'fns/filters/load.php';
    include 'fns/files/load.php';

    $noerror = true;

    if (!isset($data['status']) || empty($data['status'])) {
        $result['error_variables'][] = ['status'];
        $noerror = false;
    }

    if ($noerror) {

        DB::connect()->update("purchased_packages", [
            "status" => $data['status'],
        ], ["purchase_id" => $data['purchase_id']]);

        if($data['status'] == 'completed') {
            $recipient_coin_balance = DB::connect()->select("user_coins", "coins_balance", ["user_id" => $data['user_id']]);

            if (!empty($recipient_coin_balance)) {
                // Update recipient's balance
                DB::connect()->update(
                    "user_coins",
                    ["coins_balance" => ((float)$recipient_coin_balance[0] + (float)$data['coins'])],
                    ["user_id" => $data['user_id']]
                );
            } else {
                // Insert recipient's balance record
                DB::connect()->insert(
                    "user_coins",
                    ["user_id" => $data['user_id'], "coins_balance" => $data['coins']]
                );
            }

            DB::connect()->insert("coins", [
                "sender_user_id" => (int)Registry::load('current_user')->id,
                "receiver_user_id" => $data['user_id'],
                "coins_amount" => $data['coins'],
                "transaction_type" => 'purchase',
                "transaction_date" => date("Y-m-d H:i:s")
            ]);


            DB::connect()->insert("coin_actions_log", [
                "user_id" => (int)Registry::load('current_user')->id,
                "target_user_id" => $data['user_id'],
                "action_type" => 'purchase',
                "coins_amount" => $data['coins'],
                "deleted_by" => '[]',
                "action_date" => date("Y-m-d H:i:s")
            ]);

            DB::connect()->insert("admin_coin_actions_log", [
                "user_id" => (int)Registry::load('current_user')->id,
                "target_user_id" => $data['user_id'],
                "action_type" => 'purchase',
                "coins_amount" => $data['coins'],
                "deleted_by" => '[]',
                "action_date" => date("Y-m-d H:i:s")
            ]);

            DB::connect()->insert("site_notifications", [
                "user_id" => $data['user_id'],
                "notification_type" => 'coin_purchase_completed',
                "related_user_id" => $data['user_id'],
                "created_on" => Registry::load('current_user')->time_stamp,
                "updated_on" => Registry::load('current_user')->time_stamp,
            ]);
        }

        if (!DB::connect()->error) {

            $result = array();
            $result['success'] = true;
            $result['todo'] = 'reload';
            $result['reload'] = 'purchase_requests';

        } else {
            $result['error_message'] = Registry::load('strings')->went_wrong;
            $result['error_key'] = 'something_went_wrong';
        }

    }
}
?>