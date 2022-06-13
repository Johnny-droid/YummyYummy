<?php
    declare(strict_types = 1);

    session_start();

    require_once(__DIR__ . '/../template/common.php'); 
    require_once(__DIR__ . '/../template/restaurants.tpl.php'); 

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/restaurant.class.php');
    require_once(__DIR__ . '/../database/category.class.php');

    $db = getDatabaseConnection();

    if (isset($_GET['category'])) {
        $restaurants = Restaurant::getRestaurantsOfCategory($db, intval($_GET['category']));
        $category = Category::getCategory($db, intval($_GET['category']));
    } else {
        $restaurants = Restaurant::getRestaurants($db);
        $category = NULL;
    }

    output_header(); 
    output_restaurants($restaurants, $category);
    output_footer();
?>