<?php
if (isset($_SESSION['errStories'])) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION['errStories']."</div>";
    unset($_SESSION['errStories']);
}
elseif (isset($_SESSION['succStories'])) {
    echo "<div class=\"alert alert-success\" role=\"alert\">".$_SESSION['succStories']."</div>";
    unset($_SESSION['succStories']);
}
?>