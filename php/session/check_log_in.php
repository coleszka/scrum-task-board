<?php

session_start();

    if (isset($_SESSION['id']) && isset($_SESSION['login']))
    {
        //echo "zalogowany";
    }
    else
    {
        header('Location: index.php');
    }
?>