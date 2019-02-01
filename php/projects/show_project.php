<?php

class ProjectDetails extends Db
{
    private $id;
    private $idUser;
    private $nameProject;
    private $description;
    private $rows;

    public function __construct(int $getId) {
        try {
            $result = $this->connect()->prepare("SELECT * FROM projects WHERE id='{$getId}'");
            $result->execute();
            $this->rows = $result->rowCount();

            if ($this->rows > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                   $this->id = $row['id'];
                   $this->idUser = $row['id_user'];
                   $this->nameProject = $row['name_project'];
                   $this->description = $row['description'];
                }
            }
        }
        catch (Exception $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z wyświetleniem projektu.";
        }
    }

    public function existProject() :bool {
        if ($_SESSION['id']==$this->idUser) {
            return true;
            }
        else {
            return false;
        }
    }

    public function details() :array {
        $details=['name' => $this->nameProject, 'description' => $this->description];
        return $details;
    }

}

?>