<?php

class DeleteUserFromProject extends Db {

    private $idProject;
    private $idUser;

    public function __construct(int $idProject, int $idUser) {
        $this->idProject=$idProject;
        $this->idUser=$idUser;
    }
    public function delete() {
        try {
            $result = $this->connect()->prepare("DELETE FROM users_projects WHERE id_project = :idProject
            AND id_user = :idUser");
            $result->execute(array("idProject" => $this->idProject, "idUser" => $this->idUser));
            $_SESSION['succ']="Pomyślnie usunięto użytkownika z projektu!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['err']='Wystąpił problem z usunięciem użytkownika z projektu!';
        }
    }
}



?>