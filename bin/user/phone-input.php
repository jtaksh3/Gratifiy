<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Project/bin/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Project/bin/user/user.php';

if (isset($_POST['phoneno'])) {

	$phone = $_POST['phoneno'];

	$db = new Database();
        
    $userDB = $db->getUserDBConnection();

    $user = new User($userDB);

    $response = $user->setPhone($phone);

    $response = $user->doesPhoneAlreadyExist();

    if($response)
    	exit('Already_Registered');

    session_start();

    $otp = rand(1000, 9999);

    $_SESSION['session_otp'] = $otp;
    
    $username="jtaksh3";

    $password="Aksh1234*";

    $message="Your OTP for the Verification is " . $otp;

    $sender=" TestID";

    $url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3');

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $curl_scraped_page = curl_exec($ch);

    curl_close($ch);

    exit('OTP_SUCCESS');

}

elseif (isset($_POST['phone1']) && isset($_POST['phone2']) && isset($_POST['phone3']) && isset($_POST['phone4'])) {

    session_start();

    $otp = ($_POST['phone1'] * 1000) + ($_POST['phone2'] * 100) + ($_POST['phone3'] * 10) + $_POST['phone4'];

    if($otp == $_SESSION['session_otp'])
        exit('Verification Success');
    else
        exit('You have entered a Wrong OTP');
}

?>