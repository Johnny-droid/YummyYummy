<?php
    declare(strict_types = 1);

    session_start();

    require_once("template/common.php"); 
    require_once("template/profile.tpl.php"); 

    require_once("database/connection.db.php");
    
    require_once("database/user.class.php");
    require_once("database/restaurant.class.php"); 

    $db = getDatabaseConnection();

    if (isset($_SESSION['id'])) {
        $user = User::getUser($db, $_SESSION['id']);

        if ($user->type === 'C') {
            $favouriteRestaurants = Restaurant::getClientFavouriteRestaurants($db, $user->id); 
        }
    } 

    output_header();
    if($user) { output_profile($user, $favouriteRestaurants); } 
    else {header('Location: index.php');}
    output_footer();
?>

