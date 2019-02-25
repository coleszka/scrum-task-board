<?php

class EditProject extends Db
{
    public function editProjectInDb(int $idProject, string $nameProject, string $description) {

        try {
            $result = $this->connect()->prepare("UPDATE projects SET name_project = :nameProject,
            description = :description WHERE id = :idProject");
            $result->execute(array('idProject' => $idProject, 'nameProject' => $nameProject, 'description' => $description));
            $_SESSION['succ']="Pomyślnie zedytowano projekt o nazwie: ".$nameProject."!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['err']="Wystąpił problem z edytowaniem projektu!";
        }
    }
}

?>