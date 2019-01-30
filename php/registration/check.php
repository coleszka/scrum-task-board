<?php

class Register
{
    public $nick;
    public $pass;
    public $pass2;
    public $email;
    public $checkbox;

    public function __construct(string $nick, string $pass, string $pass2, string $email, $checkbox)
    {
        $this->nick=$nick;
        $this->pass=$pass;
        $this->pass2=$pass2;
        $this->email=$email;
        $this->checkbox=$checkbox;
    }

    public function checkValues(){

        $err=array();

        if (strlen($this->nick) < 3 || strlen($this->nick) > 20)
        {
        $err[]="Nick powinien zawierac od 3 do 20 znakow";
        }
        if (strlen($this->pass) < 6)
        {
            $err[]="Hasło powinno zawierac conajmniej 6 znaków";
        }
        if ($this->pass!=$this->pass2)
        {
            $err[]="Hasła nie są jednakowe!";
        }
        if (strlen($this->email) < 3 || strlen($this->email) > 20)
        {
            $err[]="Email powinien zawierac od 3 do 20 znakow";
        }
        if ($this->checkbox==NULL)
        {
            $err[]="Aby dokonać rejestracji należy zaznaczyć przeczytanie regulaminu";
        }

        return $err;



    }
}


?>