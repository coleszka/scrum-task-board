<?php

class AddStories extends Db
{
    public function __construct() {

    }

    public function inputNewStoriesToDb(int $id_project, string $name_project) {

        try {
            $result = $this->connect()->prepare("INSERT INTO stories (id, id_project, name_stories, description) 
            VALUES (NULL, '{$id_project}', 'test', '{$name_project}')");
            $result->execute();

            $_SESSION['succProject']="Utworzono nowy projekt o nazwie: ".$name_project."!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z utworzeniem nowego projektu INSERT1!";
        }
    }
}

?>