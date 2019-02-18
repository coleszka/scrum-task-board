<?php

class MyProjects extends Db
{

    public function showMyProjects() {
        try {
            $result = $this->connect()->prepare("SELECT * FROM projects WHERE id_user='{$_SESSION['id']}'");
            $result->execute();
            $row = $result->rowCount();

            if ($row > 0) {
                $i=1;
                echo "<table class=\"table\"><thead><tr><th scope=\"col\">#</th><th scope=\"col\">Nazwa</th><th scope=\"col\">Opis</th><th scope=\"col\"></th></tr></thead><tbody>";
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><th scope=\"row\">".$i++."</th><td>".$row['name_project']."</td><td>".$row['description']."</td><td><a class=\"btn btn-success\" href=\"projects/project.php?id=".$row['id']."\" role=\"button\">Otwórz</a></td></tr>";
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