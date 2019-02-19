<?php

class UpdateTimeline extends Db
{
    public function updateTaskTimeline(int $toTimeline, int $idTask) {

        try {
            $result = $this->connect()->prepare("UPDATE task SET timeline='$toTimeline' WHERE id='$idTask'");
            $result->execute();

            $_SESSION['succUpdateTask']="Update!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['errTask']="Wystąpił problem z UPDATE TIMELINE!";
        }
    }
}

?>