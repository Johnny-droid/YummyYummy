<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/user.class.php');

    $db = getDatabaseConnection();
    
    $str_json = $_POST['favInfo_json'];

    $favInfo = json_decode($str_json);

    $isFavourite = User::existsFavourite($db, $favInfo->{'user'}, $favInfo->{'restaurant'}, $favInfo->{'change'});

    echo json_encode($isFavourite);
?>