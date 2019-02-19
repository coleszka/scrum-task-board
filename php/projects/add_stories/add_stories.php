<?php

class AddStories extends Db
{
    public function inputNewStoriesToDb(int $idProject, string $nameStories, string $descStories) {

        try {
            $result = $this->connect()->prepare("INSERT INTO stories (id, id_project, name_stories, description) 
            VALUES (NULL, '{$idProject}', '{$nameStories}', '{$descStories}')");
            $result->execute();
            $_SESSION['succStories']="Utworzono nowe stories o nazwie: ".$nameStories."!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['errStories']="Wystąpił problem z utworzeniem nowego stories INSERT1!";
        }
    }
}

?>