<?php

class AddTask extends Db
{
    public function inputNewTaskToDb(int $idStories, string $descTask) {

        try {
            $result = $this->connect()->prepare("INSERT INTO task (id, id_stories, timeline, description) 
            VALUES (NULL, '{$idStories}', '1', '{$descTask}')");
            $result->execute();
            $_SESSION['succTask']="Utworzono nowe zadanie: ".$descTask."!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z utworzeniem nowego zadania INSERT1!";
        }
    }
}

?>