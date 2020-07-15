<?php

require_once 'Connection.php';
require_once 'User.php';

class UserDAO{
    public static function insert(User $user){
        $con = Conexao::connect();
        $stmt = $con->prepare("insert into user (name, surname, email, password) values (?,?,?,?)");
        $stmt->bind_param("ssss", $name, $surname, $email, $password);
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $password = $user->getPassword();
        
        $result = $stmt->execute();
        
        return $result;
    }

    public static function auth($email, $password){
        $con = Conexao::connect();
        $stmt = $con->prepare("select name, surname, id, coins from user where email = ? and password = ?");
        $stmt->bind_param("ss", $email_user, $password_user);
        $email_user = $email;
        $password_user = sha1($password);

        if($stmt->execute()){
            $stmt->store_result();
            if($stmt->num_rows>0){
                $stmt->bind_result($name, $surname, $id, $coins);
                $stmt->fetch();
                $user = new user($name, $surname, $email, $password, $coins, $id);
                return $user;
            }
        }
        return null;
    }
    
}