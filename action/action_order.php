<?php
    declare(strict_types = 1);

    session_start();

    require_once('/../database/connection.db.php');
    require_once('/../database/order.class.php');
    require_once('/../database/product.class.php');


    $db = getDatabaseConnection();

    if (isset($_SESSION['id']) && $_SESSION['type'] === 'C' && $_SESSION['products'] !== new stdClass()) {
        
    }

    //$_SESSION['products']

    
    header ('Location: ../pages/orders.php');
?>