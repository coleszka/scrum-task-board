<?php
require_once ('../php/session/check_log_in.php');
require_once('../vendor/autoload.php');
require_once ("../php/statement/statement.php");

$project = new ProjectDetails($_GET['id']);
$details = $project->details();

$userProject = new UserProjectDetails($_GET['idUser']);
$detailsUser = $userProject->details();

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
                    <a class="nav-link" href="index.php">Home
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
        <h3><?php echo $detailsUser['login']; ?></h3>
        <h5><?php echo  $details['name'];?></h5>
        <hr>
        <h6>Uprawnienia:</h6>
        <ul class="list-group">
            <li class="list-group-item">
                <p>Dodawanie Tasków</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Tak
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Nie
                    </label>
                </div></li>
            <li class="list-group-item">
                <p>Dodawanie Stories</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Tak
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Nie
                    </label>
                </div>
            </li>
            <li class="list-group-item">
                <p>Przenoszenie Tasków</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios2" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Tak
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios2" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Nie
                    </label>
                </div></li>

        </ul>




        <hr>
        <h6>Historia działań:</h6>

        <table class="table">
            <thead>
            <tr class="table-active">
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Akcja</th>
                <th scope="col">Opis</th>
            </tr>
            </thead>
            <tbody>
            <tr class="table-danger">
                <th scope="row">1</th>
                <td>Stories</td>
                <td>Usunięcie</td>
                <td>Stories nr# usunięty na poziomie Testowanie</td>
            </tr>
            <tr class="table-success">
                <th scope="row">2</th>
                <td>Task</td>
                <td>Dodanie</td>
                <td>Task nr # dodany o dacie/godzinie</td>
            </tr>
            <tr class="table-primary">
                <th scope="row">3</th>
                <td>Task</td>
                <td>Przeniesienie</td>
                <td>Przeniesienie Tasku nr# z Do zrobienia do Testowanie</td>
            </tr>
            </tbody>
        </table>
        <br>
        <?php require_once ("../php/projects/edit_project/alerts.php") ?>
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