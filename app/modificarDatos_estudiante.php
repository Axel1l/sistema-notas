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
  <title>Actualizar Datos del Estudiante</title>
  <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
  <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
  </head>
  <body class="fondo_sistema">
    <div class="form_registro">
      <div class="text_form">
        <div class="title_form">
          <h2>Actualizar Datos del Estudiante</h2>
        </div>
        <div class="back_form">
          <a href="mostrar_datos_estudiante.php"><img src="../assets/icons/x.svg" alt=""></a>
        </div>
      </div>

      <form action="procesar_actualizar_estudiante.php" method="post">

        <?php
          $id = $_GET["id"];
          $sql = "SELECT * FROM alumnos AS a 	INNER JOIN cursos AS c ON a.id_Curso = c.idCurso INNER JOIN usuario AS u ON a.id_User=u.idUser INNER JOIN tutores AS t ON a.id_Tutores = t.idTutor WHERE idAlumno='$id'";

          $resultado = mysqli_query($conexion, $sql);

          While($mostrar = mysqli_fetch_assoc($resultado)) {
        ?>

        <div class="control_form">
          <label class="registro_input label_form" for="nombre">Nombre:</label>
          <input class="registro_input input_form" type="text" name="nombre" placeholder="Nombre" value="<?php echo $mostrar['nomAlumno'] ?>" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="apellido">Apellido:</label>
          <input class="registro_input input_form" type="text" name="apellido" placeholder="Apellidos"  value="<?php echo $mostrar['apeAlumno'] ?>" required  pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="edad">Edad:</label>
          <input class="registro_input input_form" type="number" name="edad" placeholder="Edad"  value="<?php echo $mostrar['edad'] ?>" required pattern="[0-9]+{2}" title="Aquí solo se permite introducir números">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="direccion">Dirección:</label>
          <input class="registro_input input_form" type="text" name="direccion" placeholder="Cuidad"  value="<?php echo $mostrar['direccion'] ?>" required pattern="[A-Za-zñíóúéá  ]{3,40}" title="Aquí solo se permite introducir letras">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="telefono">Teléfono:</label>
          <input class="registro_input input_form" type="tel" name="telefono" placeholder="000-000-0000" value="<?php echo $mostrar['telAlumno'] ?>" required pattern="[0-9--]{10,15}" title="Aquí solo se permite introducir números">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="correo">Correo:</label>
          <input class="registro_input input_form" type="email" name="correo" placeholder="xxxxxx@gmail.com" value="<?php echo $mostrar['correoAlumno'] ?>" required  title="Correo electronico con @">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="fecha">Fecha:</label>
          <input class="registro_input input_form" type="date" name="fecha" placeholder="0000-00-00" value="<?php echo $mostrar['nacFecha'] ?>" required pattern="[0-9--]{2,10}" title="Aquí solo se permite introducir números">
        </div>

        <!-- Tutor -->
          <?php
            $curso = $_SESSION['ID_Tutores'];
          ?>

          <div class="control_form">
            <label class="registro_input label_form" for="nombre">Nombre:</label>
            <input class="registro_input input_form" type="text" name="nombret" value="<?php echo $mostrar['nomTutor'] ?>" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras"  placeholder="Nombre">
          </div>

          <div class="control_form">
            <label class="registro_input label_form" for="apellido">Apellido:</label>
            <input class="registro_input input_form" type="text" name="apellidot" value="<?php echo $mostrar['apeTutor'] ?>" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras" placeholder="Apellido">
          </div>

          <div class="control_form">
            <label class="registro_input label_form" for="cedula">Cédula:</label>
            <input class="registro_input input_form" type="text" name="cedulat" value="<?php echo $mostrar['cedula'] ?>"  required pattern="[0-9--]{13,13}" title="Aquí solo se permite introducir números" placeholder="000-0000000-0">
          </div>

          <div class="control_form">
            <label class="registro_input label_form" for="direccion">Dirección:</label>
            <input class="registro_input input_form" type="text" name="direcciont" value="<?php echo $mostrar['direccion'] ?>" required pattern="[A-Za-zñíóúéá  0-9]{3,50}" title="Aquí solo se permite introducir letras" placeholder="Cuidad">
          </div>

          <div class="control_form">
            <label class="registro_input label_form" for="telefono">Teléfono:</label>
            <input class="registro_input input_form" type="tel" name="telefonot" value="<?php echo $mostrar['telTutor'] ?>"  required pattern="[0-9--]{10,15}" title="Aquí solo se permite introducir números" placeholder="000-0000-000">
          </div>

          <!-- Select del curso -->
          <div class="control_form">
          <label class="registro_input label_form" for="curso">Curso</label>
          <select class="registro_input input_form" name="curso">
            <option value="0">Seleccione:</option>
            <?php
              $curso = $_SESSION['IDcurso'];
              // Realizamos la consulta para extraer los datos
              $sql = "SELECT * FROM cursos";
              $resultado = mysqli_query($conexion, $sql);
              While($valores = mysqli_fetch_array($resultado)) {
              $idCurso=$valores['idMateria'];
              $nombreMateria=$valores['nomCurso'];
            ?>

            <option value="<?php echo $idCurso ?>"><?php echo $nombreMateria ?></option>
            <?php
              }
            ?>
          </select>
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="direccion">Usuario:</label>
          <input class="registro_input input_form" type="text" name="usuario" placeholder="Usuario" value="<?php echo $mostrar['usuario'] ?>" required pattern="[A-Za-zñíóúéá0-9]{5,50}">
        </div>

        <div class="control_form">
          <label class="registro_input label_form" for="direccion">Clave:</label>
          <input class="registro_input input_form" type="password" name="clave" placeholder="Contraseña" value="<?php echo $mostrar['clave'] ?>" required pattern="[A-Za-z0-9]{3,50}">
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
