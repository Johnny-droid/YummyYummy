<?php
  // Create folders if they don't exist

  declare(strict_types = 1);

  session_start();
  var_dump($_SESSION['id']);

  // Generate filenames for original, small and medium files
  $fileName = "../images/Users/avatar" . $_SESSION['id'] . ".jpg";

  $smallFileName = "images/thumbs_small/$id.jpg";
  $mediumFileName = "images/thumbs_medium/$id.jpg";

  // Move the uploaded file to its final destination
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);

  header ('Location: ' . $_SERVER['HTTP_REFERER']);
?>
