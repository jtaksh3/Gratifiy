<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Project/bin/config/database.php';

class User
{
    private $conn;

    private $login_credentials = "Login_Credentials";
    private $user_per_details = "User_Personal_Details";

    private $email;
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

}

?>