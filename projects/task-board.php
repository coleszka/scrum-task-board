<?php
require_once('../php/session/check_log_in.php');
require_once('../vendor/autoload.php');

$project = new ProjectDetails($_GET['project']);
$details=$project->details();
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
    <div class="user-content" >

        <?php
        if ($project->existProject()==true) {
            echo "<h3>".$details['name']."</h3><h5>".$details['description']."</h5><hr>";
        }
        else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Nie masz dostępu do tego projektu!</div>";
        }
        ?>
        <form method="POST" action="../php/projects/add_stories/do.php">
            <div style="max-width: 800px;" class="input-group">

                <input style="margin-right: 1px; max-width: 30%; border-right: none" name="nameStories" class="form-control" id="exampleFormControlInput1" placeholder="Nazwa stories">
                <input style="margin-right: 1px;" name="descStories" class="form-control" id="exampleFormControlInput1" placeholder="Opis stories">
                <input name="project" value="<?php echo $_GET['project']?>" type="hidden">
                <span class="input-group-btn" style="">
                    <button type="submit" class="btn btn-success">+</button>
                </span>
            </div>
        </form>
        <?php
        include("../php/projects/add_stories/alerts.php");
        ?>
        <br>
        <div class="row" style="padding: 50px; padding-top: 10px;">
            <div id="1-col" class="col" style="background-color: white">
                <h5>Stories</h5>
            </div>
            <div id="2-col" class="col" style="background-color: white">
                <h5>Do wykonania</h5>
            </div>
            <div id="3-col" class="col" style="background-color: white">
                <h5>Wykonane</h5>
            </div>
            <div id="4-col" class="col" style="background-color: white">
                <h5>Testowanie</h5>
            </div>
            <div id="5-col" class="col" style="background-color: white">
                <h5>Ukończone</h5>
            </div>
            <div class="w-100"></div>
            <div id="1-col" class="col">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem; margin-top: 5px;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title.</p>
                    </div>
                </div>
            </div>
            <div id="2-col" class="col">
                <div class="card text-white bg-secondary mb-3" style="max-width: 8rem; margin-top: 5px;">
                    <div class="card-body" style="padding: 5px 7px 5px 7px;">
                        <p class="card-text" style="font-size: 12px; margin: 0px;">Some quick example text to build on the card title.</p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akcja
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Wykonane</a>
                                <a class="dropdown-item" href="#">Testowanie</a>
                                <a class="dropdown-item" href="#">Ukończone</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="get" action="">
                    <div style="max-width: 180px;" class="input-group">

                        <input style="margin-right: 1px;" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nowe zadanie">
                        <input name="project" value="<?php echo $_GET['project']?>" type="hidden">
                        <span class="input-group-btn" style="">
                    <button type="submit" class="btn btn-success">+</button>
                </span>
                    </div>
                </form>
            </div>
            <div id="3-col" class="col">
                <div class="card text-white bg-secondary mb-3" style="max-width: 8rem; margin-top: 5px;">
                    <div class="card-body" style="padding: 5px 7px 5px 7px;">
                        <p class="card-text" style="font-size: 12px; margin: 0px;">Some quick example text to build on the card title.</p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akcja
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Do wykonania</a>
                                <a class="dropdown-item" href="#">Testowanie</a>
                                <a class="dropdown-item" href="#">Ukończone</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="4-col" class="col">
                <div class="card text-white bg-secondary mb-3" style="max-width: 8rem; margin-top: 5px;">
                    <div class="card-body" style="padding: 5px 7px 5px 7px;">
                        <p class="card-text" style="font-size: 12px; margin: 0px;">Some quick example text to build on the card title.</p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akcja
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Do wykonania</a>
                                <a class="dropdown-item" href="#">Wykonane</a>
                                <a class="dropdown-item" href="#">Ukończone</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="5-col" class="col">
                <div class="card text-white bg-secondary mb-3" style="max-width: 8rem; margin-top: 5px;">
                    <div class="card-body" style="padding: 5px 7px 5px 7px;">
                        <p class="card-text" style="font-size: 12px; margin: 0px;">Some quick example text to build on the card title.</p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akcja
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Do wykonania</a>
                                <a class="dropdown-item" href="#">Wykonane</a>
                                <a class="dropdown-item" href="#">Testowanie</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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