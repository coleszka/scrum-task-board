<?php

$tabela[3]='<a class="dropdown-item" href="#">Do wykonania</a>
            <a class="dropdown-item" href="#">Testowanie</a>
            <a class="dropdown-item" href="#">Ukończone</a>';
$tabela[4]='<a class="dropdown-item" href="#">Do wykonania</a>
            <a class="dropdown-item" href="#">Wykonane</a>
            <a class="dropdown-item" href="#">Ukończone</a>';
$tabela[5]='<a class="dropdown-item" href="#">Do wykonania</a>
            <a class="dropdown-item" href="#">Wykonane</a>
            <a class="dropdown-item" href="#">Testowanie</a>';

/*echo '<div class="row" style="padding: 50px; padding-top: 10px;">';
for ($i=1;$i<6;$i++) {
    switch ($i) {
        case 1:
            for ($j=0; $j < $detailsStories['rows']; $j++) {
                echo <<<END
                <div class="w-100"></div>
                <div id="1-col" class="col">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem; margin-top: 5px;">
                                <div class="card-header">{$detailsStories['nameStories'][$i]}</div>
                                <div class="card-body">
                                    <p class="card-text">{$detailsStories['descStories'][$i]}</p>
                                </div>
                            </div>
                        </div>
END;
            }
            break;
        case 2:
            echo <<<END
            <div id="{$i}-col" class="col">
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
                <form method="post" action="../php/projects/add_task/do.php">
                    <div style="max-width: 180px;" class="input-group">

                        <input style="margin-right: 1px;" name="description" class="form-control" id="exampleFormControlInput1" placeholder="Nowe zadanie">
                        <input name="idStories" value="{$i}" type="hidden">
                        <input name="project" value="{$_GET['project']}" type="hidden">
                        <span class="input-group-btn" style="">
                    <button type="submit" class="btn btn-success">+</button>
                </span>
                    </div>
                </form>
END;
            include("../php/projects/add_task/alerts.php");
            echo '</div>';
            break;
        default:
            echo <<<END
<div id="{$i}-col" class="col">
                <div class="card text-white bg-secondary mb-3" style="max-width: 8rem; margin-top: 5px;">
                    <div class="card-body" style="padding: 5px 7px 5px 7px;">
                        <p class="card-text" style="font-size: 12px; margin: 0px;">Some quick example text to build on the card title.</p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akcja
                            </button>
                            <div class="dropdown-menu">
                                {$tabela[$i]}
                                <a class="dropdown-item" style="display: none" href="#">TEST</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
END;
            break;
    }



}
echo '</div><div class="w-100"></div>'*/



            for ($j=0; $j < $detailsStories['rows']; $j++) {
                $col1 = new ShowTasks($detailsStories['idStories'][$j],1);
                $toDoTask=$col1->tasks();
                $col2 = new ShowTasks($detailsStories['idStories'][$j],2);
                $doTask=$col2->tasks();
                $col3 = new ShowTasks($detailsStories['idStories'][$j],3);
                $testTask=$col3->tasks();
                $col4 = new ShowTasks($detailsStories['idStories'][$j],4);
                $doneTask=$col4->tasks();
                //var_dump($detailsTask);
                echo <<<END
                <div class="w-100"></div>
                <div id="1-col" class="col">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem; margin-top: 5px;">
                                <div class="card-header">{$detailsStories['nameStories'][$j]}</div>
                                <div class="card-body">
                                    <p class="card-text">{$detailsStories['descStories'][$j]}</p>
                                </div>
                            </div>
                        </div><div id="2-col" class="col">
END;
           for ($i=0; $i < $toDoTask['rows']; $i++) {
               echo <<<END
            
                <div class="card text-white bg-secondary mb-3" style="max-width: 8rem; margin-top: 5px;">
                    <div class="card-body" style="padding: 5px 7px 5px 7px;">
                        <p class="card-text" style="font-size: 12px; margin: 0px;">{$toDoTask['descTask'][$i]}</p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akcja
                            </button>
                            <div class="dropdown-menu">
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="2" type="hidden">
                                <input name="idTask" value="{$toDoTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Wykonane</button>
                                </form>
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="3" type="hidden">
                                <input name="idTask" value="{$toDoTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Testowanie</button>
                                </form>
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="4" type="hidden">
                                <input name="idTask" value="{$toDoTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Ukończone</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
END;
           }
                echo <<<END
                <form method="post" action="../php/projects/add_task/do.php">
                    <div style="max-width: 180px; margin-top: 5px; margin-bottom: 5px;" class="input-group">

                        <input style="margin-right: 1px;" name="description" class="form-control" id="exampleFormControlInput1" placeholder="Nowe zadanie">
                        <input name="idStories" value="{$detailsStories['idStories'][$j]}" type="hidden">
                        <input name="project" value="{$_GET['project']}" type="hidden">
                        <span class="input-group-btn" style="">
                    <button type="submit" class="btn btn-success">+</button>
                </span>
                    </div>
                </form>
END;
                include("../php/projects/add_task/alerts.php");
                echo '</div><div id="3-col" class="col">';

                for ($i=0; $i < $doTask['rows']; $i++) {
                    echo <<<END
                <div class="card text-white bg-secondary mb-3" style="max-width: 8rem; margin-top: 5px;">
                    <div class="card-body" style="padding: 5px 7px 5px 7px;">
                        <p class="card-text" style="font-size: 12px; margin: 0px;">{$doTask['descTask'][$i]}</p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akcja
                            </button>
                            <div class="dropdown-menu">
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="1" type="hidden">
                                <input name="idTask" value="{$doTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Do wykonania</button>
                                </form>
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="3" type="hidden">
                                <input name="idTask" value="{$doTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Testowanie</button>
                                </form>
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="4" type="hidden">
                                <input name="idTask" value="{$doTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Ukończone</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
END;
                }
                echo <<<END
                </div>
<div id="4-col" class="col">
END;
                for ($i=0; $i < $testTask['rows']; $i++) {
                    echo <<<END
                <div class="card text-white bg-secondary mb-3" style="max-width: 8rem; margin-top: 5px;">
                    <div class="card-body" style="padding: 5px 7px 5px 7px;">
                        <p class="card-text" style="font-size: 12px; margin: 0px;">{$testTask['descTask'][$i]}</p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akcja
                            </button>
                            <div class="dropdown-menu">
                               <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="1" type="hidden">
                                <input name="idTask" value="{$testTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Do wykonania</button>
                                </form>
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="2" type="hidden">
                                <input name="idTask" value="{$testTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Wykonane</button>
                                </form>
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="4" type="hidden">
                                <input name="idTask" value="{$testTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Ukończone</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
END;
                }
                echo <<<END
</div>
<div id="5-col" class="col">
END;
                for ($i=0; $i < $doneTask['rows']; $i++) {
                    echo <<<END
                <div class="card text-white bg-secondary mb-3" style="max-width: 8rem; margin-top: 5px;">
                    <div class="card-body" style="padding: 5px 7px 5px 7px;">
                        <p class="card-text" style="font-size: 12px; margin: 0px;">{$doneTask['descTask'][$i]}</p>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Akcja
                            </button>
                            <div class="dropdown-menu">
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="1" type="hidden">
                                <input name="idTask" value="{$doneTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Do wykonania</button>
                                </form>
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="2" type="hidden">
                                <input name="idTask" value="{$doneTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Wykonane</button>
                                </form>
                                <form method="post" action="../php/taskboard/update_task_timeline/do.php">
                                <input name="project" value="{$_GET['project']}" type="hidden">
                                <input name="toTimeline" value="3" type="hidden">
                                <input name="idTask" value="{$doneTask['idTask'][$i]}" type="hidden">
                                <button class="dropdown-item" type="submit">Testowanie</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
END;
                }
echo '</div>';
            }
?>