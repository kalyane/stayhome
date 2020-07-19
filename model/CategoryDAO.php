<?php

require_once 'Connection.php';
require_once 'Category.php';

class CategoryDAO{
    public static function getAll(){
        $con = Connection::connect();
        $stmt = $con->prepare("select name, icon, id from category");
        
        if($stmt->execute()){
            $stmt->bind_result($name, $icon, $id);
            
            $category = array();
            while ($stmt->fetch()){
                $i = new Category($name, $icon, $id);
                array_push($category,$i);
            }

            return $category;
            
        }
        return null;
    }

   public static function getById($id){
        $con = Connection::connect();
        $stmt = $con->prepare("select name, icon, id from category where id = ?");
        $stmt->bind_param("i",$id);
        
        if($stmt->execute()){
            $stmt->bind_result($name, $icon, $id);
            $stmt->fetch();
            
            $c = new Category($name, $icon, $id);
            
        
            return $c;
        }
        return null;
    }
}