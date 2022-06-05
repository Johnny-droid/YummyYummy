<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ . '/../template/common.php'); 
    require_once(__DIR__ . '/../template/restaurant.tpl.php'); 

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/restaurant.class.php');
    require_once(__DIR__ . '/../database/product.class.php');
    require_once(__DIR__ . '/../database/review.class.php');
    require_once(__DIR__ . '/../database/category.class.php');

    $db = getDatabaseConnection();
    $id_restaurant = intval($_GET['id']);
    
    if ($_SESSION['id_restaurant'] !== $id_restaurant) {
        $_SESSION['products'] = array();
    }
    
    $_SESSION['id_restaurant'] = $id_restaurant;

    //var_dump($_SESSION['products']);


    $restaurant = Restaurant::getRestaurant($db, $id_restaurant);
    $reviews = Review::getRestaurantReviews($db, $id_restaurant);
    $categories = Category::getRestaurantCategories($db, $id_restaurant);
    $products = Product::getRestaurantProducts($db, $id_restaurant);

    output_header(); 
    output_restaurant($restaurant, $categories, $reviews, $products); 
    output_footer();
?>

