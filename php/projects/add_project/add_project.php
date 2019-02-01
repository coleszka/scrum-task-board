<?php

class AddProject extends Db
{
    public function __construct() {

    }

    public function inputNewProjectToDb(string $id_user, string $name_project, string $description) {

        try {
            $result = $this->connect()->prepare("INSERT INTO projects (id, id_user, name_project, description) VALUES (NULL, '$id_user', '$name_project', '$description')");
            $result->execute();
            $_SESSION['succProject']="Utworzono nowy projekt o nazwie: ".$name_project."!";
        }
        catch (Exception $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z utworzeniem nowego projektu!";
        }
    }
}

?>