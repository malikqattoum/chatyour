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

            $columns = $join = $where = null;
            $columns = ['friendship_id', 'from_user_id', 'to_user_id', 'relation_status'];

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

            if (isset($check_friend_list[0])) {
                if (empty($check_friend_list[0]['relation_status'])) {
                    if ((int)$check_friend_list[0]['from_user_id'] !== (int)$current_user_id) {
                        DB::connect()->update(
                            "friends",
                            ["relation_status" => 1, "updated_on" => Registry::load('current_user')->time_stamp],
                            ["friendship_id" => $check_friend_list[0]['friendship_id']]
                        );

                        $current_user_friends = DB::connect()->count("friends",
                            ["relation_status" => 1, "OR" => ["from_user_id" => $current_user_id, "to_user_id" => $current_user_id]]);

                        DB::connect()->update("site_users", ["total_friends" => $current_user_friends], ["user_id" => $current_user_id]);

                        $other_user_friends = DB::connect()->count("friends",
                            ["relation_status" => 1, "OR" => ["from_user_id" => $user_id, "to_user_id" => $user_id]]);
                        DB::connect()->update("site_users", ["total_friends" => $other_user_friends], ["user_id" => $user_id]);

                        if(role(['permissions' => ['coins' => 'coins']]) && Registry::load('settings')->coins_feature === 'enable')
                        {
                            $friend_counter = DB::connect()->select("friends_counter", "temp_friends_count", ["user_id" => (int)$check_friend_list[0]['from_user_id']]);
    
                            if(!empty($friend_counter))
                            {
                                if($friend_counter[0] >= ((int)Registry::load('settings')->number_of_friends_for_coins - 1)
                                )
                                {
                                    DB::connect()->update(
                                        "friends_counter",
                                        ["temp_friends_count" => 0],
                                        ["user_id" => (int)$check_friend_list[0]['from_user_id']]
                                    );
                                    $recipient_coin_balance = DB::connect()->select("user_coins", "coins_balance", ["user_id" => (int)$check_friend_list[0]['from_user_id']]);
    
                                    if (!empty($recipient_coin_balance)) {
                                        // Update recipient's balance
                                        DB::connect()->update(
                                            "user_coins",
                                            ["coins_balance" => ((float)$recipient_coin_balance[0] + (float)Registry::load('settings')->coins_amount_per_friends)],
                                            ["user_id" => (int)$check_friend_list[0]['from_user_id']]
                                        );
                                    } else {
                                        // Insert recipient's balance record
                                        DB::connect()->insert(
                                            "user_coins",
                                            ["user_id" => (int)$check_friend_list[0]['from_user_id'], "coins_balance" => (float)Registry::load('settings')->coins_amount_per_friends]
                                        );
                                    }
                                }
                                else
                                {
                                    DB::connect()->update(
                                        "friends_counter",
                                        ["temp_friends_count" => ((int)$friend_counter[0] + 1)],
                                        ["user_id" => (int)$check_friend_list[0]['from_user_id']]
                                    );
                                }
                            }
                            else
                            {
                                DB::connect()->insert(
                                    "friends_counter",
                                    ["user_id" => (int)$check_friend_list[0]['from_user_id'], "temp_friends_count" => 1]
                                );
                            }
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