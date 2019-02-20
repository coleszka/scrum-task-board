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
}

?>