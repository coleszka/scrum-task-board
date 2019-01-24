<?php

require_once ('../db.php');
require_once('check.php');
require_once('input_values.php');



$nick=$_POST['nick'];
$pass=$_POST['pass'];
$pass2=$_POST['pass2'];
$email=$_POST['email'];
$regulations=$_POST['regulations']; ///obsluga wyjatku!!!!!!!!!!!


$reg = new Register($nick, $pass, $pass2, $email, $regulations);
if (!$reg->checkValues())
    {
        $input = new Input();
        $input->inputValuesToDb($nick, $pass, $pass2, $email, $regulations);
    }
    else
    {
        echo "errory";
        var_dump($reg->checkValues());
    }



?>