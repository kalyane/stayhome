<?php

require_once 'model/ActivityDAO.php';
require_once 'model/CategoryDAO.php';
require_once 'model/UserDAO.php';


class ActivityController{

    public static function list(){
        require_once 'view/activity/list.php';
    }

    public static function addpage(){
    	$categories = CategoryDAO::getAll();
        require_once 'view/activity/add.php';
    }

    public static function add() {
    	$name = $_REQUEST['name'];
    	$timestart = $_REQUEST['timestart'];
    	$timefinish = $_REQUEST['timefinish'];
    	$idcategory = $_REQUEST['idcategory'];
    	$iduser = $_REQUEST["iduser"];
    	$description = $_REQUEST['description'];
        
        $activity = new Activity($name, $timestart, $timefinish, $idcategory, $iduser, $description);
        
        if(ActivityDAO::insert($activity)){
            header("Location: /stayhome/index.php?class=user&action=feed");
        }else{
            echo "Failure";
        }
    }

}
?>