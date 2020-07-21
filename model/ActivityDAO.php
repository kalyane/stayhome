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
        $stmt = $con->prepare("select name, timestart, timefinish, idcategory, iduser, description, status, id from activity where iduser = ? ORDER BY status ASC");
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

    public static function getById($id){
        $con = Connection::connect();
        $stmt = $con->prepare("select name, timestart, timefinish, idcategory, iduser, description, status, id from activity where id = ?");
        $stmt->bind_param("i",$id);
        
        if($stmt->execute()){
            $stmt->bind_result($name, $timestart, $timefinish, $idcategory, $iduser, $description, $status, $id);
            $stmt->fetch();
            
            $c = new Activity($name, $timestart, $timefinish, $idcategory, $iduser, $description, $status, $id);
        
            return $c;
        }
        return null;
    }

    public static function updateStatus($id){
        $con = Connection::connect();
        $stmt = $con->prepare("Update activity set status=? where id = ?");
        $stmt->bind_param("ii", $status, $id);
        $status = 1;

        $result = $stmt->execute();

        return $result;
    }
    
    public static function statusZero($id){
        $con = Connection::connect();
        $stmt = $con->prepare("Update activity set status=0 where iduser=?");
        $stmt->bind_param("i", $id);

        $result = $stmt->execute();

        return $result;
    }
}