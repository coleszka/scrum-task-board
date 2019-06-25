<?php

session_start();
require_once '../../vendor/autoload.php';

$id = $_GET['id'];

$check = new CheckByIdUser($id);
$check->checkUserData();

?>