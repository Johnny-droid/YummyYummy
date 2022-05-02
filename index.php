<?php
    declare(strict_types = 1);

    require_once("template/common.php"); 
    require_once("template/home.tpl.php"); 

    require_once("database/connection.db.php");
    require_once("database/category.class.php");

    $db = getDatabaseConnection();

    $categories = Category::getCategories($db);

    output_header(); 
    output_home_page($categories);
    output_footer();
?>