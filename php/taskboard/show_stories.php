<?php

class ShowStories extends Db
{
    private $id;
    private $idProject;
    private $nameStories;
    private $descStories;
    private $rows;

    public function __construct(int $getIdProject) {
        try {
            $this->idProject=$getIdProject;
            $result = $this->connect()->prepare("SELECT * FROM stories WHERE id_project='{$getIdProject}'");
            $result->execute();
            $this->rows = $result->rowCount();

            if ($this->rows > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                   $this->id = $row['id'];
                   //$this->idProject = $row['id_project'];
                   $this->nameStories[] = $row['name_stories'];
                   $this->descStories[] = $row['description'];
                }
            }
        }
        catch (Exception $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z wyświetleniem stories.";
        }
    }

    public function stories() :array {
        $stories=['nameStories' => $this->nameStories, 'descStories' => $this->descStories, 'rows' =>$this->rows];
        return $stories;
    }

}

?>