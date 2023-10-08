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

            $columns = $join = $where = null;
            $columns = ['follow_id', 'from_user_id', 'to_user_id', 'relation_status'];

            $where["OR"]["AND #second_query"] = [
                "followers.from_user_id" => $current_user_id,
                "followers.to_user_id" => $user_id,
            ];

            $where["LIMIT"] = 1;

            $check_follower_list = DB::connect()->select('followers', $columns, $where);

            if (isset($check_follower_list[0])) {
                DB::connect()->delete("followers", ["follow_id" => $check_follower_list[0]['follow_id']]);

                $user_site_role_id = DB::connect()->select('site_users', ['site_role_id', 'email_address'], ['user_id' => $user_id, 'LIMIT' => 1]);
                $user_site_role_id = $user_site_role_id[0]['site_role_id'];
                if (role(['permissions' => ['follow_system' => 'view_follow_notifications'], 'site_role_id' => $user_site_role_id]))
                {
                    DB::connect()->insert("site_notifications", [
                        "user_id" => $user_id,
                        "notification_type" => 'user_unfollow',
                        "related_user_id" => $current_user_id,
                        "created_on" => Registry::load('current_user')->time_stamp,
                        "updated_on" => Registry::load('current_user')->time_stamp,
                    ]);
                }
                // $current_user_followers = DB::connect()->count("followers",
                //     ["relation_status" => 1, "OR" => ["from_user_id" => $current_user_id, "to_user_id" => $current_user_id]]);

                // DB::connect()->update("site_users", ["total_followers" => $current_user_followers], ["user_id" => $current_user_id]);

                // $other_user_followers = DB::connect()->count("followers",
                //     ["relation_status" => 1, "OR" => ["from_user_id" => $user_id, "to_user_id" => $user_id]]);
                // DB::connect()->update("site_users", ["total_followers" => $other_user_followers], ["user_id" => $user_id]);
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