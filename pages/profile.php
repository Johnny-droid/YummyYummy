<?php
    declare(strict_types = 1);

    session_start();

    require_once(__DIR__ . '/../template/common.php'); 
    require_once(__DIR__ . '/../template/profile.tpl.php'); 

    require_once(__DIR__ . '/../database/connection.db.php');
    
    require_once(__DIR__ . '/../database/user.class.php');
    require_once(__DIR__ . '/../database/restaurant.class.php'); 

    $db = getDatabaseConnection();
    $restaurants = array();
    //$user;
    if (isset($_SESSION['id'])) {
        $user = User::getUser($db, $_SESSION['id']);

        if ($user->type === 'C') { // favourite restaurants
            $restaurants = Restaurant::getClientFavouriteRestaurants($db, $user->id); 
        } else if ($user->type === 'O') {
            $restaurants = Restaurant::getOwnerRestaurants($db, $user->id);
        }
    } 

    output_header();
    if($user) { output_profile($user, $restaurants); } 
    else {header('Location: /../index.php');}
    output_footer();
?>

