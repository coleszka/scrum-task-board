<?php

require_once '../../vendor/autoload.php';



$login=$_POST['login'];
$pass=$_POST['pass'];
$pass2=$_POST['pass2'];
$email=$_POST['email'];
$checkbox=$_POST['checkbox']; ///obsluga wyjatku!!!!!!!!!!!


$reg = new Register($login, $pass, $pass2, $email, $checkbox);
if (!$reg->checkValues())
    {
        $input = new Input();
        $input->inputValuesToDb($login, $pass, $email);
    }
    else
    {
        echo "errory";
        var_dump($reg->checkValues());
    }



?>