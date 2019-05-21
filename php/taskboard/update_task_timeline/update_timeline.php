<?php

class UpdateTimeline extends Db
{
    public function updateTaskTimeline(int $toTimeline, int $idTask) {

        try {
            $result = $this->connect()->prepare("UPDATE task SET timeline = :timeline WHERE id = :idTask");
            $result->execute(array('timeline' => $toTimeline, 'idTask' => $idTask));
            $_SESSION['succUpdateTask']="Update!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['errTask']="Wystąpił problem z UPDATE TIMELINE!";
        }
    }

    public function deleteTask(int $idTask) {

        try {
            $result = $this->connect()->prepare("DELETE FROM task WHERE id = :idTask");
            $result->execute(array('idTask' => $idTask));
            $_SESSION['succDeleteTask']="Usunięto task!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['errTask']="Wystąpił problem z DELETE TASK!";
        }
    }

    public function deleteStories(int $idStories) {

        try {
            $result = $this->connect()->prepare("DELETE stories, task FROM stories INNER JOIN task
            WHERE stories.id = task.id_stories AND stories.id = :idStories");
            $result->execute(array('idStories' => $idStories));
            $_SESSION['succDeleteStories']="Usunięto stories!";
        }
        catch (PDOException $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['errTask']="Wystąpił problem z DELETE Stories!";
        }
    }
}

?>