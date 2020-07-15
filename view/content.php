<?php
if (isset($_GET["class"]) && isset($_GET["action"])){
    require_once 'requests.php';
}else{
    require_once 'view/user/signup.php';
}

?>