<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/config/database.php';

class User
{
    private $conn;

    private $login_credentials = "Login_Credentials";
    private $user_per_details = "User_Personal_Details";

    private $email;
    private $name;
    private $password;
    private $phone;
    private $created;
    
    function __construct($db)
    {
        $this->conn = $db;
    }

    //Getters

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


    // Setters

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
    
    public function sendPhoneOTP($phone)
    {
        session_start();

        $otp = rand(1000, 9999);

        $_SESSION['otp'] = $otp;

        $_SESSION['time'] = time();
    
        $username="jtaksh3";

        $password="Aksh1234*";

        $message="Your OTP for the Verification is " . $otp . " which is valid for 3 minutes";

        $sender=" TestID";

        $url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($phone)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3');

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = json_decode(curl_exec($ch));

        curl_close($ch);

        if($output->status == 'Success') {
                return true;
        }

        return false;

    }

    public function isTimeout() 
    {
        session_start();

        if (($_SESSION['otp'] - time()) > 180 ) {
            return true;
        }
        return false;
    }

    public function matchOTP($otp) 
    {

        session_start();

        if($_SESSION['otp'] == $otp)
            return true;

        return false;

    }


    // Function to check if the user already exist in db or not
    public function doesPhoneAlreadyExist()
    {
        $query = "SELECT Phone FROM " . $this->login_credentials . " WHERE Phone='" . $this->phone . "'";
        // Prepare query statement
        $stmt = $this->conn->prepare($query);
        // Execute query
        $stmt->execute();
        // Fetch a row
        $result = $stmt->fetch();
        // If nothing is returned, $result will be false
        if ($result == false)
            return false;
        return true;
    }

    //Function for signing up the New User
    public function signup()
    {
        // Query to insert record
        $query = "INSERT INTO " . $this->login_credentials . "(Phone, Email, Password, Created) VALUES(:phone, :email, :password, :created)";
        // Prepare query
        $stmt = $this->conn->prepare($query);

        // Sanitize form data
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->phone = htmlspecialchars(strip_tags($this->phone));

        // Pass password through the hash function
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        // Bind values
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created", $this->created);

        //Execute Query
        if ($stmt->execute()) {

            $per_query = "INSERT INTO " . $this->user_per_details . "(Phone, Name) VALUES (:phone, :name)";

            $per_stmt = $this->conn->prepare($per_query);

            $per_stmt->bindParam(":phone", $this->phone);
            $per_stmt->bindParam(":name", $this->name);

            if ($per_stmt->execute() == false) 
                return false;
            else 
                return true;
        }
        return false;
    }

    // Function to login the user
    public function phoneSignin()
    {
        // Sanitize data
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->password = htmlspecialchars(strip_tags($this->password));

        /* Get user's unique hash */
        $query = "SELECT Phone, Email, Password FROM " . $this->login_credentials . " WHERE Phone='" . $this->phone . "'";
        // Prepare query statement
        $stmt = $this->conn->prepare($query);
        // Execute query
        $stmt->execute();
        // Fetch a row
        $result = $stmt->fetch();
        if ($result == false) {
            // No rows has been sent by DB
            return false;
        }

        // Check if password matched or not
        if (!password_verify($this->password, $result['Password'])) {
            // Password didn't matched
            return false;
        }

        $query1 = "SELECT Name FROM " . $this->user_per_details . " WHERE Phone='" . $this->phone . "'";
        // Prepare query statement
        $stmt1 = $this->conn->prepare($query1);
        // Execute query
        $stmt1->execute();
        // Fetch a row
        $result1 = $stmt1->fetch();

        $this->email = $result['Email'];
        $this->phone = $result['Phone'];
        $this->name = $result1['Name'];

        // User can login now
        return true;
    }

}

?>