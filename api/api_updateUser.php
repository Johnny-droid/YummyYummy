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
            
            break;

        case 'phoneNumber': 
            break; 

        case 'email':
            break; 

        case 'bio': 
            break; 

        default:
            break;
    }
    
    echo json_encode($newString);
    
?>