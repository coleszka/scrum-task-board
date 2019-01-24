<?php

class Input extends Db
{

    public function __construct()
    {

    }

    public function inputValuesToDb(string $nick, string $pass, string $pass2, string $email, $regulations)
    {
        try {
            $result = $this->connect()->prepare("INSERT INTO users (id, login, password, email) VALUES (NULL, '$nick', '$pass', '$email')");
            $result->execute();
            echo "Rejestracja przebiegła pomyślnie! Możesz się teraz zalogować!<br>";
            echo "<a href='../../../log-in.php'>Zaloguj się!</a>";



        }
        catch (Exception $e)
        {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem z rejestracją, skontaktuj się za administracją!";
        }
    }

}

?>