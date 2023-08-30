<?php

$form = array();
$user_id = 0;
$todo = 'add';

if(role(['permissions' => ['coins' => 'allow_conversion']])) {


    if (isset($load['user_id'])) {
        $load["user_id"] = filter_var($load["user_id"], FILTER_SANITIZE_NUMBER_INT);
        if (!empty($load['user_id'])) {
            $user_id = $load["user_id"];
        }
    }

    $columns = $where = null;
    $columns = ['display_name'];
    $where['user_id'] = $load['user_id'];
    $where['LIMIT'] = 1;
    $user = DB::connect()->select('site_users', $columns, $where);

    $form['loaded'] = new stdClass();
    $form['loaded']->title = Registry::load('strings')->remove_coins;
    $form['loaded']->button = Registry::load('strings')->remove_coins_button;

    $form['fields'] = new stdClass();

    $form['fields']->$todo = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => "coin_remove"
    ];

    $form['fields']->removed_user_id = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => $load['user_id']
    ];


    $form['fields']->name = [
        "title" => Registry::load('strings')->name, "tag" => 'input', "type" => 'text', 
        "class" => 'field', "placeholder" => Registry::load('strings')->name, "value" => $user[0]['display_name'],
        "attributes" => ["disabled" => "disabled"]
    ];

    $form['fields']->coins_to_remove = [
        "title" => Registry::load('strings')->coins, "tag" => 'input', "type" => 'number',
        "class" => 'field', "placeholder" => Registry::load('strings')->coins,
    ];

}
?>