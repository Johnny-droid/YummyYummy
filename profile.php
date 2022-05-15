<?php
    declare(strict_types = 1);

    session_start();

    require_once("template/common.php"); 
    require_once("template/profile.tpl.php"); 

    require_once("database/connection.db.php");
    
    require_once("database/user.class.php");

    $db = getDatabaseConnection();

    if (isset($_SESSION['id'])) {
        $user = User::getUser($db, $_SESSION['id']);
    } 

    output_header();
    if($user) { output_profile($user); } 
    else {header('Location: index.php');}
    output_footer();
?>

