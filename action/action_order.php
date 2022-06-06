<?php
    declare(strict_types = 1);

    session_start();

    require_once( __DIR__ . '/../database/connection.db.php');
    require_once( __DIR__ . '/../database/order.class.php');
    require_once( __DIR__ . '/../database/product.class.php');


    $db = getDatabaseConnection();
    $products = $_SESSION['products'];
    $success = false;

    if (isset($_SESSION['id']) && $_SESSION['type'] === 'C' && $products !== new stdClass()) {
        // check if all products belong to the same restaurant before inserting the order
        $diferent_found = false;
        $is_empty = true;
        $id_first_quantity = reset($products);
        $id_first_product = intval(key($products));
        $product = Product::getProduct($db, $id_first_product);
        $id_first_restaurant = $product->id_restaurant;

        foreach ($products as $id_product=>$quantity) {
            if ($quantity === 0) {continue;}
            
            $product = Product::getProduct($db, intval($id_product));
            
            if ($product->id_restaurant !== $id_first_restaurant) {
                $diferent_found = true;
            }
            $is_empty = false;
        } 

        // Now we can insert the order
        if (!$diferent_found && !$is_empty) {
            $success = Order::insertOrder($db, $_SESSION['id'], $products);

            if ($success) { 
                header ('Location: ../pages/orders.php');
                $_SESSION['products'] = new stdClass();
            }
        } else {
            header ('Location: ' . $_SERVER['HTTP_REFERER'] . '&error=1');
        }
    
    } else {
        header ('Location: ' . $_SERVER['HTTP_REFERER'] . '&error=2');
    }


    
?>