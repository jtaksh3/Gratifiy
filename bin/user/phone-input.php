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

    $sender = 'GRATIFIY';
    $otp = rand(1000, 9999);

    $_SESSION['session_otp'] = $otp;
                
$field = array(
    "sender_id" => "GRTFY",
    "language" => "english",
    "route" => "p",
    "numbers" => $phone,
    "message" => "Your One time Password for the verification is " . $otp,
    "variables" => "{#AA#}|{#CC#}",
    "variables_values" => "12345|asdaswdx"
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($field),
  CURLOPT_HTTPHEADER => array(
    "authorization: 0oNkxdUWGBqjCHETf2psDIPyJzw64VgFXlaem8S9MARbvYicnKrljkiO1KVt7sZzBxq9RLW8YgAHphS0",
    "cache-control: no-cache",
    "accept: */*",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err)
  exit('OTP Failed');
else
  exit('OTP Success');

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