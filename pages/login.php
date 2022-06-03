<?php
    declare(strict_types = 1);

    session_start();

    require_once("template/common.php"); 
    require_once("template/login.tpl.php"); 

    output_header(); 
    output_login();
    output_footer(); 
?>
