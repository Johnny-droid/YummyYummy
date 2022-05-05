<?php
    declare(strict_types = 1);

    session_start();

    require_once("template/common.php"); 
    require_once("template/restaurants.tpl.php"); 

    require_once("database/connection.db.php");
    require_once("database/restaurant.class.php");

    $db = getDatabaseConnection();

    $restaurants = Restaurant::getRestaurants($db);

    output_header(); 
    output_restaurants($restaurants);
    output_footer();
?>