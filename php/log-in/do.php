<?php

session_start();
require_once '../../vendor/autoload.php';

$login=$_POST['login'];
$pass=$_POST['password'];

$check = new UserInDb($login, $pass);
$check->checkUser();

?>