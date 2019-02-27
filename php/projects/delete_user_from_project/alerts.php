<?php
if (isset($_SESSION['err'])) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION['err']."</div>";
    unset($_SESSION['err']);
}
elseif (isset($_SESSION['succ'])) {
    echo "<div class=\"alert alert-success\" role=\"alert\">".$_SESSION['succ']."</div>";
    unset($_SESSION['succ']);
}
?>