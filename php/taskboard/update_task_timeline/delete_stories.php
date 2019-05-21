<?php
session_start();
require_once '../../../vendor/autoload.php';

$idStories = $_POST['idStories'];
$idProject = $_POST['project'];

$update = new UpdateTimeline();
$update->deleteStories($idStories);

header("Location: ../../../projects/task-board.php?project=".$idProject);

?>