<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/order.class.php');
    

    $db = getDatabaseConnection();
    
    $str_json = $_POST['orderCourier_json'];

    $id_order = json_decode($str_json);

    if (!isset($_SESSION['id']) || $_SESSION['type'] !== 'E') {
        exit();
    }

    
    Order::updateOrderCourier($db, $_SESSION['id'], $id_order);
    
?>