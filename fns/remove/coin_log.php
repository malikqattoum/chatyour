<?php
use Medoo\Medoo;

$result = array();
$noerror = true;

$result['success'] = false;
$result['error_message'] = Registry::load('strings')->went_wrong;
$result['error_key'] = 'something_went_wrong';
$coin_log_ids = array();
$user_id = Registry::load('current_user')->id;

if (role(['permissions' => ['coins' => 'coins']])) {

    if (isset($data['log_id'])) {
        if (!is_array($data['log_id'])) {
            $data["log_id"] = filter_var($data["log_id"], FILTER_SANITIZE_NUMBER_INT);
            $coin_log_ids[] = $data["log_id"];
        } else {
            $coin_log_ids = array_filter($data["log_id"], 'ctype_digit');
        }
    }

    if (!empty($coin_log_ids)) {

        if (role(['permissions' => ['super_privileges' => 'all_users_coin_logs']]))
        {
            DB::connect()->delete("admin_coin_actions_log", ["log_id" => $coin_log_ids]);
        }
        else
        {
            $jsonColumn = 'deleted_by';
            $newValue = $user_id;

            DB::connect()->update('coin_actions_log', [
                $jsonColumn => Medoo::raw("JSON_MERGE($jsonColumn, '$newValue')"),
            ], [
                'log_id' => $coin_log_ids,
            ]);
        }

        if (!DB::connect()->error) {
            $result = array();
            $result['success'] = true;
            $result['todo'] = 'reload';
            $result['reload'] = 'coin_log';
        } else {
            $result['error_message'] = Registry::load('strings')->went_wrong;
            $result['error_key'] = 'something_went_wrong';
        }
    }
}
?>