<?php

class CheckByIdUser extends Db
{
    private $id;
    private $data = array();
    public function __construct(int $id) {
        $this->id = $id;
    }

    public function checkUserData()  {
        try {

            $result = $this->connect()->prepare("SELECT * FROM users INNER JOIN setting_user
            ON users.id = setting_user.id_user WHERE users.id = :id");
            $result->execute(array('id' => $this->id));
            $numRows = $result->rowCount();

            if ($numRows > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $this->data[] = $result->fetch(PDO::FETCH_ASSOC);

                }
                return $this->data;
                //echo $_SESSION['id']." ".$_SESSION['login'];
            } else {
                return NULL;
            }
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z pobraniem danych";
        }
    }
}



?>