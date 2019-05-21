<?php
session_start();
require_once '../../../vendor/autoload.php';

$idTask = $_POST['idTask'];
$idProject = $_POST['project'];

$update = new UpdateTimeline();
$update->deleteTask($idTask);

header("Location: ../../../projects/task-board.php?project=".$idProject);

?>