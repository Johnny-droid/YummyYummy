<?php
    declare(strict_types = 1);

    session_start();

    require_once('/../database/connection.db.php');
    require_once('/../database/order.class.php');
    require_once('/../database/product.class.php');


    $db = getDatabaseConnection();
    $products = $_SESSION['products'];
    $success = false;

    if (isset($_SESSION['id']) && $_SESSION['type'] === 'C' && $products !== new stdClass()) {
        // check if all products belong to the same restaurant before inserting the order
        $diferent_found = false;
        $id_first_restaurant = array_key_first($products);
        foreach ($products as $id_product=>$quantity) {
            $product = Product::getProduct($db, $id_product);
            if ($product->id_restaurant !== $_id_first_restaurant) {
                $diferent_found = true;
            }
        } 

        // Now we can insert the order
        if (!$diferent_found) {
            $success = Order::insertOrder($db, $_SESSION['id'], $products);
        }

        if ($success) {
            header ('Location: ../pages/orders.php');
        }

    }

    //$_SESSION['products']

    
    
?>