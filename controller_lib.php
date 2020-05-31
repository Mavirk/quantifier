<?php
    include 'model_lib.php';
    include 'view_lib.php';
    include 'db_lib.php';
    class HomeController{
        public $foundationTable;

        function __construct(){
            $this->foundationTable = new FoundationTable();
        }

        function getFoundations($user){
            try {
                return $this->foundationTable->getFoundations($user);
            } catch (Exception $e) {
                print 'Exception : '.$e->getMessage();
            }
        }

        function addFoundation($userid){
            try {
                if (isset($_POST['addfoundation'])){
                    $sitenum = $_POST['sitenum'];
                    $depth = $_POST['depth'];
                    $width = $_POST['width'];
                    $length = $_POST['length'];
                    $foundation = new Foundation(Null, $userid, $sitenum, $depth, $length, $width);
                    if ($this->foundationTable->addFoundation($foundation)){
                        echo "Foundation Record created successfully\n";
                    }
                }
            } catch (PDOException $e) {
                print 'Exception : '.$e->getMessage();
            }
        }
        function log($value){
            echo "<pre>" . print_r($value, 1) . "</pre>";
        }
    }

    class LoginController{
        public $login_view;
        public $userTable;

        function __construct(){
            $this->userTable = new UserTable();
        }

        function login(){
            try{
                if (isset($_POST['login'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    if ($this->validate_user($email, $password)){
                        echo "Login successful redirecting now";
                        header("location: home.php");
                    }else {
                        Print '<script>window.location.assign("index.php");</script>';
                    }
                }
                // $this->login_view->displayOutput($this->userTable->getDB());
                $this->db = NULL;
            }catch(PDOException $e){
                print 'Exception : '.$e->getMessage();
            }
        }

        function validate_user($email, $password){
            try{
                $user = $this->userTable->getEmail($email);
                if ($user == NULL){
                    Print '<script>alert("Incorrect email!");</script>'; 
                    return False;
                }else if ($user->password == $password){
                    $_SESSION['userid'] = $user->id;
                    return True;  
                }else{
                    Print '<script>alert("Incorrect password!");</script>';
                    return False;
                }

            } catch (PDOException $e){
                print 'Exception : '.$e->getMessage();
            }
        }


        function log($value){
            echo "<pre>" . print_r($value, 1) . "</pre>";
        }
    }

    class RegisterController{
        public $register_view;
        public $userTable;

        function __construct(){
            $this->userTable = new UserTable();
        }

        function register(){
            try{
                if (isset($_POST['register'])){
                    $username = $_POST['uname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $password_confirm = $_POST['password_confirm'];
                    $user = new User(NULL, $username, $email, $password);
                    if ($this->validate_user($user, $password_confirm)){
                        echo "Records created successfully\n";
                        header("location: index.php");

                    }
                }
                // $this->register_view->displayOutput($this->userTable->getDB());
                $this->userTable->closeDB();
            }catch(PDOException $e){
                print 'Exception : '.$e->getMessage();
            }
        }

        function validate_user($user, $password_confirm){
            $valid = true;
            try{
                $checkForUsername = $this->userTable->getUser($user->username);
                $checkForEmail = $this->userTable->getEmail($user->email);
                if ($checkForUsername != NULL){
                    Print '<script>alert("Username already taken");</script>'; 
                    return false;
                }
                if ($checkForEmail != NULL){
                    Print '<script>alert("Email already taken");</script>'; 
                    return false;
                }
                if (($user->password != $password_confirm)) {
                    Print '<script>alert("Passwords do not match");</script>'; 
                    return false;
                }
            } catch (PDOException $e){
                print 'Exception : '.$e->getMessage();
            }
            return $this->userTable->registerUser($user, $password_confirm);
        }


        function log($value){
            echo "<pre>" . print_r($value, 1) . "</pre>";
        }
    }

?>