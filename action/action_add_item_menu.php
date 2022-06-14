<?php
    declare(strict_types = 1); 

    session_start(); 

    require_once( __DIR__ . '/../database/connection.db.php'); 
    require_once( __DIR__ . '/../database/product.class.php'); 

    $db = getDatabaseConnection(); 
    $id_restaurant = $_SESSION['id_restaurant']; 
    $name = preg_replace('/[^a-zA-Z\s]/', '', $_POST['itemName']); 
    $price = floatval(preg_replace('/\D.,/', '', $_POST['itemPrice'])); 


    if(!isset($_SESSION['id_restaurant']) || !isset($_SESSION['id']) || $_SESSION['type'] !== 'O') {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_product=1'); //add error
        exit();
    }

    if($id_restaurant <= 0 || $name === '' || $price < 0 || !isset($_SESSION['ids_restaurants_owned'][$_SESSION['id_restaurant']])) {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_product=2'); //add error
        exit();
    }
    
    $verifier = Product::addItem($db, $name, $price, $id_restaurant); 

    if(!$verifier) {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_product=3'); //add error
        exit();
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>