<?php
      session_start();
if ($_SESSION['rol']!=3){
  header('Location:../login.php');
}

      require_once ('../bd/conexion.php');
      require_once ("../inc/menu_estudiante.php");
      require_once ("../inc/session.php");
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Horario</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
     <script src="../js/jquery-3.4.1.js"></script>
  </head>
  <body class="fondo_sistema">

    <div class="content">
      <div class="header">Parte visual</div>
      <p>contenido</p>
    </div>

  </body>
</html>
