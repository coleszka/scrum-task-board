<?php

class UserInDb extends Db
{
    private $login;
    private $pass;

    public function __construct(string $login, string $pass) {
        $this->login=$login;
        $this->pass=$pass;
    }

    public function checkUser() {

        try {
            $this->pass = md5($this->pass);
            $result = $this->connect()->prepare("SELECT id, login, password FROM users WHERE login='{$this->login}' AND password='{$this->pass}'");
            $result->execute();
            $numRows = $result->rowCount();

            if ($numRows > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $_SESSION['id'] = $row['id'];
                    $_SESSION['login'] = $row['login'];
                }
                header("Location: ../../user-menu.php");
                //echo $_SESSION['id']." ".$_SESSION['login'];
            } else {
                $_SESSION['errLog'] = "Login lub hasło są niepoprawne! Spróbuj jeszcze raz.";
                header("Location: ../../index.php");
            }
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem ze sprawdzeniem wprowadzonych danych w bazie danych";
        }
    }
}



?>