<?php
if (isset($_SESSION['errProject'])) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION['errProject']."</div>";
    unset($_SESSION['errProject']);
}
elseif (isset($_SESSION['succProject'])) {
    echo "<div class=\"alert alert-success\" role=\"alert\">".$_SESSION['succProject']."</div>";
    unset($_SESSION['succProject']);
}
?>