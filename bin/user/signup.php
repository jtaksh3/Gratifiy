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

        
        $response = $user->signup();

        if ($response == 'SIGNUP_SUCCESS') {
            
            exit(json_encode(array("code" => $response)));

        } else {
            
            exit(json_encode(array("code" => 'SERVER ERROR')));

        }
    } else {
    
    exit(json_encode(array("code" => 'FORM_NOT_SUBMITTED')));
    
    }
?>