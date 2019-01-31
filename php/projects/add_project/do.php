<?php
session_start();
require_once '../../../vendor/autoload.php';

$nameProject = $_POST['name'];
$description = $_POST['description'];

$addProject = new AddProject();
$addProject->inputNewProjectToDb($_SESSION['id'], $nameProject, $description);

header("Location: ../../../projects/new-project.php");

?>