<?php

$result = array();
$result['success'] = false;
$result['error_message'] = Registry::load('strings')->went_wrong;
$result['error_key'] = 'something_went_wrong';

$current_user_id = Registry::load('current_user')->id;

if (Registry::load('settings')->follow_system === 'enable') {
    if (isset($data['user_id'])) {
        $user_id = filter_var($data["user_id"], FILTER_SANITIZE_NUMBER_INT);

        if (!empty($user_id)) {
            if (role(['permissions' => ['follow_system' => 'send_follow_requests']])) {

                if ((int)$user_id === (int)$current_user_id) {
                    return false;
                }

                $columns = $join = $where = null;
                $columns = ['followers.follow_id'];

                $where["OR"]["AND #second_query"] = [
                    "followers.from_user_id" => $current_user_id,
                    "followers.to_user_id" => $user_id,
                ];

                $where["LIMIT"] = 1;

                $check_follower_list = DB::connect()->select('followers', $columns, $where);
                if (!isset($check_follower_list[0])) {

                    $user_site_role_id = DB::connect()->select('site_users', ['site_role_id', 'email_address'], ['user_id' => $user_id, 'LIMIT' => 1]);

                    if (isset($user_site_role_id[0])) {
                        $user_email_address = $user_site_role_id[0]['email_address'];
                        $user_site_role_id = $user_site_role_id[0]['site_role_id'];

                        if (role(['permissions' => ['follow_system' => 'receive_follow_requests'], 'site_role_id' => $user_site_role_id])) {
                            DB::connect()->insert("followers", [
                                "from_user_id" => $current_user_id,
                                "to_user_id" => $user_id,
                                "created_on" => Registry::load('current_user')->time_stamp,
                                "updated_on" => Registry::load('current_user')->time_stamp,
                            ]);

                            if (role(['permissions' => ['follow_system' => 'view_follow_notifications'], 'site_role_id' => $user_site_role_id]))
                            {
                                DB::connect()->insert("site_notifications", [
                                    "user_id" => $user_id,
                                    "notification_type" => 'user_follow',
                                    "related_user_id" => $current_user_id,
                                    "created_on" => Registry::load('current_user')->time_stamp,
                                    "updated_on" => Registry::load('current_user')->time_stamp,
                                ]);
                            }

                            if($data['deduct_coins'])
                            {
                                $user_balance = DB::connect()->select("user_coins", "coins_balance", ["user_id" => $current_user_id]);
                                // Update recipient's balance
                                DB::connect()->update("user_coins", ["coins_balance" => ((float)$user_balance[0] - $data['deduct_coins'])], ["user_id" => $current_user_id]);
                            }

                            // if (isset(Registry::load('settings')->send_push_notification->on_follower_request)) {
                            //     include_once('fns/push_notification/load.php');

                            //     $web_push = [
                            //         'user_id' => $user_id,
                            //         'title' => Registry::load('strings')->someone,
                            //         'message' => Registry::load('strings')->web_push_on_follower_request,
                            //     ];

                            //     if (isset(Registry::load('current_user')->name)) {
                            //         $web_push['title'] = Registry::load('current_user')->name;
                            //     }

                            //     push_notification($web_push);
                            // }

                            // if (isset(Registry::load('settings')->send_email_notification->on_follower_request)) {
                            //     include_once('fns/mailer/load.php');

                            //     $mail_content = '<br/><br/>';

                            //     if (isset(Registry::load('current_user')->name)) {
                            //         $mail_content .= Registry::load('strings')->sender.' : '.Registry::load('current_user')->name.'<br/>';
                            //     }

                            //     $mail = array();
                            //     $mail['email_addresses'] = $user_email_address;
                            //     $mail['category'] = 'new_follower_request';
                            //     $mail['user_id'] = $user_id;
                            //     $mail['parameters'] = ['link' => Registry::load('config')->site_url, 'append_content' => $mail_content];
                            //     $mail['send_now'] = true;
                            //     mailer('compose', $mail);

                            // }
                        }
                    }
                }

                $result = array();
                $result['success'] = true;
                $result['todo'] = 'reload';
                $result['reload'] = ['site_users', 'online', 'followers', 'group_members'];

                if (isset($data['info_box'])) {
                    $result['info_box']['user_id'] = $user_id;
                }
            }
        }
    }
}