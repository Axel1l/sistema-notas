<?php
    session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro de cursos</title>
    <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
  </head>
  <body class="fondo_sistema">

    <div class="form_registro">

      <div class="text_form">
        <div class="title_form">
          <h2>Registrar Curso</h2>
        </div>
        <div class="back_form">
          <a href="mostrar_datos_cursos.php"><img src="../assets/icons/x.svg" alt=""></a>
        </div>
      </div>

      <form action="anadir_curso.php" method="post">

        <div class="control_form">
          <label class="registro_input label_form" for="curso">Curso:</label>
          <input class="registro_input input_form" type="text" name="curso" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras"  placeholder="Curso">
        </div>

        <div class="btn_form">
          <input class="buton_tabla" class="btn_form" type="submit" value="Registrar">
        </div>

      </form>

    </div>


  </body>
</html>
