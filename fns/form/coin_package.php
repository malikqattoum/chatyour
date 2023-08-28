<?php

use Medoo\Medoo;

$form = array();

if (role(['permissions' => ['coins' => 'coins']])) {

    $todo = 'add';
    $form['loaded'] = new stdClass();
    $form['fields'] = new stdClass();

    if (isset($load["package_id"])) {
        $load["package_id"] = filter_var($load["package_id"], FILTER_SANITIZE_NUMBER_INT);
    }

    $package = [];

    if (isset($load["package_id"]) && !empty($load["package_id"])) {

        $todo = 'update';

        $columns = [
            'coin_packages.package_id', 'coin_packages.name', 'coin_packages.description',
            'coin_packages.price', 'coin_packages.coins', 'coin_packages.active'
        ];

        $where["coin_packages.package_id"] = $load['package_id'];

        $package = DB::connect()->select('coin_packages', $columns, $where);
        if(!empty($package))
        {
            $package = $package[0];
        }

        $form['fields']->package_id = [
            "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => $load["package_id"]
        ];

        $form['loaded']->title = 'Edit Package';
        $form['loaded']->button = Registry::load('strings')->update;
    } else {
        $form['loaded']->title = 'Add Package';
        $form['loaded']->button = Registry::load('strings')->create;
    }


    $form['fields']->process = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => $todo
    ];

    $form['fields']->$todo = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => "coin_package", 
    ];

    $form['fields']->name = [
        "title" => Registry::load('strings')->name, "tag" => 'input', "type" => "text", "class" => 'field',
        "placeholder" => Registry::load('strings')->name,
        "value" => $package['name']
    ];

    $form['fields']->coins = [
        "title" => Registry::load('strings')->coins, "tag" => 'input', "type" => "number", "class" => 'field',
        "placeholder" => Registry::load('strings')->coins,
        "value" => $package['coins']
    ];

    $form['fields']->price = [
        "title" => Registry::load('strings')->price, "tag" => 'input', "type" => "text", "class" => 'field',
        "placeholder" => Registry::load('strings')->price,
        "value" => $package['price']
    ];

    $form['fields']->description = [
        "title" => Registry::load('strings')->description, "tag" => 'input', "type" => "text", "class" => 'field',
        "placeholder" => Registry::load('strings')->description,
        "value" => $package['description']
    ];

    $form['fields']->active = [
        "title" => Registry::load('strings')->active, "tag" => 'select', "type" => "dropdown", "class" => 'field',
        "value" => $package['active']
    ];

    $form['fields']->active['options'] = ['in active', 'active'];

    $form['fields']->icon = [
        "title" => Registry::load('strings')->icon_img, "tag" => 'input', "type" => 'file', "class" => 'field filebrowse',
        "accept" => 'image/png,image/x-png,image/gif,image/jpeg'
    ];

}
?>