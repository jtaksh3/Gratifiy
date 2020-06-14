<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/user/user.php';


$body = file_get_contents('php://input');
$body = json_decode($body, true);

    
    if (isset($body['phoneno']) && isset($body['password']) && isset($body['name']) && isset($body['email'])) {

        $phone = $body['phoneno'];  
        $name = $body['name'];  
        $password = $body['password']; 
        $email = $body['email']; 

        
        $db = new Database();
        
        $userDB = $db->getUserDBConnection();

        
        $user = new User($userDB);

        
        $user->setName($name);
        $user->setEmail($email);
        $user->setPhone($phone);
        $user->setPassword($password);
        $user->setCreated(date('Y-m-d H:i:s'));

        if ($user->signup())
            exit(json_encode(array("code" => "SIGNUP_SUCCESS")));

        exit(json_encode(array("code" => "SIGNUP_FAILED")));

    }
?>