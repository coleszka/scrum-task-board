<?php

class AddUser extends Db
{
    private $getUserName;
    private $getIdProject;
    private $userIdAdding;

    public function __construct(string $getUserName, int $getIdProject, int $userIdAdding) {
        $this->getUserName=$getUserName;
        $this->getIdProject=$getIdProject;
        $this->userIdAdding=$userIdAdding;
    }

    public function addUserToProject() {
        try {
            $result = $this->connect()->prepare("SELECT id, login FROM users WHERE login='{$this->getUserName}'
            AND NOT id='{$this->userIdAdding}'");
            $result->execute();
            if ($result->rowCount() > 0) {
                $row=$result->fetch(PDO::FETCH_ASSOC);
                try {
                    $result = $this->connect()->prepare("INSERT INTO users_projects(id, id_project, id_user, perm)
                VALUES (NULL, '{$this->getIdProject}', '{$row['id']}', '')");
                    $result->execute();
                    $_SESSION['succAddUser']="Pomyślnie dodano nowego członka projektu o nazwie: ".$this->getUserName."!";
                }
                catch (PDOException $e) {
                    //echo 'Caught exception: ',  $e->getMessage(), "\n";
                    echo "Wystąpił problem z dodaniem użytkownika!";
                }
            }
            else {
                $_SESSION['errAddUser']="Nie ma takiego użytkownika w bazie!";
            }
        }
        catch (PDOException $e){
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z odnalezieniem tego użytkownika!";
        }
    }

}

?>