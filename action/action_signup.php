<?php
    declare(strict_types = 1);

    session_start();

    require_once( __DIR__ . '/../database/connection.db.php');
    require_once( __DIR__ . '/../database/user.class.php');

    $db = getDatabaseConnection();
    $userType; 

    $existsUser = User::existsWithUsername($db, $_POST['username']);

    if($_POST['accountType'] === 'client') {
        $userType = 'C'; 
    } else if($_POST['accountType'] === 'courier') {
        $userType = 'E';
    }

    if ($existsUser) {
        header('Location: /../pages/signup.php?error=1');
    
    } else if (!User::saveUser($db, $_POST['username'], $_POST['password'], $_POST['address'], $_POST['phoneNumber'], 
                                $_POST['email'], intval($_POST['age']) ,$_POST['bio'], $userType)) {
    //sha1($_POST['password'])
        header('Location: /../pages/signup.php?error=2');
    
    } else if ($user = User::getUserWithPassword($db, $_POST['username'], $_POST['password'])) {
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