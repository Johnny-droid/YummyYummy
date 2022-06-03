<?php
  declare(strict_types = 1);

  session_start();

  require_once(__DIR__ .'/../database/connection.db.php');
  require_once(__DIR__ .'/../database/user.class.php');

  $db = getDatabaseConnection();

  $user = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);

  if ($user) {
    $_SESSION['id'] = $user->id;
    $_SESSION['username'] = $user->name;
    $_SESSION['type'] = $user->type;
  } 

  header('Location: ' . __DIR__ .'/../index.php');
?>