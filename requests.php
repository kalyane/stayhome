<?php 

$class = ucfirst($_GET["class"]).'Controller';
require_once("control/$class.php");
$action = $_GET["action"];
$class::$action();

?>