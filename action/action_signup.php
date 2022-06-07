<?php
    declare(strict_types = 1);

    session_start();

    require_once( __DIR__ . '/../database/connection.db.php');
    require_once( __DIR__ . '/../database/user.class.php');
    require_once( __DIR__ . '/../database/restaurant_owner.class.php');
    require_once( __DIR__ . '/../database/client.class.php');

    $db = getDatabaseConnection();

    $existsClient = Client::existsWithUsername($db, $_POST['username']);
    $existsRestaurantOwner = RestaurantOwner::existsWithUsername($db, $_POST['username']);

    if ($existsClient || $existsRestaurantOwner) {
        header('Location: ' . __DIR__ .'/../pages/signup.php?error=1');
    
    } else if (!Client::saveUser($db, $_POST['username'], $_POST['password'], $_POST['address'], $_POST['phoneNumber'])) {
    //sha1($_POST['password'])
        header('Location: ' . __DIR__ .'/../pages/signup.php?error=2');
    
    } else if ($client = Client::getClientWithPassword($db, $_POST['username'], $_POST['password'])) {
        $_SESSION['id'] = $client->id;
        $_SESSION['username'] = $client->name;
        $_SESSION['isClient'] = true;
        /*
        Add this to the restaurant owner
        if ($user->type === 'O') {
            $restaurants = Restaurant::getOwnerRestaurants($db, $user->id);
            $ids_restaurants_owned = array();
            foreach ($restaurants as $restaurant) {
            $ids_restaurants_owned[$restaurant->id] = true; // works as a set 
            }
            $_SESSION['ids_restaurants_owned'] = $ids_restaurants_owned; 
        }
        */

        header('Location:' . __DIR__ . '/../pages/index.php');
    
    } else {
        header('Location: ' . __DIR__ .'/../pages/signup.php?error=3');
    }

    
?>