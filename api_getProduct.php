<?php
    declare(strict_types = 1);

    session_start();

    require_once('database/connection.db.php');
    require_once('database/product.class.php');

    $db = getDatabaseConnection();

    $product = Product::getProduct($db, intval($_GET['id_product']));

    echo json_encode($product);
    
?>