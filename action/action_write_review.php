<?php
    declare(strict_types = 1);

    session_start();

    require_once( __DIR__ . '/../database/connection.db.php');
    require_once( __DIR__ . '/../database/review.class.php');

    $db = getDatabaseConnection();
    $rating = intval(preg_replace('/\D/', '', $_POST['rating']));
    $price = intval(preg_replace('/\D/', '', $_POST['price']));
    $comment = preg_replace('/[^a-zA-Z!?.@,\s]/', '', $_POST['comment']);

    if (!isset($_SESSION['id']) || !isset($_SESSION['id_restaurant']) || $_SESSION['type'] !== 'C') {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_review=1'); //add error
        exit();
    }

    if ($rating < 1 || $rating > 5 || $price < 1 || $price > 5) {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_review=2'); //add error
        exit();
    }

    $success = Review::addReview($db, $_SESSION['id'], $_SESSION['id_restaurant'], $rating, $price, $comment);

    if (!$success) {
        $url = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url['query'], $query);
        header('Location: ../pages/restaurant.php?id=' . preg_replace('/\D/', '', $query['id']) . '&error_review=3'); //add error
        exit();
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>