<?php

    class UserTable {
        
        public $db;

        function __construct(){
            $this->db = new PDO('sqlite:quantifierDB.sqlite');
        }
        function createTable(){
            $this->db->exec("CREATE TABLE Users (Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, Username TEXT NOT NULL, Email TEXT NOT NULL, Password TEXT NOT NULL)");    
        }
        
        function getUser($username){ //This code is repeated in getEmail() think of a better way to do this
            $queryString = "SELECT * FROM Users WHERE Username =:uname";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uname', $username);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $resultCount = count($result);
            if ($resultCount > 0){
                return new User("bull","shit","data");
            }else{
                return NULL;
            }
        }

        function getEmail($email){ //Note repetion in getUser()
            $queryString = "SELECT * FROM Users WHERE Email =:email";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $resultCount = count($result);
            if ($resultCount > 0){
                return new User("bull","shit","data");
            }else{
                return NULL;
            }
        }

        function registerUser($user, $password_confirm){
            return $this->db->exec("INSERT INTO Users (Username, Email, Password) VALUES ('$user->username', '$user->email', '$user->password');");
        }

        function getDB(){
            return $this->db;
        }

        function closeDB(){
            $this->db = NULL;
        }
    }

?>