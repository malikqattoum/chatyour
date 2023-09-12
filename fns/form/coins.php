<?php

if (role(['permissions' => ['coins' => 'coins']])) {
    $form = array();
    $form['loaded'] = new stdClass();
    $form['loaded']->title = Registry::load('strings')->coins;
    $form['loaded']->button = Registry::load('strings')->update;


    $form['fields'] = new stdClass();

    $form['fields']->process = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => "update"
    ];

    $form['fields']->update = [
        "tag" => 'input', "type" => 'hidden', "class" => 'd-none', "value" => "settings"
    ];


    // Form Here
}
?>