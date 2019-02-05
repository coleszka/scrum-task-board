<?php
session_start();
require_once '../../../vendor/autoload.php';

$addUser = new AddUser($_GET['name'], $_GET['project'], $_SESSION['id']);
echo $addUser->addUserToProject();
header("Location: ../../../projects/add-user.php?project=".$_GET['project'])

?>