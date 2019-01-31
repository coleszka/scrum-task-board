<?php

class MyProjects extends Db
{

    public function showMyProjects()
    {
        try {
            $result = $this->connect()->prepare("SELECT * FROM projects WHERE id_user='{$_SESSION['id']}'");
            $result->execute();

            $row = $result->rowCount();

            if ($row > 0)
            {
                $i=1;
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    echo $i++;
                    echo $row['name_project'];
                    echo $row['description'];
                }
            }
        }
        catch (Exception $e)
        {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem";
        }
    }

}

?>