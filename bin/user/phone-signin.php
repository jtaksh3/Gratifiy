<?php
    
    // INCLUDE DEPENDENCIES
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/user/user.php';

    // GETTING SUBMITTED DATA
    $body = file_get_contents('php://input');//READ_ONLY_STREAM->READ RAW DATA FROM REQUEST BODY AND THEN THE FUNCTION IS USED TO READ A FILE INTO A STRING.
    $body = json_decode($body, true);//THIS FUNCTION TAKES A JSON STRING AND CONVERTS IT INTO A VARIABLE (TRUE->ARRAY).

    // CHECKS IF VARIABLE IS SET
    if(isset($body['phoneno']) && isset($body['password'])) {
        
        //CREATING OBJECT FOR DATABASE CLASS
        $db = new Database();
    
        // ESTABLISHING THE CONNECTION BY CALLING DATABASE CLASS FUNCTION
        $userDB = $db->getUserDBConnection();
    
        // CREATING OBJECT FOR USER CLASS BY PASSING DATABASE CLASS OBJECT TO ITS CONSTRUCTOR
        $user = new User($userDB);
        
        // SETTING PHONE AND PASSWORD VALUE BY CALLING USER CLASS SETTER FUNCTION
        $user->setPhone($body['phoneno']);
        $user->setPassword($body['password']);
        
        // CHECKS FOR VALID CREDENTIALS BY CALLING PHONE SIGNIN FUNCTION OF USER CLASS
        if($user->phoneSignin()) {
            
            // STARTS THE SESSION
            session_start();
            
            // CREATING SESSION VARIABLES AND ASSIGNING THEM VALUES
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['phone'] = $user->getPhone();
            $_SESSION['name'] = $user->getName();
            
            // EXIT ON SIGN IN SUCCESS
            exit(json_encode(array("code" => 'SIGNIN_SUCCESS')));

        }
        
        // EXIT ON SIGN IN FAILED
        exit(json_encode(array("code" => 'SIGNIN_FAILED')));

    }
?>