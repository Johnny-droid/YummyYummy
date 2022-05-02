<?php
    require_once("template/common.php"); 
    require_once("template/restaurant.tpl.php"); 

    require_once("database/connection.db.php");
    require_once("database/restaurant.class.php");
    require_once("database/category.class.php");

    $db = getDatabaseConnection();

    $id = intval($_GET['id']);

    $restaurant = Restaurant::getRestaurant($db, $id);

    output_header(); 
    output_restaurant($restaurant); 
    output_footer();
?>