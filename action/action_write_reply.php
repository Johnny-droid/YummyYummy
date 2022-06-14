<?php
    declare(strict_types = 1);

    session_start();

    require_once( __DIR__ . '/../database/connection.db.php');
    require_once( __DIR__ . '/../database/review.class.php');

    $db = getDatabaseConnection();
    $id_review = intval(preg_replace('/\D/', '', $_POST['id_review']));
    $reply = preg_replace('/[^a-zA-Z!?.@,\s]/', '', $_POST['reply']);

    if (!isset($_SESSION['id']) || !isset($_SESSION['id_restaurant']) || !isset($_SESSION['ids_restaurants_owned']) || $_SESSION['type'] !== 'O') {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_reply=1'); //add error
        exit();
    }

    if ($id_review <= 0 || $reply === '') {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_reply=2'); //add error
        exit();
    }

    if (!isset($_SESSION['ids_restaurants_owned'][$_SESSION['id_restaurant']])) {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_reply=3'); //add error
        exit();
    }


    $success = Review::addReply($db, $id_review, $reply);

    if (!$success) {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_reply=4'); //add error
        exit();
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
