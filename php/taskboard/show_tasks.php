<?php

class ShowTasks extends Db
{
    private $id;
    private $idStories;
    private $timelineTask;
    private $descTask;
    private $rows;

    public function __construct(int $getIdStories, int $getTimeline) {
        try {
            $this->idStories=$getIdStories;
            $this->timelineTask=$getTimeline;
            $result = $this->connect()->prepare("SELECT * FROM task WHERE id_stories = :idStories
            AND timeline = :timeline");
            $result->execute(array('idStories' => $this->idStories, 'timeline' => $this->timelineTask));
            $this->rows = $result->rowCount();

            if ($this->rows > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                   $this->id[] = $row['id'];
                   $this->descTask[] = $row['description'];
                }
            }
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z wyświetleniem tasks.";
        }
    }

    public function tasks() :array {
        $tasks=['descTask' => $this->descTask, 'idTask' => $this->id, 'rows' => $this->rows];
        return $tasks;
    }
}
?>