<?php

    // INCLUDE DEPENDENCIES
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/user/user.php';

    // CHECKS IF VARIABLE IS SET
    if (isset($_POST['phoneno'])) {
    
        // ASSIGNING PHONE VALUE TO A VARIABLE
	    $phone = $_POST['phoneno'];

	    //CREATING OBJECT FOR DATABASE CLASS
        $db = new Database();
    
        // ESTABLISHING THE CONNECTION BY CALLING DATABASE CLASS FUNCTION
        $userDB = $db->getUserDBConnection();
    
        // CREATING OBJECT FOR USER CLASS BY PASSING DATABASE CLASS OBJECT TO ITS CONSTRUCTOR
        $user = new User($userDB);
    
        // SETTING PHONE VALUE BY CALLING USER CLASS SETTER FUNCTION
        $user->setPhone($phone);
    
        // CHECKS IF PHONE ALREADY EXIST BY CALLING PHONE ALREADY EXIST FUNCTION OF USER CLASS
        if($user->doesPhoneAlreadyExist())
            // EXIT ON ALREADY REGISTERED
            exit(json_encode(array("code" => 'ALREADY_REGISTERED')));
    
        // IF PHONE DOESN'T EXIST THEN SEND OTP TO PHONE BY CALLING PHONE OTP FUNCTION OF USER CLASS
        if($user->sendPhoneOTP())
            // EXIT ON OTP SENT SUCCESSFULLY
            exit(json_encode(array("code" => 'OTP_SENT_SUCCESSFULLY')));
    
        // EXIT ON OTP SENDING FAILED
        exit(json_encode(array("code" => 'OTP_SENT_FAILED')));

    }

    // CHECKS IF VARIABLE IS SET
    if (isset($_POST['phone1']) && isset($_POST['phone2']) && isset($_POST['phone3']) && isset($_POST['phone4'])) {

        //CREATING OBJECT FOR DATABASE CLASS
        $db = new Database();
    
        // ESTABLISHING THE CONNECTION BY CALLING DATABASE CLASS FUNCTION
        $userDB = $db->getUserDBConnection();
    
        // CREATING OBJECT FOR USER CLASS BY PASSING DATABASE CLASS OBJECT TO ITS CONSTRUCTOR
        $user = new User($userDB);
    
        // ASSIGNING USER ENTERED OTP TO A VARIABLE (FOUR DIFFERENT FIELDS COMBINING INTO ONE)
        $otp = ($_POST['phone1'] * 1000) + ($_POST['phone2'] * 100) + ($_POST['phone3'] * 10) + $_POST['phone4'];

        // CHECKS IF VERIFICATION TIMEOUT OCCURS BY CALLING IS TIMEOUT FUNCTION OF USER CLASS
        if($user->isTimeout())
            // EXIT ON TIMEOUT
            exit(json_encode(array("code" => 'TIMEOUT')));
    
        // CHECKS IF USER OTP MATCHED BY CALLING MATCH OTP FUNCTION OF USER CLASS
        if($user->matchOTP($otp))
            // EXIT ON OTP MATCHED SUCCESSFUL
            exit(json_encode(array("code" => 'OTP_MATCHED_SUCCESSFUL')));
    
        // EXIT ON OTP MATCH FAILED
        exit(json_encode(array("code" => 'OTP_MATCH_FAILED')));
        
    }
    
    // CHECKS IF VARIABLE IS SET
    if (isset($_POST['resend'])) {
        
        //CREATING OBJECT FOR DATABASE CLASS
        $db = new Database();
        
        // ESTABLISHING THE CONNECTION BY CALLING DATABASE CLASS FUNCTION
        $userDB = $db->getUserDBConnection();
        
        // CREATING OBJECT FOR USER CLASS BY PASSING DATABASE CLASS OBJECT TO ITS CONSTRUCTOR
        $user = new User($userDB);
    
        // SETTING PHONE VALUE BY CALLING USER CLASS SETTER FUNCTION
        $user->setPhone($phone);
    
        // SEND OTP BY CALLING SEND PHONE OTP FUNCTION OF USER CLASS
        if($user->sendPhoneOTP())
            // EXIT ON OTP SENT SUCCESSFULLY
            exit(json_encode(array("code" => 'OTP_SENT_SUCCESSFULLY')));
    
        // EXIT ON OTP SENT FAILED
        exit(json_encode(array("code" => 'OTP_SENT_FAILED')));

    }
    
?>