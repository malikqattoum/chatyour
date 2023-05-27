<?php

function rate($data, $private_data = null) {
    // Get the rating from the POST data
    $rating = $data["rating"];

    // Connect to the database using the DB class
    $db = DB::connect();

    $currentUser = Registry::load('current_user');

    $currentUserId = $currentUser->id;

    // Get the user ID of the user being rated
    // This assumes that you have some way to determine which user is being viewed on the profile page
    // You'll need to modify this code to get the actual user ID from your database or session data.
    $userId = $data['user_id']??0;

    // Check if the user has already been rated by this user
    $result = $db->select("ratings", "*", [
        "rated_user_id" => $userId,
        "rating_user_id" => $currentUserId
    ]);

    if (count($result) > 0) {
        // Update the existing rating record
        $db->update("ratings", [
            "rating" => $rating
        ], [
            "rated_user_id" => $userId,
            "rating_user_id" => $currentUserId
        ]);
    }
    else {
        // Insert a new rating record
        $db->insert("ratings", [
            "rated_user_id" => $userId,
            "rating_user_id" => $currentUserId,
            "rating" => $rating
        ]);
    }

    // Return a success message
    return ['success'=>true, 'message' => 'Rating Submitted!'];
}
?>
