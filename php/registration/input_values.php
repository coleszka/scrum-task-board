<?php

class Input extends Db
{
    public function inputValuesToDb(string $nick, string $pass, string $email) {
        try {
            $pass = md5($pass);
            $result = $this->connect()->prepare("INSERT INTO users (id, login, password, email)
            VALUES (NULL, :nick, :pass, :email)");
            $result->execute(array('nick' => $nick, 'pass' => $pass, 'email' => $email));
            //echo "Rejestracja przebiegła pomyślnie! Możesz się teraz zalogować!<br>";
            //echo "<a href='../../index.php'>Zaloguj się!</a>";
            $_SESSION['succ']="Rejestracja przebiegła pomyślnie! Możesz się teraz zalogować!";
            header("Location: ../../index.php");
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            $_SESSION['errReg'][]="Wystąpił problem z rejestracją, skontaktuj się za administracją!";
            header("Location: ../../index.php");
        }
    }
}
?>