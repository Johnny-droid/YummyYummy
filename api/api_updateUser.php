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
            $age = preg_replace('/\D/', '', $info->{'value'});
            $newString = User::updateAge($db, $_SESSION['id'], intval($age));
            break;

        case 'address':
            $address = preg_replace('/[^a-zA-Z\s]/', '', $info->{'value'});
            $newString = User::updateAddress($db, $_SESSION['id'], $address);
            break;

        case 'phoneNumber':
            $phoneNumber = preg_replace('/\D/', '', $info->{'value'});
            $newString = User::updatePhoneNumber($db, $_SESSION['id'], intval($phoneNumber)); 
            break; 

        case 'email':
            $email = preg_replace('/[^a-zA-Z@.\s]/', '',  $info->{'value'});
            $newString = User::updateEmail($db, $_SESSION['id'], $email);
            break; 

        case 'bio': 
            $bio = preg_replace('/[^a-zA-Z!?.@,\s]/', '', $info->{'value'});
            $newString = User::updateBio($db, $_SESSION['id'], $bio);
            break; 

        default:
            break;
    }
    
    echo json_encode(htmlentities($newString));
    
?>