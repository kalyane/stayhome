<?php

class Connection {
    private static $mycon;
    
    public static function connect($host="localhost", $user="root", $pass="", $db="stayhome"){
        
        if (!self::$mycon){
            self::$mycon = new mysqli($host, $user, $pass, $db);

            if (self::$mycon->connect_error){
                die("Erro: ".self::$mycon->connect_error);
            }
        }
        return self::$mycon;
    }
    
    public static function close(){
        self::$mycon->close();
    }   
}
