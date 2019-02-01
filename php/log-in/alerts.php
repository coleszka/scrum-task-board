<?php
if (isset($_SESSION['errLog'])) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION['errLog']."</div>";
    unset($_SESSION['errLog']);
}
?>