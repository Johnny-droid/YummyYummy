<?php
    declare(strict_types = 1);

    session_start();

    require_once("template/common.php"); 
    require_once("template/profile.tpl.php"); 

    require_once("database/connection.db.php");
    
    require_once("database/user.class.php");
    require_once("database/restaurant_owner.class.php");
    require_once("database/client.class.php");

    $db = getDatabaseConnection();

    if (isset($_SESSION['id']) && $_SESSION['isClient']) {
        $user = Client::getClient($db, $_SESSION['id']);
    } else if (isset($_SESSION['id']) && !$_SESSION['isClient']) {
        $user = RestaurantOwner::getRestaurantOwner($db, $_SESSION['id']);
    }

    output_header(); 
    output_profile($user);
    output_footer();
?>

