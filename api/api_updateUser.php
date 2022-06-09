<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/order.class.php');
    

    $db = getDatabaseConnection();
    
    $str_json = $_POST['info_json'];

    $info = json_decode($str_json);

    if (!isset($_SESSION['id'])) {
        exit();
    }

    switch ($info->{'param'}) {
        case 'age':
            # code...
            break;
        case 'address':
            # code...
            break;
        default:
            break;
    }
    

    //Order::updateOrderStatus($db, intval($orderInfo->{'order'}), $orderInfo->{'status'});
    
?>