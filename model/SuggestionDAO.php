<?php

require_once 'Connection.php';
require_once 'Suggestion.php';

class SuggestionDAO{
   public static function getByIdcategory($id){
        $con = Connection::connect();
        $stmt = $con->prepare("select name, icon, idcategory, id from suggestion where idcategory = ?");
        $stmt->bind_param("i",$id);
        
        if($stmt->execute()){ 
            $stmt->bind_result($name, $icon, $idcategory, $id);
            
            $suggestions = array();
            while ($stmt->fetch()){
                $f = new Suggestion($name, $icon, $idcategory, $id);
                array_push($suggestions,$f);
            }

            return $suggestions;
            
        }
        return null;
    }
}