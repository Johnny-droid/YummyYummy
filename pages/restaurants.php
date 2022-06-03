<?php
    declare(strict_types = 1);

    session_start();

    require_once(__DIR__ . '/../template/common.php'); 
    require_once(__DIR__ . '/../template/restaurants.tpl.php'); 

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/restaurant.class.php');

    $db = getDatabaseConnection();

    $restaurants = Restaurant::getRestaurants($db);

    output_header(); 
    output_restaurants($restaurants);
    output_footer();
?>