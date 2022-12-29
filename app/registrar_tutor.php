<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro de Tutores</title>
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
        <h2>Registrar Tutor</h2>
        </div>
        <div class="back_form">
          <a href="mostrar_datos_tutores.php"><img src="../assets/icons/x.svg" alt=""></a>
        </div>
      </div>

      <form name="formulario" action="anadir_tutor.php" method="post">
        <div class="control_form">
          <label class="registro_input label_form" for="nombre">Nombre:</label>
          <input class="input_form registro_input" type="text" name="nombre" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras"  placeholder="Nombre">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="apellido">Apellido:</label>
          <input class="input_form registro_input" type="text" name="apellido" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras" placeholder="Apellido">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="cedula">Cédula:</label>
          <input class="input_form registro_input" type="text" name="cedula"  required pattern="[0-9--]{13,13}" title="Aquí solo se permite introducir números" placeholder="000-0000000-0">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="direccion">Dirección:</label>
          <input class="input_form registro_input" type="text" name="direccion" required pattern="[A-Za-zñíóúéá  0-9]{5,50}" title="Aquí solo se permite introducir letras" placeholder="Cuidad">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="telefono">Teléfono:</label>
          <input class="input_form registro_input" type="tel" name="telefono"  required pattern="[0-9--]{10,15}" title="Aquí solo se permite introducir números" placeholder="000-000-0000">
        </div>

        <div class="btn_form">
          <input class="buton_tabla" type="submit" value="Registrar">
        </div>
      </form>
    </div>

  </body>
</html>
