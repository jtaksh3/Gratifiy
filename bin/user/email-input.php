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

    // CHECKS IF EMAIL ALREADY EXIST
    if($user->doesEmailAlreadyExist())
        exit(json_encode(array("code" => 'ALREADY_REGISTERED')));
    
    // IF EMAIL DOESN'T EXIST THEN SEND OTP TO EMAIL
    if($user->sendEmailOTP($phone))
        exit(json_encode(array("code" => 'OTP_SENT_SUCCESSFULLY')));
    
    // IF OTP SENDING FAILED
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
    
    // CHECKS IF VERIFICATION TIMEOUT OCCURS
    if($user->isTimeout())
        exit(json_encode(array("code" => 'TIMEOUT')));

    // CHECKS IF USER OTP MATCHED
    if($user->matchOTP($otp))
        exit(json_encode(array("code" => 'OTP_MATCHED_SUCCESSFUL')));
    
    // IF OTP MATCH FAILED
    exit(json_encode(array("code" => 'OTP_MATCH_FAILED')));
}

// CHECKS IF VARIABLE IS SET
if (isset($_POST['resend'])) {

    // IF OTP SENT SUCCESSFULLY
    if($user->sendPhoneOTP($phone))
        exit(json_encode(array("code" => 'OTP_SENT_SUCCESSFULLY')));
    
    // IF OTP SENT FAILED
    exit(json_encode(array("code" => 'OTP_SENT_FAILED')));
}

?>