<?php
session_start();
require_once '../../../vendor/autoload.php';

$descTask = $_POST['description'];
$idStories = $_POST['idStories'];
$idProject = $_POST['project'];

$addStories = new AddTask();
$addStories->inputNewTaskToDb($idStories, $descTask);

header("Location: ../../../projects/task-board.php?project=".$idProject);

?>