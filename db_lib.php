<?php

    class UserTable {
        
        public $db;

        function __construct(){
            $this->db = new PDO('sqlite:database.sqlite');
            $this->createTable();
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

    class SiteTable {
        
        public $db;

        function __construct(){
            $this->db = new PDO('sqlite:database.sqlite');
            $this->createTable();
        }
        function createTable(){
            $this->db->exec("CREATE TABLE Site (
                Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                UserId INTEGER KEY NOT NULL,
                SiteNum TEXT NOT NULL)");    
        }

        function addSite($site){
            $res = $this->db->exec("INSERT INTO Site (UserId, SiteNum) VALUES (
                '$site->userId',
                '$site->sitenum');");
            if ($res == 0){
                Print "doesnt add";
            }
            return $res;
            
        }
    
        function getSite($userId){ 
            // $id = $userId * 1;
            $Site = array();
            $queryString = "SELECT * FROM Site WHERE UserId =:uid";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uid', $userId);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $resultCount = count($results);
            if ($resultCount > 0){
                foreach($results as $result){
                    array_push($Site, new Site($result['Id'], $result['UserId'], $result['SiteNum']));
                }
            } else{
                Print "No site records yet";
            }
            return $Site;
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

    

    class PlasterTable {
        
        public $db;

        function __construct(){
            $this->db = new PDO('sqlite:database.sqlite');
            $this->createTable();
        }
        function createTable(){
            $this->db->exec("CREATE TABLE Plaster (
                Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                UserId INTEGER KEY NOT NULL,
                SiteNum TEXT NOT NULL,
                Width INTEGER NOT NULL, 
                Length INTEGER NOT NULL,
                Depth INTEGER NOT NULL, 
                Bags INTEGER NOT NULL,
                Sand INTEGER NOT NULL)");    
        }

        function addPlaster($plaster){
            $res = $this->db->exec(
                "INSERT INTO Plaster (UserId, SiteNum, Width, Length, Depth, Bags, Sand) VALUES 
                ('$plaster->userId', '$plaster->sitenum', '$plaster->width', '$plaster->length', '$plaster->depth', '$plaster->bags', '$plaster->sand');"
            );
            if ($res == 0){
                Print "doesnt add";
            }
            return $res;
            
        }
    
        function getPlasterbySite($siteId){ 
            // $id = $userId * 1;
            $Plaster = array();
            $queryString = "SELECT * FROM Plaster WHERE SiteNum =:uid";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uid', $siteId);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $resultCount = count($results);
            if ($resultCount > 0){
                foreach($results as $result){
                    array_push($Plaster, new Plaster(
                        $result['Id'],
                        $result['UserId'],
                        $result['SiteNum'],
                        $result['Width'],
                        $result['Length'],
                        $result['Depth'],
                        $result['Bags'],
                        $result['Sand']));
                }
            } else{
                Print "No plaster records yet";
            }
            return $Plaster;
        }

        function getPlaster($userId){ 
            // $id = $userId * 1;
            $Plaster = array();
            $queryString = "SELECT * FROM Plaster WHERE UserId =:uid";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uid', $userId);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $resultCount = count($results);
            if ($resultCount > 0){
                foreach($results as $result){
                    array_push($Plaster, new Plaster(
                        $result['Id'],
                        $result['UserId'],
                        $result['SiteNum'],
                        $result['Width'],
                        $result['Length'],
                        $result['Depth'],
                        $result['Bags'],
                        $result['Sand']));
                }
            } else{
                Print "No plaster records yet";
            }
            return $Plaster;
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

    class ScreedTable {
        
        public $db;

        function __construct(){
            $this->db = new PDO('sqlite:database.sqlite');
            $this->createTable();
        }
        function createTable(){
            $this->db->exec("CREATE TABLE Screed (
                Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                UserId INTEGER KEY NOT NULL, 
                SiteNum TEXT NOT NULL, 
                Width INTEGER NOT NULL, 
                Length INTEGER NOT NULL, 
                Depth INTEGER NOT NULL, 
                Bags INTEGER NOT NULL,
                Sand INTEGER NOT NULL)");    
        }

        function addScreed($screed){
            $res = $this->db->exec("INSERT INTO Screed (UserId, SiteNum, Width, Length, Depth, Bags, Sand) VALUES 
            ('$screed->userId', '$screed->sitenum', '$screed->width', '$screed->length', '$screed->depth', '$screed->bags', '$screed->sand');");
            if ($res == 0){
                Print "doesnt add";
            }
            return $res;
            
        }
        function getScreedbySite($siteId){ 
            // $id = $userId * 1;
            $Screed = array();
            $queryString = "SELECT * FROM Screed WHERE SiteNum =:uid";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uid', $siteId);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $resultCount = count($results);
            if ($resultCount > 0){
                foreach($results as $result){
                    array_push($Screed, new Screed(
                        $result['Id'],
                        $result['UserId'],
                        $result['SiteNum'],
                        $result['Width'],
                        $result['Length'],
                        $result['Depth'],
                        $result['Bags'],
                        $result['Sand']));
                }
            } else{
                Print "No screed records yet";
            }
            return $Screed;
        }
    
        function getScreed($userId){ 
            // $id = $userId * 1;
            $Screed = array();
            $queryString = "SELECT * FROM Screed WHERE UserId =:uid";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uid', $userId);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $resultCount = count($results);
            if ($resultCount > 0){
                foreach($results as $result){
                    array_push($Screed, new Screed(
                        $result['Id'],
                        $result['UserId'],
                        $result['SiteNum'],
                        $result['Width'],
                        $result['Length'],
                        $result['Depth'],
                        $result['Bags'],
                        $result['Sand']));
                }
            } else{
                Print "No screed records yet";
            }
            return $Screed;
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
            $this->createTable();
        }
        function createTable(){
            $this->db->exec("CREATE TABLE Foundations (
                Id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
                UserId INTEGER KEY NOT NULL, 
                SiteNum TEXT NOT NULL, 
                Width INTEGER NOT NULL, 
                Length INTEGER NOT NULL, 
                Depth INTEGER NOT NULL,
                Bags INTEGER NOT NULL, 
                Stone INTEGER NOT NULL, 
                Sand INTEGER NOT NULL)");    
        }

        function addFoundation($foundation){
            $res = $this->db->exec("INSERT INTO Foundations (UserId, SiteNum, Width, Length, Depth, Bags, Stone, Sand) VALUES 
            ('$foundation->userId', '$foundation->sitenum', '$foundation->width', '$foundation->length', '$foundation->depth', '$foundation->bags', '$foundation->stone', '$foundation->sand');");
            if ($res == 0){
                Print "doesnt add";
            }
            return $res;

        }
    
        function getFoundationsbySite($siteId){ 
            // $id = $userId * 1;
            $foundations = array();
            $queryString = "SELECT * FROM Foundations WHERE SiteNum =:uid";
            $stmt = $this->db->prepare($queryString);
            $stmt->bindParam(':uid', $siteId);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $resultCount = count($results);
            if ($resultCount > 0){
                foreach($results as $result){
                    array_push($foundations, new Foundation(
                        $result['Id'],
                        $result['UserId'],
                        $result['SiteNum'], 
                        $result['Width'], 
                        $result['Length'], 
                        $result['Depth'], 
                        $result['Bags'], 
                        $result['Stone'], 
                        $result['Sand']));
                }
            } else{
                Print "No foundation records yet";
            }
            return $foundations;
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
                    array_push($foundations, new Foundation(
                        $result['Id'],
                        $result['UserId'],
                        $result['SiteNum'], 
                        $result['Width'], 
                        $result['Length'], 
                        $result['Depth'], 
                        $result['Bags'], 
                        $result['Stone'], 
                        $result['Sand']));
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