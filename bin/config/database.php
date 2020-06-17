<?php
    
    class Database{
        // SPECIFY DB CREDENTIALS
        private $host;
        private $user_db_name;
        private $admin_db_name;
        private $username;
        private $password;
        public $conn;

        // CONSTRUCTOR TO CONFIGURE DB
        public function __construct(){
            // IMPORT DB CONFIG FILE
            require $_SERVER['DOCUMENT_ROOT'] . '/Gratifiy/bin/config/dbconfig.php';
            $this->host = $db_host;
            $this->user_db_name = $user_db;
            // $this->admin_db_name = $admin_db;
            $this->username = $db_username;
            $this->password = $db_password;
        }

        // GET THE ADMIN'S DB CONNECTION
        public function getAdminDBConnection(){
            $this->conn = null;
            // CONNECT TO DB
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->admin_db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
            return $this->conn;
        }

        // GET THE USER'S DB CONNECTION
        public function getUserDBConnection(){
            $this->conn = null;
            // CONNECT TO DB
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->user_db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
            return $this->conn;
        }

        public function __destruct(){
            $conn = null;
        }
    }
?>