<?php
require_once('../php/session/check_log_in.php');
require_once('../vendor/autoload.php');

$project = new ProjectDetails($_GET['id']);
$details=$project->details();

$table=new UsersThisProject($_GET['id'], $_SESSION['id']);

?>
<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="coleszka">

    <title>Scrum TaskBoard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link href="../css/style.css" rel="stylesheet">

</head>

<body style="background: none">



<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Scrum TaskBoard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/coleszka">GitHub</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontakt</a>
                </li>
                <li>
                    <img src="../image/profile.png">
                </li>
                <li>
                    <div style="margin-left: 3px;" class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['login']; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="../php/log-out/log-out.php">Wyloguj</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="user-content">
        <?php
            if ($project->existProject()==true) {
                echo "<h3>".$details['name']."</h3><h5>".$details['description']."</h5><hr>";
                echo <<<END
        <h5>Zespół</h5>
        <a class="btn btn-info" href="task-board.php?project={$_GET['id']}" role="button">+ Otwórz TaskBoard</a>
        <a class="btn btn-success" href="add-user.php?project={$_GET['id']}" role="button">+ Dodaj członka</a>
        <br><br>
END;
                $table->showMembers();

        }
            else {
                include("../php/projects/add_stories/alerts.php");
                echo "<div class=\"alert alert-danger\" role=\"alert\">Nie masz dostępu do tego projektu!</div>";
            }
            include("../php/projects/delete_user_from_project/alerts.php");
        ?>
    </div>


    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">

                <li>
                    <a href="../projects.php">Projekty</a>
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->



</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-3 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Scrum TaskBoard 2019</p>
    </div>
    <!-- /.container -->
</footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>