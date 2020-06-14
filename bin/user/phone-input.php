<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/user/user.php';

if (isset($_POST['phoneno'])) {

	  $phone = $_POST['phoneno'];

	  $db = new Database();
        
    $userDB = $db->getUserDBConnection();

    $user = new User($userDB);

    $user->setPhone($phone);

    if($user->doesPhoneAlreadyExist())
        exit(json_encode(array("code" => 'ALREADY_REGISTERED')));

    if($user->sendPhoneOTP($phone))
        exit(json_encode(array("code" => 'OTP_SENT_SUCCESSFULLY')));
    
    exit(json_encode(array("code" => 'OTP_SENT_FAILED')));

}

if (isset($_POST['phone1']) && isset($_POST['phone2']) && isset($_POST['phone3']) && isset($_POST['phone4'])) {

    $db = new Database();
        
    $userDB = $db->getUserDBConnection();

    $user = new User($userDB);

    $otp = ($_POST['phone1'] * 1000) + ($_POST['phone2'] * 100) + ($_POST['phone3'] * 10) + $_POST['phone4'];

    if($user->isTimeout())
        exit(json_encode(array("code" => 'TIMEOUT')));

    if($user->matchOTP($otp))
        exit(json_encode(array("code" => 'OTP_MATCHED_SUCCESSFUL')));

    exit(json_encode(array("code" => 'OTP_MATCH_FAILED')));
}

?>