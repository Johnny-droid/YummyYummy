<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/product.class.php');
    

    $db = getDatabaseConnection();
    
    $str_json = $_POST['info_discount_json'];

    $info_discount = json_decode($str_json);

    if (!isset($_SESSION['id']) || $_SESSION['type'] !== 'O' || !isset($_SESSION['id_restaurant']) || !isset($_SESSION['ids_restaurants_owned'])) {
        exit();
    }

    if(!isset($_SESSION['ids_restaurants_owned'][$_SESSION['id_restaurant']])) {
        exit(); 
    }

    $id_product = intval($info_discount->{'product'});
    $discount = intval($info_discount->{'discount'});

    if ($discount < 0 || $discount > 100) exit();

    Product::updateDiscount($db, $id_product, $discount);

    $product = Product::getProduct($db, $id_product);

    echo json_encode($product);
?>