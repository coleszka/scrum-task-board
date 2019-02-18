<?php
session_start();
require_once '../../../vendor/autoload.php';

$idTask = $_POST['idTask'];
$toTimeline = $_POST['toTimeline'];
$idProject = $_POST['project'];

$update = new UpdateTimeline();
$update->updateTaskTimeline($toTimeline, $idTask);

header("Location: ../../../projects/task-board.php?project=".$idProject);

?>