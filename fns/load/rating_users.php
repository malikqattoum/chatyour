<?php
use Medoo\Medoo;

if (role(['permissions' => ['ratings' => ['view_ratings']]])) {

    $permission = array();

    $columns = [
        'site_users.user_id', 'site_users.display_name', 'site_users.email_address', 'site_users.approved',
        'site_roles.site_role_attribute', 'site_users.username',
        'site_users.last_seen_on', 'site_users.site_role_id',
        'site_users.online_status', 'site_users.geo_longitude', 'site_users.geo_latitude', 'site_users.stay_online',
        'ratings.rated_user_id', 'ratings.rating_user_id', 'ratings.rating'
    ];

    $join["[>]site_roles"] = ["site_users.site_role_id" => "site_role_id"];
    $join["[>]ratings"] = ["site_users.user_id" => "rating_user_id"];

    $where['ratings.rated_user_id'] = $data["rated_user_id"];

    if (!empty($data["offset"])) {
        $data["offset"] = array_map('intval', explode(',', $data["offset"]));
        $where["site_users.user_id[!]#offset"] = $data["offset"];
    }

    if (!empty($data["search"])) {
        $where["AND #search_query"]["OR"] = [
            "site_users.display_name[~]" => $data["search"],
            "site_users.username[~]" => $data["search"],
            "site_users.email_address" => $data["search"],
        ];
    }

    $where["LIMIT"] = Registry::load('settings')->records_per_call;

    $site_users = DB::connect()->select('site_users', $join, $columns, $where);

    $i = 1;


    $output = array();
    $output['loaded'] = new stdClass();
    $output['loaded']->title = Registry::load('strings')->users;
    $output['loaded']->offset = array();

    if (!empty($data["offset"])) {
        $output['loaded']->offset = $data["offset"];
    }

    foreach ($site_users as $user) {

        $allow_private_message = true;

        $output['loaded']->offset[] = $user['user_id'];

        $output['content'][$i] = new stdClass();
        $output['content'][$i]->image = get_image(['from' => 'site_users/profile_pics', 'search' => $user['user_id'], 'gravatar' => $user['email_address']]);
        $output['content'][$i]->title = $user['display_name'];
        $output['content'][$i]->identifier = $user['user_id'];
        $output['content'][$i]->icon = 0;
        $output['content'][$i]->unread = 0;
        $output['content'][$i]->subtitle = '@'.$user['username'].' Rating: '.$user['rating'];

        $output['content'][$i]->class = "user";
        $output['content'][$i]->attributes = ['user_id' => $user['user_id']];


        $option_index = 1;

        $output['options'][$i][$option_index] = new stdClass();
        $output['options'][$i][$option_index]->option = Registry::load('strings')->profile;
        $output['options'][$i][$option_index]->class = 'get_info force_request';
        $output['options'][$i][$option_index]->attributes['user_id'] = $user['user_id'];
        $option_index++;

        $i++;
    }
}
?>