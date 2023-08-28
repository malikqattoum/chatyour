<?php

use Medoo\Medoo;

$form = array();

if (role(['permissions' => ['coins' => 'coins', 'coins' => 'purchase_coin_packages']])) {

    $todo = 'add';
    $form['loaded'] = new stdClass();
    $form['fields'] = new stdClass();

    if (isset($load["purchase_id"])) {
        $load["purchase_id"] = filter_var($load["purchase_id"], FILTER_SANITIZE_NUMBER_INT);
    }

    $purchase = [];

    if (isset($load["purchase_id"]) && !empty($load["purchase_id"])) {

        $todo = 'update';

        $columns = [
            'purchased_packages.purchase_id', 'purchased_packages.status', 'purchased_packages.user_id',
            'purchased_packages.package_id', 'coin_packages.coins'
        ];

        $where["purchased_packages.purchase_id"] = $load['purchase_id'];

        $join = [];
        $join["[>]coin_packages"] = ['purchased_packages.package_id' => 'package_id'];

        $purchase = DB::connect()->select('purchased_packages', $join, $columns, $where);
        if(!empty($purchase))
        {
            $purchase = $purchase[0];
        }

        $form['fields']->purchase_id = [
            "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => $load["purchase_id"]
        ];

        $form['loaded']->title = 'Edit Purchase';
        $form['loaded']->button = Registry::load('strings')->update;
    }


    $form['fields']->process = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => 'update'
    ];

    $form['fields']->$todo = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => "purchase_requests", 
    ];

    $form['fields']->user_id = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => $purchase['user_id']
    ];

    $form['fields']->coins = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => $purchase['coins']
    ];

    $form['fields']->status = [
        "title" => Registry::load('strings')->status, "tag" => 'select', "class" => 'field',
        "value" => $purchase['status']
    ];

    $form['fields']->status['options'] = ['pending'=>'Pending', 'completed'=>'Completed'];

}
?>