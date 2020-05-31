<?php

    class UserTable {
        
        public $db;

        function __construct(){
            $this->db = new PDO('sqlite:database.sqlite');
            $this->db->exec("CREATE TABLE Users (Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, Username TEXT NOT NULL, Email TEXT NOT NULL, Password TEXT NOT NULL)");    
        }
        function createTable(){
            $this->db->exec("CREATE TABLE Users (Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, Username TEXT NOT NULL, Email TEXT NOT NULL, Password TEXT NOT NULL)");    
        }
        function getUserbyId($id){ 
            $queryString = "SELECT * FROM Users WHERE Id =:uname";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uname', $id);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $resultCount = count($result);
            if ($resultCount > 0 && $resultCount < 2){
                return new User($result[0]["Id"], $result[0]["Username"], $result[0]["Email"], $result[0]["Password"]);
            }else if ($resultCount > 1){
                throw new Exception("More than one user found with $username", 1);
            }   
            return NULL;
        }

        function getUser($username){ 
            $queryString = "SELECT * FROM Users WHERE Username =:uname";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uname', $username);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $resultCount = count($result);
            if ($resultCount > 0 && $resultCount < 2){
                return new User($result[0]["Id"], $result[0]["Username"], $result[0]["Email"], $result[0]["Password"]);
            }else if ($resultCount > 1){
                throw new Exception("More than one user found with $username", 1);
            }   
            return NULL;
        }

        function getEmail($email){ 
            $queryString = "SELECT * FROM Users WHERE Email =:email";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $resultCount = count($result);
            if ($resultCount > 0 && $resultCount < 2){
                return new User( $result[0]["Id"], $result[0]["Username"], $result[0]["Email"], $result[0]["Password"]);
            }else if ($resultCount > 1){
                throw new Exception("More than one user found with $email", 1);
            }   
            return NULL;
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

        function log($value){
            echo "<pre>" . print_r($value, 1) . "</pre>";
        }
    }


    class FoundationTable {
        
        public $db;

        function __construct(){
            $this->db = new PDO('sqlite:database.sqlite');
            $this->db->exec("CREATE TABLE Foundations (Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, UserId INTEGER KEY NOT NULL, SiteNum TEXT NOT NULL, Width INTEGER NOT NULL, Length INTEGER NOT NULL, Depth INTEGER NOT NULL, Bags INTEGER NOT NULL)");    
        }
        function createTable(){
            $this->db->exec("CREATE TABLE Foundations (Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, UserId INTEGER KEY NOT NULL, SiteNum TEXT NOT NULL, Width INTEGER NOT NULL, Length INTEGER NOT NULL, Depth INTEGER NOT NULL, Bags INTEGER NOT NULL)");    
        }

        function addFoundation($foundation){
            $res = $this->db->exec("INSERT INTO Foundations (UserId, SiteNum, Width, Length, Depth, Bags) VALUES ('$foundation->userId', '$foundation->sitenum', '$foundation->width', '$foundation->length', '$foundation->depth', '$foundation->bags');");
            if ($res == 0){
                Print "doesnt add";
            }
            return $res;
            
        }
    
        function getFoundations($userId){ 
            // $id = $userId * 1;
            $foundations = array();
            $queryString = "SELECT * FROM Foundations WHERE UserId =:uid";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uid', $userId);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $resultCount = count($results);
            if ($resultCount > 0){
                foreach($results as $result){
                    array_push($foundations, new Foundation($result['Id'], $result['UserId'], $result['SiteNum'], $result['Width'], $result['Length'], $result['Depth'], $result['Bags']));
                }
            } else{
                Print "No foundation records yet";
            }
            return $foundations;
        }

        function getDB(){
            return $this->db;
        }

        function closeDB(){
            $this->db = NULL;
        }

        function log($value){
            echo "<pre>" . print_r($value, 1) . "</pre>";
        }
    }
?>