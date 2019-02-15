<?php
session_start();
require_once '../../../vendor/autoload.php';

$nameStories = $_POST['nameStories'];
$descStories = $_POST['descStories'];
$idProject = $_POST['project'];


$addStories = new AddStories();
$addStories->inputNewStoriesToDb($idProject, $nameStories, $descStories);

header("Location: ../../../projects/task-board.php?project=".$idProject);

?>