<?php
session_start();
require_once '../../../vendor/autoload.php';

$idProject = $_POST['idProject'];
$nameProject = $_POST['name'];
$description = $_POST['description'];

$editProject = new EditProject();

$editProject->editProjectInDb($idProject, $nameProject, $description);

header("Location: ../../../projects/edit-project.php?id=".$idProject);

?>