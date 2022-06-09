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

    if (!isset($_SESSION['id'])) {
        header('Location: ../pages/signup.php?error=4');
        exit();
    }
    
    $id_user = intval($_SESSION['id']);

    if ($_SESSION['type'] === 'C') {
        $orders = Order::getClientOrders($db, $id_user); 
    } else if ($_SESSION['type'] === 'O') {
        $orders = Order::getOwnerOrders($db, $id_user);
    } // we need to cover one more case for the courier


    $_SESSION['orders'] = $orders;
    
    $orders_products = Product::getOrdersProducts($db, $orders); //order -> [(product, quantity), (product, quantity), ...]
    $restaurants = Restaurant::getRestaurants($db);
    
    output_header(); 
    output_orders($orders, $orders_products, $restaurants);
    output_footer(); 
?>