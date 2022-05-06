<?php
    declare(strict_types = 1);

    session_start();
    
    require_once("template/common.php"); 
    require_once("template/restaurant.tpl.php"); 

    require_once("database/connection.db.php");
    require_once("database/restaurant.class.php");
    require_once("database/product.class.php");
    require_once("database/review.class.php");
    require_once("database/category.class.php");

    $db = getDatabaseConnection();

    $id_restaurant = intval($_GET['id']);
    $_SESSION['id_restaurant'] = $id_restaurant;

    var_dump($_SESSION['products']);
    foreach ($_SESSION as $key=>$value) {
        echo $key . " " . $value . "<br>";
    } 

    $restaurant = Restaurant::getRestaurant($db, $id_restaurant);
    $reviews = Review::getRestaurantReviews($db, $id_restaurant);
    $categories = Category::getRestaurantCategories($db, $id_restaurant);
    $products = Product::getRestaurantProducts($db, $id_restaurant);

    output_header(); 
    output_restaurant($restaurant, $categories, $reviews, $products); 
    output_footer();
?>

