<?php
    declare(strict_types = 1);

    session_start();

    require_once(__DIR__ . '/../template/common.php'); 
    require_once(__DIR__ . '/../template/login.tpl.php'); 

    output_header(); 
    output_login();
    output_footer(); 
?>
