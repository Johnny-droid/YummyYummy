<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ . '/../template/common.php'); 
    require_once(__DIR__ . '/../template/orders.tpl.php');

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/order.class.php');
    require_once(__DIR__ . '/../database/product.class.php');
    require_once(__DIR__ . '/../database/restaurant.class.php');

    $db = getDatabaseConnection();

    $id_client = intval($_SESSION['id']);

    $orders = Order::getClientOrders($db, $id_client);
    //order -> [(product, quantity), ...]
    $orders_products = Product::getOrdersProducts($db, $orders);
    $restaurants = Restaurant::getRestaurants($db);
    
    output_header(); 
    if($id_client) {
        output_orders($orders, $orders_products, $restaurants);
    } else {
        header('Location: ../pages/signup.php?error=4');
    }
    output_footer(); 
?>