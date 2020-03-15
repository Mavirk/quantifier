<?php
    include 'model_lib.php';
    include 'view_lib.php';
    include 'db_lib.php';

    class LoginController{
        public $login_view;
        public $userTable;


        function login(){
            try{
                $userTable = new UserTable();
                $userTable->createTable();
                $this->login_view = new LoginView();
                if (isset($_POST['login'])){
                    $username = $_POST['uname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $password_confirm = $_POST['password_confirm'];
                    $user = new User($username, $email, $password);
                    if ($this->userTable->validate_user($user, $password_confirm)){
                        echo "Records created successfully\n";
                    }
                }
                $this->login_view->display_output($this->db);
                $this->db = NULL;
            }catch(PDOException $e){
                print 'Exception : '.$e->getMessage();
            }
        }

        function validate_user($user, $password_confirm){
            $valid = true;
            try{
            } catch (PDOException $e){
                print 'Exception : '.$e->getMessage();
            }

            return $valid;
        }


        function log($value){
            echo "<pre>" . print_r($value, 1) . "</pre>";
        }
    }

    class RegisterController{
        public $register_view;
        public $userTable;


        function register(){
            try{
                $this->userTable = new UserTable();
                $this->userTable->createTable();
                $this->register_view = new RegisterView();
                if (isset($_POST['register'])){
                    $username = $_POST['uname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $password_confirm = $_POST['password_confirm'];
                    $user = new User($username, $email, $password);
                    if ($this->validate_user($user, $password_confirm)){
                        echo "Records created successfully\n";
                    }
                }
                $this->register_view->displayOutput($this->userTable->getDB());
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
                    print('Username already taken');
                    return false;
                }
                if ($checkForEmail != NULL){
                    print('Email already taken');
                    return false;
                }
                if (!($user->password == $password_confirm)) {
                    print('Passwords dont match');
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