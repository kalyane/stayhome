<?php

require_once 'Connection.php';
require_once 'Activity.php';

class ActivityDAO{
    public static function insert(Activity $activity){
        $con = Connection::connect();
        $stmt = $con->prepare("insert into activity (name, timestart, timefinish, idcategory, iduser, description) values (?,?,?,?,?,?)");
        $stmt->bind_param("sssiis", $name, $timestart, $timefinish, $idcategory, $iduser, $description);
        $name = $activity->getName();
        $timestart = $activity->getTimestart();
        $timefinish = $activity->getTimefinish();
        $idcategory = $activity->getIdcategory();
        $iduser = $activity->getIduser();
        $description = $activity->getDescription();
        
        $result = $stmt->execute();
        
        return $result;
    }

    public static function getByIduser($id){
        $con = Connection::connect();
        $stmt = $con->prepare("select name, timestart, timefinish, idcategory, iduser, description, status, id from activity where iduser = ?");
        $stmt->bind_param("i",$iduser);
        $iduser = $id;
        
        if($stmt->execute()){ 
            $stmt->bind_result($name, $timestart, $timefinish, $idcategory, $iduser, $description, $status, $id);
            
            $activities = array();
            while ($stmt->fetch()){
                $f = new activity($name, $timestart, $timefinish, $idcategory, $iduser, $description, $status, $id);
                array_push($activities,$f);
            }

            return $activities;
            
        }
        return null;
    }
    
}