<?php

class Register extends Db
{
    private $login;
    private $pass;
    private $pass2;
    private $email;
    private $checkbox;

    public function __construct(string $login, string $pass, string $pass2, string $email, $checkbox) {
        $this->login=$login;
        $this->pass=$pass;
        $this->pass2=$pass2;
        $this->email=$email;
        $this->checkbox=$checkbox;
    }

    public function checkValues() :array {

        $err=array();

        if (strlen($this->login) < 3 || strlen($this->login) > 20) {
        $err[]="login powinien zawierac od 3 do 20 znakow";
        }
        if (strlen($this->pass) < 6) {
            $err[]="Hasło powinno zawierac conajmniej 6 znaków";
        }
        if ($this->pass != $this->pass2) {
            $err[]="Hasła nie są jednakowe!";
        }
        if (strlen($this->email) < 3 || strlen($this->email) > 20) {
            $err[]="Email powinien zawierac od 3 do 20 znakow";
        }
        if ($this->checkbox == NULL) {
            $err[]="Aby dokonać rejestracji należy zaznaczyć przeczytanie regulaminu";
        }
        try {
            $result = $this->connect()->prepare("SELECT * FROM users WHERE login='{$this->login}'");
            $result->execute();

            $row = $result->rowCount();

            if ($row > 0) {
                $err[]="Użytkownik z podanym loginem już istnieje";
            }
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem 1";
        }
        try {
            $result = $this->connect()->prepare("SELECT * FROM users WHERE email='{$this->email}'");
            $result->execute();

            $row = $result->rowCount();

            if ($row > 0) {
                $err[]="Użytkownik z podanym e-mailem już istnieje";
            }
        }
        catch (PDOException $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
            echo "Wystąpił problem 2";
        }
        return $err;
    }
}


?>