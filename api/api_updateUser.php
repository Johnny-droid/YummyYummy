<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/user.class.php');
    

    $db = getDatabaseConnection();
    
    $str_json = $_POST['info_json'];

    $info = json_decode($str_json);

    if (!isset($_SESSION['id'])) {
        exit();
    }

    switch ($info->{'param'}) {
        case 'age':
            $newString = User::updateAge($db, $_SESSION['id'], intval($info->{'value'}));
            break;

        case 'address':
            $newString = User::updateAddress($db, $_SESSION['id'], $info->{'value'});
            break;

        case 'phoneNumber':
            $newString = User::updatePhoneNumber($db, $_SESSION['id'], intval($info->{'value'})); 
            break; 

        case 'email':
            $newString = User::updateEmail($db, $_SESSION['id'], $info->{'value'});
            break; 

        case 'bio': 
            $newString = User::updateBio($db, $_SESSION['id'], $info->{'value'});
            break; 

        default:
            break;
    }
    
    echo json_encode($newString);
    
?>