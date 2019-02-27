<?php

class UserProjectDetails extends Db
{
    private $id;
    private $login;
    private $email;
    private $description;
    private $rows;

    public function __construct(int $getId) {
        try {
            $result = $this->connect()->prepare("SELECT * FROM users WHERE id = :getId");
            $result->execute(array('getId' => $getId));
            $this->rows = $result->rowCount();

            if ($this->rows > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                   $this->id = $row['id'];
                   $this->login = $row['login'];
                   $this->email = $row['email'];
                }
            }
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['errStories']='Wystąpił problem z wyświetleniem projektu!';
        }
    }

    public function details() :array {
        $details=['id' => $this->id, 'login' => $this->login, 'email' => $this->email];
        return $details;
    }
}

?>