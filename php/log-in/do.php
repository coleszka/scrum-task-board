<?php

session_start();
//require_once ('../db/db.php');
//require_once ('check_user_in_db.php');
require_once '../../vendor/autoload.php';




$nick=$_POST['login'];
$pass=$_POST['password'];

$check = new UserInDb($nick, $pass);
$check->checkUser();





?>