<?php
    require_once("template/common.php"); 
    require_once("template/orders.tpl.php");

    require_once("database/connection.db.php");
    require_once("database/order.class.php");
    require_once("database/product.class.php");
    require_once("database/restaurant.class.php");

    $db = getDatabaseConnection();

    $id_client = intval($_GET['id']);

    $orders = Order::getClientOrders($db, $id_client);
    $orders_products = Product::getOrdersProducts($db, $orders);
    $restaurants = Restaurant::getRestaurants($db);

    output_header(); 
    output_orders($orders, $orders_products, $restaurants);
    output_footer(); 
?>