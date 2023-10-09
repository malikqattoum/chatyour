<?php

$form = array();
$user_id = 0;
$todo = 'add';

if(role(['permissions' => ['follow_system' => 'deduct_coins_per_follow']])) {


    if (isset($load['user_id'])) {
        $load["user_id"] = filter_var($load["user_id"], FILTER_SANITIZE_NUMBER_INT);
        if (!empty($load['user_id'])) {
            $user_id = $load["user_id"];
        }
    }

    $deduct_coins_amount = role(['find' => 'coins_amount_per_follow']);

    $columns = $where = null;
    $columns = ['display_name'];
    $where['user_id'] = $load['user_id'];
    $where['LIMIT'] = 1;
    $user = DB::connect()->select('site_users', $columns, $where);

    $form['loaded'] = new stdClass();
    $form['loaded']->title = Registry::load('strings')->follow;
    $form['loaded']->button = Registry::load('strings')->follow;

    $form['fields'] = new stdClass();

    $form['fields']->$todo = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => "follow"
    ];

    $form['fields']->user_id = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => $load['user_id']
    ];

    $form['fields']->info_box = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => true
    ];

    $form['fields']->deduct_coins = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => $deduct_coins_amount
    ];

    $form['fields']->deduct_coins_per_follow = [
        "title" => Registry::load('strings')->deduct_coins_per_follow, "tag" => 'input', "type" => 'text', 
        "class" => 'field', "placeholder" => Registry::load('strings')->deduct_coins_per_follow, "value" => $deduct_coins_amount,
        "attributes" => ["disabled" => "disabled"]
    ];

}
?>