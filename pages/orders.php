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

    $id_client = intval($_GET['id']);

    $orders = Order::getClientOrders($db, $id_client);
    $orders_products = Product::getOrdersProducts($db, $orders);
    $restaurants = Restaurant::getRestaurants($db);
    
    output_header(); 
    output_orders($orders, $orders_products, $restaurants);
    output_footer(); 
?>