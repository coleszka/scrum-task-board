<?php
if (isset($_SESSION['errProject'])) {
    foreach ($_SESSION['errProject'] as $err) {
        echo "<div class=\"alert alert-danger\" role=\"alert\">".$err."</div>";
    }
    unset($_SESSION['errProject']);
}
elseif (isset($_SESSION['succProject'])) {
    echo "<div class=\"alert alert-success\" role=\"alert\">".$_SESSION['succ']."</div>";
    unset($_SESSION['succProject']);
}
?>