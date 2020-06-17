<?php

    // INCLUDE DEPENDENCIES
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/config/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/user/user.php';

    // CHECKS IF VARIABLE IS SET
    if (isset($_POST['email'])) {

        // ASSIGNING EMAIL VALUE TO A VARIABLE
	    $email = $_POST['email'];

        //CREATING OBJECT FOR DATABASE CLASS
	    $db = new Database();
    
        // ESTABLISHING THE CONNECTION BY CALLING DATABASE CLASS FUNCTION
        $userDB = $db->getUserDBConnection();
    
        // CREATING OBJECT FOR USER CLASS BY PASSING DATABASE CLASS OBJECT TO ITS CONSTRUCTOR
        $user = new User($userDB);
    
        // SETTING EMAIL VALUE BY CALLING USER CLASS SETTER FUNCTION
        $user->setEmail($email);

        // CHECKS IF EMAIL ALREADY EXIST BY CALLING PHONE ALREADY EXIST FUNCTION OF USER CLASS
        if($user->doesEmailAlreadyExist())
            // EXIT ON OTP SENT SUCCESSFULLY
            exit(json_encode(array("code" => 'ALREADY_REGISTERED')));

        // GENERATE OTP BY CALLING GENERATE OTP FUNCTION OF USER CLASS
        $otp = $user->generateOTP();

        // HTML MESSAGE TO BE SENT
        $htmlMessage = "Your OTP for the Verification is <b>" . $otp . "</b> which is valid for 3 minutes";

        // RAW MESSAGE TO BE SENT
        $rawMessage = "Your OTP for the Verification is " . $otp . " which is valid for 3 minutes";
    
        // IF EMAIL DOESN'T EXIST THEN SEND OTP TO EMAIL BY CALLING PHONE OTP FUNCTION OF USER CLASS
        if($user->sendEmail('Verification', $htmlMessage, $rawMessage))
            // EXIT ON OTP MATCHED SUCCESSFUL
            exit(json_encode(array("code" => 'OTP_SENT_SUCCESSFULLY')));
    
        // EXIT ON OTP SENDING FAILED
        exit(json_encode(array("code" => 'OTP_SENT_FAILED')));

    }

    // CHECKS IF VARIABLE IS SET
    if (isset($_POST['email1']) && isset($_POST['email2']) && isset($_POST['email3']) && isset($_POST['email4'])) {

        //CREATING OBJECT FOR DATABASE CLASS
        $db = new Database();
    
        // ESTABLISHING THE CONNECTION BY CALLING DATABASE CLASS FUNCTION
        $userDB = $db->getUserDBConnection();
    
        // CREATING OBJECT FOR USER CLASS BY PASSING DATABASE CLASS OBJECT TO ITS CONSTRUCTOR
        $user = new User($userDB);
    
        // ASSIGNING USER ENTERED OTP TO A VARIABLE (FOUR DIFFERENT FIELDS COMBINING INTO ONE)
        $otp = ($_POST['email1'] * 1000) + ($_POST['email2'] * 100) + ($_POST['email3'] * 10) + $_POST['email4'];
    
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
    if (isset($_POST['resend-email'])) {

        // ASSIGNING EMAIL VALUE TO A VARIABLE
        $email = $_POST['resend-email'];

        //CREATING OBJECT FOR DATABASE CLASS
        $db = new Database();
    
        // ESTABLISHING THE CONNECTION BY CALLING DATABASE CLASS FUNCTION
        $userDB = $db->getUserDBConnection();
    
        // CREATING OBJECT FOR USER CLASS BY PASSING DATABASE CLASS OBJECT TO ITS CONSTRUCTOR
        $user = new User($userDB);

        // GENERATE OTP BY CALLING GENERATE OTP FUNCTION OF USER CLASS
        $otp = $user->generateOTP();

        // HTML MESSAGE TO BE SENT
        $htmlMessage = "Your OTP for the Verification is <b>" . $otp . "</b> which is valid for 3 minutes";

        // RAW MESSAGE TO BE SENT
        $rawMessage = "Your OTP for the Verification is " . $otp . " which is valid for 3 minutes";

        // SEND OTP BY CALLING SEND EMAIL OTP FUNCTION OF USER CLASS
        if($user->sendEmail('Verification', $htmlMessage, $rawMessage))
            // EXIT ON OTP SENT SUCCESSFULLY
            exit(json_encode(array("code" => 'OTP_SENT_SUCCESSFULLY')));
    
        // EXIT ON OTP SENT FAILED
        exit(json_encode(array("code" => 'OTP_SENT_FAILED')));
        
    }

?>