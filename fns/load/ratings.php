<?php
use Medoo\Medoo;
if (role(['permissions' => ['ratings' => 'view_ratings']])) {

    // SELECT gr_ratings.rated_user_id, gr_site_users.display_name, 
    // (SELECT COUNT(*) FROM gr_ratings WHERE rated_user_id = gr_site_users.user_id) AS num_ratings 
    // FROM gr_ratings 
    // INNER JOIN gr_site_users ON gr_site_users.user_id = gr_ratings.rated_user_id 
    // GROUP BY gr_ratings.rated_user_id
    // ORDER BY num_ratings DESC
    $join = null;

    $columns = [
        'ratings.id',
        'ratings.rated_user_id', 
        'site_users.display_name',
    ];

    $columns['num_ratings'] = Medoo::raw('(SELECT COUNT(<ratings.id>) FROM gr_ratings WHERE rated_user_id = gr_site_users.user_id)');

    $join['[>]site_users'] = ['ratings.rated_user_id' => 'user_id'];

    $where["GROUP"] = ["ratings.rated_user_id"];

    $where["ORDER"] = ["num_ratings" => "DESC"];

    if (!empty($data["offset"])) {
        $data["offset"] = array_map('intval', explode(',', $data["offset"]));
        $where["ratings.id[!]"] = $data["offset"];
    }

    if (!empty($data["search"]) || $data["sortby"] === 'name_asc' || $data["sortby"] === 'name_desc') {
        $where["site_users.display_name[~]"] = $data["search"];
    }

    $where["LIMIT"] = Registry::load('settings')->records_per_call;
// die(var_dump([$join, $columns, $where]));
    if (!empty($join)) {
        $ratings = DB::connect()->select('ratings', $join, $columns, $where);
    } else {
        $ratings = DB::connect()->select('ratings', $columns, $where);
    }

    $i = 1;
    $output = array();
    $output['loaded'] = new stdClass();
    $output['loaded']->title = Registry::load('strings')->ratings;
    $output['loaded']->loaded = 'ratings';
    $output['loaded']->offset = array();

    if (!empty($data["offset"])) {
        $output['loaded']->offset = $data["offset"];
    }

    foreach ($ratings as $rating) {

        $output['loaded']->offset[] = $rating['id'];

        $display_name = $rating['display_name'];

        $num_ratings = $rating['num_ratings'];

        $output['content'][$i] = new stdClass();
        $output['content'][$i]->image = get_image(['from' => 'site_users/profile_pics', 'search' => $rating['rated_user_id']]);
        $output['content'][$i]->title = $display_name;
        $output['content'][$i]->identifier = $rating['id'];
        $output['content'][$i]->class = "ratings";
        $output['content'][$i]->icon = 0;
        $output['content'][$i]->unread = 0;


        if (isset($num_ratings) || $data["sortby"] === 'users_asc' || $data["sortby"] === 'users_desc') {
            $output['content'][$i]->subtitle = $num_ratings.' '.Registry::load('strings')->users;
        }

        if (role(['permissions' => ['ratings' => 'view_ratings']])) {
            $output['options'][$i][1] = new stdClass();
            $output['options'][$i][1]->option = Registry::load('strings')->rating_users;
            $output['options'][$i][1]->class = 'load_aside';
            $output['options'][$i][1]->attributes['load'] = 'rating_users';
            $output['options'][$i][1]->attributes['data-rated_user_id'] = $rating['rated_user_id'];
        }

        $i++;
    }
}
?>