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

    public static function value($id){
        $activity = ActivityDAO::getById($id);
        $value = ( strtotime($activity->getTimefinish()) - strtotime($activity->getTimestart()) ) / 60;
        return $value;
    }

    public static function update(){
        session_start();
        $coins = $_SESSION["user"]->getCoins();
        foreach($_POST['check_list'] as $id => $item){
          $coins = $coins + $item;
          ActivityDAO::updateStatus($id);
        }
        UserDAO::updateCoins($coins);

        echo $coins;
    }


}
?>