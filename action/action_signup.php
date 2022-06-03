<?php
    declare(strict_types = 1);

    session_start();

    require_once('database/connection.db.php');
    require_once('database/user.class.php');
    require_once('database/restaurant_owner.class.php');
    require_once('database/client.class.php');

    $db = getDatabaseConnection();

    $existsClient = Client::existsWithUsername($db, $_POST['username']);
    $existsRestaurantOwner = RestaurantOwner::existsWithUsername($db, $_POST['username']);

    if ($existsClient || $existsRestaurantOwner) {
        header('Location: signup.php?error=1');
    
    } else if (!Client::saveUser($db, $_POST['username'], $_POST['password'], $_POST['address'], $_POST['phoneNumber'])) {
    //sha1($_POST['password'])
        header('Location: signup.php?error=2');
    
    } else if ($client = Client::getClientWithPassword($db, $_POST['username'], $_POST['password'])) {
        $_SESSION['id'] = $client->id;
        $_SESSION['username'] = $client->name;
        $_SESSION['isClient'] = true;
        header('Location: index.php');
    
    } else {
        header('Location: signup.php?error=3');
    }

    
?>