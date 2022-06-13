<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/product.class.php');

    $db = getDatabaseConnection();

    
    if(!isset($_SESSION['id']) || $_SESSION['type'] !== 'O' || !isset($_SESSION['id_restaurant']) || !isset($_SESSION['ids_restaurants_owned'])) {
        exit(); 
    }

    if(!isset($_SESSION['ids_restaurants_owned'][$_SESSION['id_restaurant']])) {
        exit(); 
    }

    $str_json = $_POST['idProduct_json'];

    $idProduct = json_decode($str_json);

    Product::deleteItem($db, intval($idProduct->{'product'})); 
?>