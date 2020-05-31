<?php
    define("HIGH_STRENGTH_25_MPA", 7.7);
    define("CONCRETE_STONE", 0.8);
    define("BUILDING_SAND", 0.7);

    define("PLASTER_CEMENT", 9.31);
    define("PLASTER_SAND", 1.5);

    define("SCREED_CEMENT", 9.5);
    define("SCREED_SAND", 1.3);

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
        public $sand;

        function __construct($id, $userId, $sitenum, $depth, $length, $width, $bags = 0, $sand = 0){
            $this->id = $id;
            $this->userId = $userId;
            $this->sitenum = $sitenum;
            $this->depth = $depth;
            $this->length = $length;
            $this->width = $width;
            if ($bags == NULL){
                $this->bags = $this->calculateBags();
                $this->sand = $this->calculateSand();
            } else {
                $this->bags = $bags;
                $this->sand = $sand;
            }
        }

        function calculateBags(){
            $volume = ($this->depth / 1000) * $this->length * $this->width;
            $bagcount = $volume * PLASTER_CEMENT;
            return $bagcount;
        }

        function calculateSand(){
            $volume = ($this->depth / 1000) * $this->length * $this->width;
            $bagcount = $volume * PLASTER_SAND;
            return $bagcount;
        }
    }

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