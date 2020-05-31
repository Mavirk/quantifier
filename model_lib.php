<?php
    class User {
        public $id;
        public $username;
        public $email;
        public $password;
     

        function __construct($id, $username, $email, $password){
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }
    }

    class Site {
        public $id;
        public $userId;
        public $sitenum;
     
        function __construct($id, $userId, $sitenum){
            $this->id = $id;
            $this->userId = $userId;
            $this->sitenum = $sitenum;
        }
    }

    class Screed {
        public $id;
        public $userId;
        public $sitenum;
        public $depth;
        public $length;
        public $width;
        public $bags;

        function __construct($id, $userId, $sitenum, $depth, $length, $width, $bags = 0){
            $this->id = $id;
            $this->userId = $userId;
            $this->sitenum = $sitenum;
            $this->depth = $depth;
            $this->length = $length;
            $this->width = $width;
            if ($bags == NULL){
                $this->bags = $this->calculateBags();
            } else {
                $this->bags = $bags;
            }
        }

        function calculateBags(){
            $volume = ($this->depth / 1000) * $this->length * $this->width;
            $bagcount = $volume * HIGH_STRENGTH_25_MPA;
            return $bagcount;
        }
    }

    class Plaster {
        public $id;
        public $userId;
        public $sitenum;
        public $depth;
        public $length;
        public $width;
        public $bags;

        function __construct($id, $userId, $sitenum, $depth, $length, $width, $bags = 0){
            $this->id = $id;
            $this->userId = $userId;
            $this->sitenum = $sitenum;
            $this->depth = $depth;
            $this->length = $length;
            $this->width = $width;
            if ($bags == NULL){
                $this->bags = $this->calculateBags();
            } else {
                $this->bags = $bags;
            }
        }

        function calculateBags(){
            $volume = ($this->depth / 1000) * $this->length * $this->width;
            $bagcount = $volume * HIGH_STRENGTH_25_MPA;
            return $bagcount;
        }
    }

    define("HIGH_STRENGTH_25_MPA", 7.7);
    class Foundation {
        public $id;
        public $userId;
        public $sitenum;
        public $depth;
        public $length;
        public $width;
        public $bags;

        function __construct($id, $userId, $sitenum, $depth, $length, $width, $bags = 0){
            $this->id = $id;
            $this->userId = $userId;
            $this->sitenum = $sitenum;
            $this->depth = $depth;
            $this->length = $length;
            $this->width = $width;
            if ($bags == NULL){
                $this->bags = $this->calculateBags();
            } else {
                $this->bags = $bags;
            }
        }

        function calculateBags(){
            $volume = ($this->depth / 1000) * $this->length * $this->width;
            $bagcount = $volume * HIGH_STRENGTH_25_MPA;
            return $bagcount;
        }
    }
?>