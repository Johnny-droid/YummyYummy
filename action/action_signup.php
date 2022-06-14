<?php
    declare(strict_types = 1);

    session_start();

    require_once( __DIR__ . '/../database/connection.db.php');
    require_once( __DIR__ . '/../database/user.class.php');

    $db = getDatabaseConnection();
    $userType; 
    
    $username = preg_replace('/[^a-zA-Z\s]/', '', $_POST['username']);
    $address = preg_replace('/[^a-zA-Z\s]/', '', $_POST['address']);
    $phoneNumber = preg_replace('/\D/', '', $_POST['phoneNumber']);
    $email = preg_replace('/[^a-zA-Z@.\s]/', '', $_POST['email']);
    $age = preg_replace('/\D/', '', $_POST['age']);
    $bio = preg_replace('/[^a-zA-Z!?.@,\s]/', '', $_POST['bio']);

    
    if($_POST['accountType'] === 'client') {
        $userType = 'C'; 
    } else if($_POST['accountType'] === 'courier') {
        $userType = 'E';
    } else {
        header('Location: /../pages/signup.php?error=3');
        exit();
    }
    
    $existsUser = User::existsWithUsername($db, $username);

    if ($existsUser) {
        header('Location: /../pages/signup.php?error=1');
    
    } else if (!User::saveUser($db, $username, $_POST['password'], $address, $phoneNumber, $email, intval($age), $bio, $userType)) {

        header('Location: /../pages/signup.php?error=2');
    
    } else if ($user = User::getUserWithPassword($db, $username, $_POST['password'])) {
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->name;
        $_SESSION['type'] = 'C';
        
        if ($user->type === 'O') {
            $restaurants = Restaurant::getOwnerRestaurants($db, $user->id);
            $ids_restaurants_owned = array();
            foreach ($restaurants as $restaurant) {
                $ids_restaurants_owned[$restaurant->id] = true; // works as a set 
            }
            $_SESSION['ids_restaurants_owned'] = $ids_restaurants_owned; 
        }

        header('Location: /../index.php');
    
    } else {
        header('Location: /../pages/signup.php?error=3');
    }

    
?>