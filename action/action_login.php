<?php
  declare(strict_types = 1);

  session_start();

  require_once(__DIR__ .'/../database/connection.db.php');
  require_once(__DIR__ .'/../database/user.class.php');
  require_once(__DIR__ . '/../database/restaurant.class.php');

  $db = getDatabaseConnection();

  $user = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);

  if ($user) {
    $_SESSION['id'] = $user->id;
    $_SESSION['username'] = $user->name;
    $_SESSION['type'] = $user->type;
    $_SESSION['products'] = new stdClass();
  } 

  if ($user->type === 'O') {
    $restaurants = Restaurant::getOwnerRestaurants($db, $user->id);
    $ids_restaurants_owned = array();
    foreach ($restaurants as $restaurant) {
      $ids_restaurants_owned[$restaurant->id] = true; // works as a set 
    }
    $_SESSION['ids_restaurants_owned'] = $ids_restaurants_owned; 
  }


  header ('Location: '. $_SERVER['HTTP_REFERER'] . '/../../index.php');
?>