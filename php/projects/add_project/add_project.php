<?php

class AddProject extends Db
{
    public function inputNewProjectToDb(string $idUser, string $nameProject, string $description) {

        try {
            $result = $this->connect()->prepare("INSERT INTO projects (id, id_user, name_project, description) 
            VALUES (NULL, :idUser, :nameProject, :description)");
            $result->execute(array('idUser' => $idUser, 'nameProject' => $nameProject, 'description' => $description));
            // $lastId=$this->connect()->lastInsertId(); doesnt work :/
            try {
                try {
                    $result = $this->connect()->prepare("SELECT id FROM projects ORDER BY id DESC LIMIT 1");
                    $result->execute();
                    $lastId=$result->fetch(PDO::FETCH_ASSOC);
                }
                catch (PDOException $e) {
                    //echo 'Caught exception: ',  $e->getMessage(), "\n";
                    $_SESSION['errProject']="Wystąpił problem z utworzeniem nowego projektu SELECT!";
                }
                $result = $this->connect()->prepare("INSERT INTO users_projects(id, id_project, id_user, perm)
                VALUES (NULL, :lastId, :idUser, '')");
                $result->execute(array('lastId' => $lastId['id'], 'idUser' =>$idUser));
            }
            catch (PDOException $e) {
                //echo 'Caught exception: ',  $e->getMessage(), "\n";
                $_SESSION['errProject']="Wystąpił problem z utworzeniem nowego projektu INSERT2!";
            }

            $_SESSION['succProject']="Utworzono nowy projekt o nazwie: ".$nameProject."!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['errProject']="Wystąpił problem z utworzeniem nowego projektu INSERT1!";
        }
    }
}

?>