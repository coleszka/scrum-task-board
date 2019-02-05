<?php

class AddProject extends Db
{
    public function __construct() {

    }

    public function inputNewProjectToDb(string $id_user, string $name_project, string $description) {

        try {
            $result = $this->connect()->prepare("INSERT INTO projects (id, id_user, name_project, description) 
            VALUES (NULL, '{$id_user}', '{$name_project}', '{$description}')");
            $result->execute();
            // $lastId=$this->connect()->lastInsertId(); doesnt work :/
            try {
                try {
                    $result = $this->connect()->prepare("SELECT id FROM projects ORDER BY id DESC LIMIT 1");
                    $result->execute();
                    $lastId=$result->fetch(PDO::FETCH_ASSOC);

                }
                catch (PDOException $e) {
                    //echo 'Caught exception: ',  $e->getMessage(), "\n";
                    echo "Wystąpił problem z utworzeniem nowego projektu SELECT!";
                }
                $result = $this->connect()->prepare("INSERT INTO users_projects(id, id_project, id_user, perm)
                VALUES (NULL, '{$lastId['id']}', '{$id_user}', '')");
                $result->execute();
            }
            catch (PDOException $e) {
                //echo 'Caught exception: ',  $e->getMessage(), "\n";
                echo "Wystąpił problem z utworzeniem nowego projektu INSERT2!";
            }


            $_SESSION['succProject']="Utworzono nowy projekt o nazwie: ".$name_project."!";
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z utworzeniem nowego projektu INSERT1!";
        }
    }
}

?>