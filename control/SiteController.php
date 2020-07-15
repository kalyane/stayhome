<?php

class SiteController{
	public static function home(){
        require_once 'view/website/home.php';
    }
    public static function about(){
        require_once 'view/website/about.php';
    }
    public static function login(){
        require_once 'view/website/login.php';
    }
    public static function signup(){
        require_once 'view/website/signup.php';
    }
}
?>