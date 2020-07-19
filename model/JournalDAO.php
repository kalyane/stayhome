<?php

require_once 'Connection.php';
require_once 'Journal.php';

class JournalDAO{
    public static function insert(Journal $journal){
        $con = Connection::connect();
        $stmt = $con->prepare("insert into journal (date, description, iduser) values (?,?,?)");
        $stmt->bind_param("ssi", $date, $description, $iduser);
        $date = $journal->getDate();
        $description = $journal->getDescription();
        $iduser = $journal->getIduser();
        
        $result = $stmt->execute();
        
        return $result;
    }

    public static function getByIduser($id){
        $con = Connection::connect();
        $stmt = $con->prepare("select date, description, id, iduser from journal where iduser = ?");
        $stmt->bind_param("i",$iduser);
        $iduser = $id;
        
        if($stmt->execute()){
            $stmt->bind_result($date, $description, $id, $iduser);
            
            $journal = array();
            while ($stmt->fetch()){
                $i = new Journal($date, $description, $iduser, $id);
                array_push($journal,$i);
            }

            return $journal;
            
        }
        return null;
    }
}