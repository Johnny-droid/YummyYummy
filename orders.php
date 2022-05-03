<?php
    require_once("template/common.php"); 
    require_once("template/orders.tpl.php");

    require_once("database/connection.db.php");
    require_once("database/order.class.php");

    $db = getDatabaseConnection();

    $id_client = intval($_GET['id']);

    $orders = Order::getClientOrders($db, $id_client);
    
    // now, take orders and create a map with orders and respective products

    output_header(); 
    output_orders($orders);
    output_footer(); 
?>