<?php
session_start();
require_once '../../../vendor/autoload.php';

$idProject = $_GET['id'];
$idUser = $_GET['idUser'];

$deleteUser = new DeleteUserFromProject($idProject, $idUser);
$deleteUser->delete();

header("Location: ../../../projects/project.php?id=".$idProject);

?>