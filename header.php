<?php
  session_start(); 
  if (!isset($_SESSION["allowed_browser"]) || !isset($_SESSION["username"])) {
    header('Location: index.php');
    flush();
    exit();
  }
?>
  <!doctype html>
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/fonts.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css"> 
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary"></button>
        </div>
        <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
          <div class="user-logo">
            <div class="img" style="background-image: url(images/user.png);"></div>
            <h3><?php echo($_SESSION["username"]); ?></h3>
          </div>
        </div>

        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="dashboard.php"><span class="fa fa-home mr-3"></span> Inicio</a>
          </li>
          <li>
              <a href="listusers.php"><span class="fa  fa-users mr-3"></span> Usuarios</a>
          </li>
          <li>
            <a href="phpinfo.php"><span class="fa fa-gear mr-3"></span> Sistema</a>
          </li>
          <li>
            <a href="browserinfo.php"><span class="fa fa-chrome mr-3"></span> Navegador</a>
          </li>
          <li>
            <a href="ping.php"><span class="fa fa-plug mr-3"></span> Conectividad</a>
          </li>
          
          <li>
            <a href="ganadores.php"><span class="fa fa-trophy mr-3"></span> Ganadores</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-support mr-3"></span> Ayuda</a>
          </li>
          <li>
            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Salir</a>
          </li>
        </ul>

    </nav>
