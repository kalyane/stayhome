<?php

require_once 'model/ActivityDAO.php';

class ActivityController{

    public static function list(){
        require_once 'view/activity/list.php';
    }

}
?>