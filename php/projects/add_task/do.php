<?php
session_start();
require_once '../../../vendor/autoload.php';

$descTask = $_POST['description'];
$idStories = $_POST['idStories'];


$addStories = new AddTask();
$addStories->inputNewTaskToDb($idStories, $descTask);

header("Location: ../../../projects/task-board.php?project=".$idProject);

?>