<?php
    class User {
        public $username;
        public $email;
        var $password;
        public $verified;
        public $quantities;
     

        function __construct($username, $email, $password){
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }
    }

    class Quantity {
        public $id;
        public $height;
        public $width;
    }
?>