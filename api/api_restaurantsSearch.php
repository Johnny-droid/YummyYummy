<?php
    declare(strict_types = 1);

    session_start();

    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/restaurant.class.php');

    $search = $_GET['search'];
    if ($search !== '') {
        $db = getDatabaseConnection();
        $restaurants = Restaurant::getRestaurantsSearch($db, $search, 8);
    } else {
        $restaurants = array();
    }

    echo json_encode($restaurants);
    
?>