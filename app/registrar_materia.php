<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro de materias</title>
    <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
  </head>
  <body class="fondo_sistema">

    <?php
      include ("../inc/menu_administrador.php");
    ?>

    <div class="form_registro">
      <div class="text_form">
        <div class="title_form">
          <h2>Registrar Materia</h2>
        </div>
        <div class="back_form">
          <a href="mostrar_datos_materias.php"><img src="../assets/icons/x.svg" alt=""></a>
        </div>
      </div>

      <form action="anadir_materia.php" method="post">

        <div class="control_form">
          <label class="registro_input label_form" for="materia">Nombre:</label>
          <input class="registro_input input_form" type="text" name="materia" class="control_form" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras"  placeholder="Materia">
        </div>

        <div class="btn_form">
          <input class="buton_tabla" type="submit" value="Registrar">
        </div>

    </form>
    </div>
  </body>
</html>
