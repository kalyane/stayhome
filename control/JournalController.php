<?php

require_once 'model/JournalDAO.php';


class JournalController{

    public static function list(){
        $iduser = $_SESSION["user"]->getId();
    	$journal = JournalDAO::getByIduser($iduser);
        require_once 'view/journal/list.php';
    }

    public static function addpage(){
        require_once 'view/journal/add.php';
    }

    public static function add() {
    	$date = $_REQUEST['date'];
    	$description = $_REQUEST['description'];
        $iduser = $_REQUEST['iduser'];
        
        $journal = new Journal($date, $description, $iduser);
        
        if(JournalDAO::insert($journal)){
            header("Location: /stayhome/index.php?class=journal&action=list");
        }else{
            echo "Failure";
        }
    }

}
?>