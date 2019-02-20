<?php

class ShowStories extends Db
{
    private $id;
    private $idProject;
    private $idStories;
    private $nameStories;
    private $descStories;
    private $rows;

    public function __construct(int $getIdProject) {
        try {
            $this->idProject=$getIdProject;
            $result = $this->connect()->prepare("SELECT * FROM stories WHERE id_project = :idProject");
            $result->execute(array('idProject' => $this->idProject));
            $this->rows = $result->rowCount();

            if ($this->rows > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                   $this->idStories[] = $row['id'];
                   $this->nameStories[] = $row['name_stories'];
                   $this->descStories[] = $row['description'];
                }
            }
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z wyświetleniem stories.";
        }
    }

    public function stories() :array {
        $stories=['nameStories' => $this->nameStories, 'descStories' => $this->descStories,
            'idStories' => $this->idStories, 'rows' =>$this->rows];
        return $stories;
    }
}
?>