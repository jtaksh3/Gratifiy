<?php

// INCLUDE DEPENDENCIES
include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/config/database.php';

class User
{
    private $conn;

    // DATABASE TABLE NAMES
    private $login_credentials = "Login_Credentials";
    private $user_per_details = "User_Personal_Details";
    
    // TABLE FIELDS
    private $email;
    private $name;
    private $password;
    private $phone;
    private $created;
    
    // CONSTRUCTOR
    function __construct($db)
    {
        $this->conn = $db;
    }

    // GETTERS
    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getName()
    {
        return $this->name;
    }

    // SETTERS
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }


    // FUNCTION TO CHECK IF PHONE IS ALREADY EXIST
    public function doesPhoneAlreadyExist()
    {   
        // SELECT FROM THE DATABASE
        $query = "SELECT Phone FROM " . $this->login_credentials . " WHERE Phone='" . $this->phone . "'";

        // PREPARE QUERY STATEMENT
        $stmt = $this->conn->prepare($query);

        // EXECUTE QUERY
        $stmt->execute();

        // FETCH A ROW
        $result = $stmt->fetch();

        // IF PHONE DOESN'T EXIST
        if ($result == false)
            return false;

        // IF PHONE EXIST
        return true;
    }

    // FUNCTION TO CHECK IF EMAIL IS ALREADY EXIST
    public function doesEmailAlreadyExist()
    {
        // SELECT FROM THE DATABASE
        $query = "SELECT Email FROM " . $this->login_credentials . " WHERE Email='" . $this->email . "'";

        // PREPARE QUERY STATEMENT
        $stmt = $this->conn->prepare($query);

        // EXECUTE QUERY
        $stmt->execute();

        // FETCH A ROW
        $result = $stmt->fetch();

        //  IF EMAIL DOESN'T EXIST
        if ($result == false)
            return false;
        
        // IF EMAIL EXIST
        return true;
    }
    
    // FUNCTION TO SEND OTP ON PHONE
    public function sendPhoneOTP()
    {   
        // STARTS THE SESSION
        session_start();
        
        // GENERATE THE 4 DIGIT RANDOM OTP
        $otp = rand(1000, 9999);
        
        // ASSIGNING 4 DIGIT RANDOM OTP TO SESSION VARIABLE
        $_SESSION['otp'] = $otp;
        
        // ASSIGNING THE CURRENT TIME IN SECONDS TO THE SESSION VARIABLE
        $_SESSION['time'] = time();
        
        // USERNAME OF SMS GATEWAY ACCOUNT
        $username="jtaksh3";
        
        // PASSWORD OF SMS GATEWAY ACCOUNT
        $password="Aksh1234*";
        
        // MESSAGE TO BE SENT
        $message="Your OTP for the Verification is " . $otp . " which is valid for 3 minutes";
        
        // SENDER ID FOR MESSAGE
        $sender=" TestID";
        
        // API LINK OF SMS GATEWAY ALONG WITH DATA
        $url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($this->phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3');
        
        // INITIALIZE A NEW SESSION AND RETURN A CURL HANDLE
        $ch = curl_init($url);
        
        // SETS AN OPTION ON THE GIVEN CURL SESSION HANDLE
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // ASSIGN THE DECODED VALUE (EXECUTE THE CURL SESSION)
        $output = json_decode(curl_exec($ch));
        
        // CLOSE THE CURL SESSION
        curl_close($ch);
        
        // CHECKS IF THE MESSAGE SENT SUCCESSFULLY
        if($output->status == 'Success') {
                return true;
        }
        
        // IF MESSAGE SENT FAILED
        return false;

    }

    // FUNCTION TO CHECK VERIFICATION TIMEOUT
    public function isTimeout() 
    {
        // STARTS THE SESSION
        session_start();
        
        // CHECKS IF THE CURRENT TIME IS MORE THAN 180 SECONDS SESSION
        if (($_SESSION['otp'] - time()) > 180 ) {
            return true;
        }
        // IF TIMEOUT DOESN'T OCCUR
        return false;
    }

    // FUNCTION TO MATCH ENTERED OTP
    public function matchOTP($otp) 
    {
        // STARTS THE SESSION
        session_start();
        
        // CHECKS IF ENTERED OTP IS CORRECT
        if($_SESSION['otp'] == $otp)
            return true;
        
        // IF OTP IS INCORRECT
        return false;

    }

    // FUNCTION FOR SIGNING UP THE USER
    public function signup()
    {
        // QUERY TO INSERT INTO THE DATABASE
        $query = "INSERT INTO " . $this->login_credentials . "(Phone, Email, Password, Created) VALUES(:phone, :email, :password, :created)";

        // PREPARE QUERY STATEMENT
        $stmt = $this->conn->prepare($query);

        // SANITIZE FORM DATA
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->phone = htmlspecialchars(strip_tags($this->phone));

        // PASS PASSWORD THROUGH HASH
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        // BIND VALUES
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created", $this->created);

        // EXECUTE QUERY
        if ($stmt->execute()) {
            
            // QUERY TO INSERT INTO THE DATABASE
            $per_query = "INSERT INTO " . $this->user_per_details . "(Phone, Name, Email) VALUES (:phone, :name, :email)";
            
            // PREPARE QUERY STATEMENT
            $per_stmt = $this->conn->prepare($per_query);
            
            // BIND VALUES
            $per_stmt->bindParam(":phone", $this->phone);
            $per_stmt->bindParam(":name", $this->name);
            $per_stmt->bindParam(":email", $this->email);
            
            // EXECUTE QUERY
            if ($per_stmt->execute() == false) 
                return false;
            else 
                return true;
        }
        
        // IF QUERY FAILED
        return false;
    }

    // FUNCTION FOR SIGNING IN THE USER BY PHONE
    public function phoneSignin()
    {
        // SANITIZE DATA
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // SELECT FROM THE DATABASE
        $query = "SELECT Phone, Email, Password FROM " . $this->login_credentials . " WHERE Phone='" . $this->phone . "'";
        
        // PREPARE QUERY STATEMENT
        $stmt = $this->conn->prepare($query);

        // EXECUTE QUERY
        $stmt->execute();

        // FETCH ROW
        $result = $stmt->fetch();

        // IF NO ROW IS RETURNED
        if ($result == false)
            return false;

        // CHECK IF PASSWORD MATCHED OR NOT
        if (!password_verify($this->password, $result['Password']))
            return false;
        
        // SELECT FROM THE DATABASE
        $query1 = "SELECT Name FROM " . $this->user_per_details . " WHERE Phone='" . $this->phone . "'";

        // PREPARE QUERY STATEMENT
        $stmt1 = $this->conn->prepare($query1);

        // EXECUTE QUERY
        $stmt1->execute();

        // FETCH ROW
        $result1 = $stmt1->fetch();

        // ASSIGNING DATABASE FIELDS TO VARIABLE
        $this->email = $result['Email'];
        $this->phone = $result['Phone'];
        $this->name = $result1['Name'];

        // SIGIN SUCCESS
        return true;
    }

    // FUNCTION FOR SIGNING IN THE USER BY EMAIL
    public function emailSignin()
    {
        // SANITIZE DATA
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // SELECT FROM THE DATABASE
        $query = "SELECT Phone, Email, Password FROM " . $this->login_credentials . " WHERE Email='" . $this->email . "'";
        
        // PREPARE QUERY STATEMENT
        $stmt = $this->conn->prepare($query);

        // EXECUTE QUERY
        $stmt->execute();

        // FETCH ROW
        $result = $stmt->fetch();

        // IF NO ROW IS RETURNED
        if ($result == false)
            return false;

        // CHECK IF PASSWORD MATCHED OR NOT
        if (!password_verify($this->password, $result['Password']))
            return false;
        
        // SELECT FROM THE DATABASE
        $query1 = "SELECT Name FROM " . $this->user_per_details . " WHERE Email='" . $this->email . "'";

        // PREPARE QUERY STATEMENT
        $stmt1 = $this->conn->prepare($query1);

        // EXECUTE QUERY
        $stmt1->execute();

        // FETCH ROW
        $result1 = $stmt1->fetch();

        // ASSIGNING DATABASE FIELDS TO VARIABLE
        $this->email = $result['Email'];
        $this->phone = $result['Phone'];
        $this->name = $result1['Name'];

        // SIGIN SUCCESS
        return true;
    }

}

?>