<?php
if (isset($_SESSION['errReg'])) {
    foreach ($_SESSION['errReg'] as $err) {
        echo "<div class=\"alert alert-danger\" role=\"alert\">".$err."</div>";
    }
    unset($_SESSION['errReg']);
}
elseif (isset($_SESSION['succ'])) {
    echo "<div class=\"alert alert-success\" role=\"alert\">".$_SESSION['succ']."</div>";
    unset($_SESSION['succ']);
}
?>