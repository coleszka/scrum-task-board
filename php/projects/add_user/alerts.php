<?php
if (isset($_SESSION['errAddUser'])) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION['errAddUser']."</div>";
    unset($_SESSION['errAddUser']);
}
elseif (isset($_SESSION['succAddUser'])) {
    echo "<div class=\"alert alert-success\" role=\"alert\">".$_SESSION['succAddUser']."</div>";
    unset($_SESSION['succAddUser']);
}
?>