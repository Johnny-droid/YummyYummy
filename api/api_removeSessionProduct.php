<?php
    declare(strict_types = 1);

    session_start();
    
    $products = $_SESSION['products'];

    $products = \array_diff($products, [$_GET['id_product']]);

    $_SESSION['products'] = $products;
    
?>