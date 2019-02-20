<?php
namespace checkStatement;
function checkStatement(int $errFontSize, int $succFontSize) {
    if (isset($_SESSION['err'])) {
        echo "<div style='font-size: ".$errFontSize."px' class=\"alert alert-danger\" role=\"alert\">".$_SESSION['err']."</div>";
        unset($_SESSION['err']);
    }
    elseif (isset($_SESSION['succ'])) {
        echo "<div style='font-size: ".$succFontSize."px' class=\"alert alert-success\" role=\"alert\">".$_SESSION['succ']."</div>";
        unset($_SESSION['succ']);
    }
}

?>