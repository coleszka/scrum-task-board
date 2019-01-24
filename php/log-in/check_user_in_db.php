<?php

class UserInDb extends Db
{

    private $nick;
    private $pass;

    public function __construct(string $nick, string $pass) {
        $this->nick=$nick;
        $this->pass=$pass;
    }

    public function checkUser() {
        $result = $this->connect()->prepare("SELECT id, login, password FROM users WHERE login='$this->nick' AND password='$this->pass'");
        $result->execute();
        $numRows = $result->rowCount();

        if ($numRows > 0)
        {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){

                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['login'];
            }
            header( "Location: ../../user-menu.php" );
            //echo $_SESSION['id']." ".$_SESSION['login'];
        }
        else
        {
            echo "Nick lub hasło są niepoprawne! Spróbuj jeszcze raz.";
            header( "refresh:1;url=../../index.php" );
        }
    }
}



?>