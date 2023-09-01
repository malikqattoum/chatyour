<?php

$result = array();
$result['success'] = false;
$result['error_message'] = Registry::load('strings')->went_wrong;
$result['error_key'] = 'something_went_wrong';

$current_user_id = Registry::load('current_user')->id;

if (Registry::load('settings')->friend_system === 'enable') {
    if (isset($data['user_id'])) {

        $user_id = filter_var($data["user_id"], FILTER_SANITIZE_NUMBER_INT);

        if (!empty($user_id)) {
            if (role(['permissions' => ['friend_system' => 'send_requests']])) {

                if ((int)$user_id === (int)$current_user_id) {
                    return false;
                }

                $columns = $join = $where = null;
                $columns = ['friends.friendship_id'];

                $where["OR"]["AND #first_query"] = [
                    "friends.from_user_id" => $user_id,
                    "friends.to_user_id" => $current_user_id,
                ];
                $where["OR"]["AND #second_query"] = [
                    "friends.from_user_id" => $current_user_id,
                    "friends.to_user_id" => $user_id,
                ];

                $where["LIMIT"] = 1;

                $check_friend_list = DB::connect()->select('friends', $columns, $where);

                if (!isset($check_friend_list[0])) {


                    $user_site_role_id = DB::connect()->select('site_users', ['site_role_id', 'email_address'], ['user_id' => $user_id, 'LIMIT' => 1]);

                    if (isset($user_site_role_id[0])) {
                        $user_email_address = $user_site_role_id[0]['email_address'];
                        $user_site_role_id = $user_site_role_id[0]['site_role_id'];

                        if (role(['permissions' => ['friend_system' => 'receive_requests'], 'site_role_id' => $user_site_role_id])) {
                            DB::connect()->insert("friends", [
                                "from_user_id" => $current_user_id,
                                "to_user_id" => $user_id,
                                "created_on" => Registry::load('current_user')->time_stamp,
                                "updated_on" => Registry::load('current_user')->time_stamp,
                            ]);

                            $friend_counter = DB::connect()->select("friends_counter", "temp_friends_count", ["user_id" => $current_user_id]);
                            // echo json_encode($friend_counter);
                            if(!empty($friend_counter))
                            {
                                if(role(['permissions' => ['coins' => 'coins']])
                                && 
                                $friend_counter[0] >= ((int)Registry::load('settings')->number_of_friends_for_coins - 1)
                                )
                                {
                                    DB::connect()->update(
                                        "friends_counter",
                                        ["temp_friends_count" => 0],
                                        ["user_id" => $current_user_id]
                                    );
                                    $recipient_coin_balance = DB::connect()->select("user_coins", "coins_balance", ["user_id" => $current_user_id]);
    
                                    if (!empty($recipient_coin_balance)) {
                                        // Update recipient's balance
                                        DB::connect()->update(
                                            "user_coins",
                                            ["coins_balance" => ((float)$recipient_coin_balance[0] + (float)Registry::load('settings')->coins_amount_per_friends)],
                                            ["user_id" => $current_user_id]
                                        );
                                    } else {
                                        // Insert recipient's balance record
                                        DB::connect()->insert(
                                            "user_coins",
                                            ["user_id" => $current_user_id, "coins_balance" => (float)Registry::load('settings')->coins_amount_per_friends]
                                        );
                                    }
                                }
                                else
                                {
                                    DB::connect()->update(
                                        "friends_counter",
                                        ["temp_friends_count" => ((int)$friend_counter[0] + 1)],
                                        ["user_id" => $current_user_id]
                                    );
                                }
                            }
                            else
                            {
                                DB::connect()->insert(
                                    "friends_counter",
                                    ["user_id" => $current_user_id, "temp_friends_count" => 1]
                                );
                            }




                            if (isset(Registry::load('settings')->send_push_notification->on_friend_request)) {
                                include_once('fns/push_notification/load.php');

                                $web_push = [
                                    'user_id' => $user_id,
                                    'title' => Registry::load('strings')->someone,
                                    'message' => Registry::load('strings')->web_push_on_friend_request,
                                ];

                                if (isset(Registry::load('current_user')->name)) {
                                    $web_push['title'] = Registry::load('current_user')->name;
                                }

                                push_notification($web_push);
                            }

                            if (isset(Registry::load('settings')->send_email_notification->on_friend_request)) {
                                include_once('fns/mailer/load.php');

                                $mail_content = '<br/><br/>';

                                if (isset(Registry::load('current_user')->name)) {
                                    $mail_content .= Registry::load('strings')->sender.' : '.Registry::load('current_user')->name.'<br/>';
                                }

                                $mail = array();
                                $mail['email_addresses'] = $user_email_address;
                                $mail['category'] = 'new_friend_request';
                                $mail['user_id'] = $user_id;
                                $mail['parameters'] = ['link' => Registry::load('config')->site_url, 'append_content' => $mail_content];
                                $mail['send_now'] = true;
                                mailer('compose', $mail);

                            }
                        }
                    }
                }

                $result = array();
                $result['success'] = true;
                $result['todo'] = 'reload';
                $result['reload'] = ['site_users', 'online', 'friends', 'group_members'];

                if (isset($data['info_box'])) {
                    $result['info_box']['user_id'] = $user_id;
                }
            }
        }
    }
}