<?php
session_start();
require_once '../../../vendor/autoload.php';

$idProject = $_GET['id'];

$editProject = new DeleteProject($idProject);
$editProject->delete();

header("Location: ../../../projects.php");

?>