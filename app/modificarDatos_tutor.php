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
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Actualizar Datos del tutor</title>
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
          <h2>Actualizar Datos del Tutor</h2>
        </div>
        <div class="back_form">
          <a href="mostrar_datos_tutores.php"><img src="../assets/icons/x.svg" alt=""></a>
        </div>
      </div>

      <form action="procesar_actualizar_tutor.php" method="post">
        <?php
          $id = $_GET["id"];
          $sql = "SELECT * FROM tutores WHERE idTutor='$id'";
          $resultado = mysqli_query($conexion, $sql);

          While($mostrar = mysqli_fetch_assoc($resultado)) {
        ?>
        <input type="hidden" name="id" value="<?php echo $mostrar['idTutor'] ?>" required>

        <div class="control_form">
          <label class="registro_input label_form" for="nombre">Nombre:</label>
          <input class="registro_input input_form" type="text" name="nombre" value="<?php echo $mostrar['nomTutor'] ?>" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras" placeholder="Nombre">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="apellido">Apellido:</label>
          <input class="registro_input input_form" type="text" name="apellido" value="<?php echo $mostrar['apeTutor'] ?>" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras" placeholder="Apellido">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="cedula">Cédula:</label>
          <input class="registro_input input_form" type="text" name="cedula" value="<?php echo $mostrar['cedula'] ?>" required pattern="[0-9--]{13,13}" title="Aquí solo se permite introducir números" placeholder="000-0000000-0">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="direccion">Dirección:</label>
          <input class="registro_input input_form" type="text" name="direccion"  value="<?php echo $mostrar['direccion'] ?>" required pattern="[A-Za-zñíóúéá  0-9]{5,50}" title="El campo sobre paso los 50 caracteres" placeholder="Cuidad">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="telefono">Teléfono:</label>
          <input class="registro_input input_form" type="tel" name="telefono" value="<?php echo $mostrar['telTutor'] ?>" required pattern="[0-9--]{10,13}" title="Aquí solo se permite introducir letras" placeholder="000-000-0000">
        </div>

        <div class="btn_form">
          <input class="buton_tabla" type="submit" value="Actualizar"/>
        </div>
        <?php
          }
        ?>
      </form>
    </div>
  </body>
</html>
