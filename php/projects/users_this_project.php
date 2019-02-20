<?php

class UsersThisProject extends Db
{
    private $idProject;

    public function __construct($idProject) {
        $this->idProject=$idProject;
    }

    public function showMembers() {
        try {
            $result = $this->connect()->prepare("SELECT users.login FROM users INNER JOIN users_projects
            ON users.id = users_projects.id_user WHERE users_projects.id_project = :idProject");
            $result->execute(array('idProject' => $this->idProject));
            $row = $result->rowCount();
            if ($row > 0) {
                $i=1;
                echo "<table class=\"table\"><thead><tr><th scope=\"col\">#</th><th scope=\"col\">Użytkownik</th><th scope=\"col\"></th></tr></thead><tbody>";
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><th scope=\"row\">".$i++."</th><td>".$row['login']."</td><td><a class=\"btn btn-success\" href=\"projects/project.php?id="."\" role=\"button\">Otwórz</a></td></tr>";
                }
                echo "</table>";
            }
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z wyświetleniem członków projektu";
        }
    }

}

?>