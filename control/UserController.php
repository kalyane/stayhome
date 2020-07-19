<?php

require_once 'model/UserDAO.php';
require_once 'model/ActivityDAO.php';

class UserController{

    public static function signuppage(){
        require_once 'view/user/signup.php';
    }

    public static function loginpage(){
        require_once 'view/user/login.php';
    }

    public static function feed(){
        $id = $_SESSION['user']->getId();
        $activities = ActivityDAO::getByIduser($id);
        require_once 'view/user/feed.php';
    }

    public static function signup(){
        $name = $_REQUEST["name"];
        $surname = $_REQUEST["surname"];
        $email = $_REQUEST["email"];
        $password = sha1($_REQUEST["password"]);
        $id = "";
        $coins = "0";

        $user = new user($name, $surname, $email, $password, $coins, $id);

        if(UserDAO::insert($user)){
            echo "Success";
        }else{
            echo "Failure";
        }
    }

    public static function login(){
        session_start();
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = UserDAO::auth($email, $password);
        if ($user != null){
            $_SESSION["user"] = $user;
            header("Location: /stayhome/index.php?class=user&action=feed");
        }else{
            echo "Failure";
        }
    }
}
?>