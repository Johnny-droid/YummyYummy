<?php
  declare(strict_types = 1);

  session_start();

  require_once('database/connection.db.php');
  require_once('database/user.class.php');
  require_once('database/restaurant_owner.class.php');
  require_once('database/client.class.php');

  $db = getDatabaseConnection();

  $client = Client::getClientWithPassword($db, $_POST['username'], $_POST['password']);
  $restaurant_owner = RestaurantOwner::getRestaurantOwnerWithPassword($db, $_POST['username'], $_POST['password']);

  if ($client) {
    $_SESSION['id'] = $client->id;
    $_SESSION['name'] = $client->name;
    $_SESSION['isClient'] = true;
  } else if ($restaurant_owner) {
    $_SESSION['id'] = $restaurant_owner->id;
    $_SESSION['name'] = $restaurant_owner->name;
    $_SESSION['isClient'] = false;
  }

  header('Location: index.php');
?>