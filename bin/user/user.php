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
                return 'SIGNUP_FAILED';
            else 
                return 'SIGNUP_SUCCESS';
        }
        return 'SIGNUP_FAILED';
    }

    // Function to login the user
    public function PhoneSignin()
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
            return 'CREDENTIALS_INVALID';
        }

        // Check if password matched or not
        if (!password_verify($this->password, $result['Password'])) {
            // Password didn't matched
            return 'CREDENTIALS_INVALID';
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
        return 'CREDENTIALS_VALID';
    }

}

?>