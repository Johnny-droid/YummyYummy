<?php
    declare(strict_types = 1);

    session_start();
    
    require_once("template/common.php"); 
    require_once("template/restaurant.tpl.php"); 

    require_once("database/connection.db.php");

    $db = getDatabaseConnection();

    output_header(); 

    output_footer();
?>

