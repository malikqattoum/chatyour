<?php
    if(role(['permissions' => ['coins' => 'coins', 'coins' => 'purchase_coin_packages']])){
        $output = array();
        $output['loaded'] = new stdClass();
        $output['loaded']->title = Registry::load('strings')->payment_info;
        $output['loaded']->offset = array();
        $output['loaded']->loaded = 'coin_buy_package';
    
        $columns = [
            'coin_packages.package_id', 'coin_packages.name', 'coin_packages.description',
            'coin_packages.price', 'coin_packages.coins', 'coin_packages.active'
        ];
    
        $where["coin_packages.package_id"] = $data["package_id"];
    
        $where["LIMIT"] = 1;
    
        $package = DB::connect()->select('coin_packages', $columns, $where);
        
        $i = 0;
        $output['content'][$i] = new stdClass();
        $output['content'][$i]->image = get_image(['from' => 'coin_package', 'search' => $package[0]['package_id']]);
        $output['content'][$i]->title = $package[0]['name'].' | '.$package[0]['price'];
        $output['content'][$i]->class = "coin_packages";
        $output['content'][$i]->identifier = $package[0]['package_id'];
        $output['content'][$i]->subtitle = 'Bank Name: '.Registry::load('settings')->bank_name.
        ' | IBAN: '.Registry::load('settings')->iban.' | Swift Code: '.Registry::load('settings')->swift_code;
        $output['content'][$i]->unread = 0;
        $output['content'][$i]->icon = 0;
    
        DB::connect()->insert("purchased_packages", [
            'user_id' => Registry::load('current_user')->id,
            'package_id' => $package[0]['package_id'],
            'package_price' => $package[0]['price'],
            'purchase_date' => date('Y-m-d H:i:s')
        ]);
    }

?>