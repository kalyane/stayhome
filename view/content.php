<?php
if (isset($_GET["class"]) && isset($_GET["action"])){
    require_once 'requests.php';
}elseif (isset($_SESSION["user"])) {
	header("Location: /stayhome/index.php?class=user&action=feed");
}else{
    require_once 'view/user/signup.php';
}

?>