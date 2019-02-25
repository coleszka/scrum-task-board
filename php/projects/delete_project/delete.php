<?php

class DeleteProject extends Db {

    private $idProject;

    public function __construct(int $idProject) {
        $this->idProject=$idProject;
    }
    public function delete() {
        try {
            $result = $this->connect()->prepare("DELETE FROM projects WHERE id = :idProject");
            $result->execute(array("idProject" => $this->idProject));
            $_SESSION['succ']="Pomyślnie usunięto projekt!";
        }
        catch (PDOException $exception) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['err']='Wystąpił problem z usunięciem projektu!';
        }
    }
}



?>