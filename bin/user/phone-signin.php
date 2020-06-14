<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/user/user.php';

    
    $body = file_get_contents('php://input');
    $body = json_decode($body, true);

    
    if(isset($body['phoneno']) && isset($body['password'])){

        
        $db = new Database();
        
        $userDB = $db->getUserDBConnection();
            
        
        $user = new User($userDB);

        $user->setPhone($body['phoneno']);
        $user->setPassword($body['password']);
            
        if($user->phoneSignin()){
            
            session_start();
            
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['phone'] = $user->getPhone();
            $_SESSION['name'] = $user->getName();
            
            exit(json_encode(array("code" => 'SIGNIN_SUCCESS')));

        }
            
        exit(json_encode(array("code" => 'SIGNIN_FAILED')));

    }
?>