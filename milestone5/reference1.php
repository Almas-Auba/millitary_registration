<!DOCTYPE html>
<?php
require_once "db/connection.php";
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Администратор</title>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/bootstrap.css" rel="stylesheet" >
    <link href="css/blog.css" rel="stylesheet" >


    <!-- Favicons -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
    <img src="image/vsrk.png" style="width: 60px; height: 60px;">
    <a href="index.php " style="text-decoration: none; color: black" >
        <h5 class="display-4 pl-2 pt-2 " style="font-family: Arial; font-weight: bold  ">Военный учет студентов</h5></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link btn btn-outline-light text-dark" href="index.php">Выйти</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse"  >
            <div class="sidebar-sticky pt-3" ">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="adminpage.php" style="color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        Список студентов
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="admin_spr.php" style="color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        Справки
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ref_issues.php" style="color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        Выданные справки
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="udo.php" style="color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        УДО
                    </a>
                </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Выдаваемые справки</span>
                <a class="d-flex align-items-center text-muted" href="ref_issues.php" aria-label="Add a new report">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
            </h6>
            <?php

            $g_row12 = $pdo_conn->query("Select * from reference");
            foreach($g_row12 as $row12){

                ?>
                <ul class="nav flex-column mb-2">
                    <form method="post" action="ref_selector.php">
                        <li class="nav-item">
                            <button type="submit" name="ssss" class="form-control btn-outline-dark mt-3 text-light bg-dark">
                                <input type="hidden" name="idforref" value="<?=$row12['id']?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <?=$row12['name1']?>
                            </button>
                        </li>
                    </form>
                </ul>
                <?php
            }
            ?>
    </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" >
        <div class="chartjs-size-monitor" style=" position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style=" background: rgba(209,179,102,0.53) ;position:absolute;width:1000000px;height:1000000px;left:0;top:0">                    </div>
            </div>
            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="background: rgba(209,179,102,0.53); position:absolute;width:200%;height:200%;left:0; top:0">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="background: rgba(209,179,102,0.53);">
            <h1 class="h2">Воинский учет</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 bg-light rounded p-3 mb-5">
                <h4 class=" float-right text-center">к Правилам о порядке  <br>
                    ведения воинского<br>
                    учета военнообязанных и призывников<br>
                    в Республике Казахстан</h4>
            </div>
            <div class="col-8 bg-light rounded p-3 ml-5">
                <h5 class="text-center mb-5">Форма N 1</h5>
                <p>Фамилия:_________________________________________</p>
                <p>Имя:_____________________________________________</p>
                <p>Отчество:________________________________________</p>
                <p>Адрес:___________________________________________</p>

                <br>
                <h5 class="text-center mb-5">I. Общие сведения</h5>
                <p>1. Место рождения:_________________________________________</p>
                <p>2. Образование:____________________________________________</p>
                <p>3. Гражданские специальности:______________________________</p>
                <p>4. Наличие первого спортивного разряда или спортивного звания:______________________________
                </p>
                <p>5. Семейное положение _____________________________________</p>

    </main>
</div>
</body>
</html>
