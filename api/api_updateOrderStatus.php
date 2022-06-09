<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/order.class.php');
    

    $db = getDatabaseConnection();
    
    $str_json = $_POST['orderInfo_json'];

    $orderInfo = json_decode($str_json);

    if (!isset($_SESSION['id']) || $_SESSION['type'] === 'C') {
        exit();
    }

    $allStatus = ['RECEIVED', 'PREPARING', 'READY', 'DELIVERED'];
    $position = array_search($orderInfo->{'status'}, $allStatus);

    
    if (!$position) exit();

    if (($_SESSION['type'] === 'O') && ($position > 2)) {
        exit();
    } 

    if (($_SESSION['type'] === 'E') && ($position < 2)) {
        exit();
    } 
    

    Order::updateOrderStatus($db, intval($orderInfo->{'order'}), $orderInfo->{'status'});
    
?>