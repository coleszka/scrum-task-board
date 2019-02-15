<?php
session_start();
require_once '../../../vendor/autoload.php';

$nameStories = $_POST['nameStories'];
$idProject = $_POST['project'];


$addStories = new AddStories();
$addStories->inputNewStoriesToDb($idProject, $nameStories);

//header("Location: ../../../projects/new-project.php");

?>