<?php

require_once 'Connection.php';
require_once 'Progress.php';

class ProgressDAO{
    public static function getLastDate($iduser){
        $con = Connection::connect();
        $stmt = $con->prepare("select date FROM progress  where iduser = ? ORDER BY id DESC LIMIT 1");
        $stmt->bind_param("i", $iduser);
        
        if($stmt->execute()){
            $stmt->bind_result($date);
            $stmt->fetch();
            
            return $date;
        }
        return null;
    }
    
    public static function insert(Progress $progress){
        $con = Connection::connect();
        $stmt = $con->prepare("insert into progress (ncompleted, date, iduser) values (?,?,?)");
        $stmt->bind_param("isi", $ncompleted, $date, $iduser);
        $date = $progress->getDate();
        $ncompleted = $progress->getNcompleted();
        $iduser = $progress->getIduser();
        
        $result = $stmt->execute();
        
        return $result;
    }

    public static function updateNcompleted($ncompleted, $date, $iduser){
        $con = Connection::connect();
        $stmt = $con->prepare("Update progress set ncompleted=? where date = ? and iduser = ?");
        $stmt->bind_param("isi", $ncompleted, $date, $iduser);

        $result = $stmt->execute();

        return $result;
    }

    public static function getNcompleted($iduser){
        $con = Connection::connect();
        $stmt = $con->prepare("select ncompleted FROM progress  where iduser = ? ORDER BY id DESC LIMIT 1");
        $stmt->bind_param("i", $iduser);
        
        if($stmt->execute()){
            $stmt->bind_result($ncompleted);
            $stmt->fetch();
            
            return $ncompleted;
        }
        return null;
    }

    public static function getByIduser($iduser){
        $con = Connection::connect();
        $stmt = $con->prepare("select ncompleted, date, iduser, id from progress where iduser = ? LIMIT 7");
        $stmt->bind_param("i",$iduserok);
        $iduserok = $iduser;
        
        if($stmt->execute()){ 
            $stmt->bind_result($ncompleted, $date, $iduser, $id);
            
            $progress = array();
            while ($stmt->fetch()){
                $f = new progress($ncompleted, $date, $iduser, $id);
                array_push($progress,$f);
            }

            return $progress;
            
        }
        return null;
    }
}