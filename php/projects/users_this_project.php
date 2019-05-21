<?php

class UsersThisProject extends Db
{
    private $idProject;
    private $idUser;

    public function __construct($idProject, $idUser) {
        $this->idProject=$idProject;
        $this->idUser=$idUser;
    }

    public function showMembers() {
        try {
            $result = $this->connect()->prepare("SELECT users.login, users.id FROM users INNER JOIN users_projects
            ON users.id = users_projects.id_user WHERE users_projects.id_project = :idProject
                                                   AND users.id NOT IN (:idProjectHead)");
            $result->execute(array('idProject' => $this->idProject, 'idProjectHead' => $this->idUser));
            $row = $result->rowCount();
            if ($row > 0) {
                $i=1;
                echo "<table class=\"table\">
                        <thead>
                        <tr>
                            <th scope=\"col\">#</th>
                            <th scope=\"col\">Użytkownik</th>
                            <th scope=\"col\"></th>
                            <th scope=\"col\"></th>
                            <th scope=\"col\"></th>
                        </tr>
                        </thead>";
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <th scope=\"row\">".$i++."</th>
                                <td>".$row['login']."</td>
                                <td style='width: 150px;'><a class=\"btn btn-success\" href=\"#\" role=\"button\">Podgląd</a></td>
                                <td style='width: 150px;'><a class=\"btn btn-secondary\" href=\"../projects/edit-project-user.php?idUser=".$row['id']."&id=".$_GET['id']."\" role=\"button\">Edytuj</a></td>
                                <td><a class=\"btn btn-danger\" href=\"../php/projects/delete_user_from_project/do.php?idUser=".$row['id']."&id=".$_GET['id']."\" role=\"button\">Usuń</a></td>
                          </tr>";
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