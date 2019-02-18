<?php

    if (isset($_SESSION['id']) && isset($_SESSION['login'])) {
        header('Location: user-menu.php');
    }
    else {
        //echo "niezalogowany";
    }
?>