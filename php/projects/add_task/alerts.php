<?php
if (isset($_SESSION['errTask'])) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION['errTask']."</div>";
    unset($_SESSION['errTask']);
}
elseif (isset($_SESSION['succTask'])) {
    echo "<div style='font-size: 12px;' class=\"alert alert-success\" role=\"alert\">".$_SESSION['succTask']."</div>";
    unset($_SESSION['succTask']);
}
?>