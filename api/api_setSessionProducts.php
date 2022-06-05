<?php
    declare(strict_types = 1);

    session_start();
    
    $str_json = $_POST['products_json'];

    $_SESSION['products'] = json_decode($str_json);

    //$_SESSION['products'] = array();

    //echo $str_json;

    /*
    if (isset($_SESSION['products']) && !empty($_SESSION['products']) && $_GET['id_product']) {
        array_push($_SESSION['products'], $_GET['id_product']);
        echo json_encode($_SESSION['products']);
    } else if (isset($_SESSION['products']) && !$_GET['id_product']) {
        echo json_encode($_SESSION['products']);
    } else {
        $_SESSION['products'] = array($_GET['id_product']);
        echo json_encode($_SESSION['products']);
    }
    */
?>