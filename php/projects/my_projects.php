<?php

class MyProjects extends Db
{

    public function showMyProjects() {
        try {
            $result = $this->connect()->prepare("SELECT * FROM projects WHERE id_user = :idUserSession");
            $result->execute(array('idUserSession' => $_SESSION['id']));
            $row = $result->rowCount();

            if ($row > 0) {
                $i=1;
                echo "<table class=\"table\">
                        <thead>
                        <tr>
                            <th scope=\"col\">#</th>
                            <th scope=\"col\">Nazwa</th>
                            <th scope=\"col\">Opis</th>
                            <th scope=\"col\"></th>
                            <th scope=\"col\"></th>
                            <th scope=\"col\"></th>
                        </tr>
                        </thead>";
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <th scope=\"row\">".$i++."</th>
                            <td>".$row['name_project']."</td>
                            <td>".$row['description']."</td>
                            <td><a class=\"btn btn-success\" href=\"projects/project.php?id=".$row['id']."\" role=\"button\">Otwórz</a></td>
                            <td><a class=\"btn btn-secondary\" href=\"projects/edit-project.php?id=".$row['id']."\" role=\"button\">Edytuj</a></td>
                            <td><a class=\"btn btn-danger\" href=\"php/projects/delete_project/do.php?id=".$row['id']."\" role=\"button\">Usuń</a></td>
                        </tr>";

                }
                echo "</table>";
            }
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z wyświetleniem projektów";
        }
    }

}

?>