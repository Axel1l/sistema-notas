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
    <title>Registro de Estudiantes</title>
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
        <h2>Registrar Estudiante</h2>
      </div>
      <div class="back_form">
        <a href="mostrar_curso_del_Adm.php"><img src="../assets/icons/x.svg" alt=""></a>
      </div>
    </div>

    <form action="anadir_estudiante.php" method="POST">
      <div class="control_form">
        <label class="registro_input label_form" for="nombre">Nombre:</label>
        <input class="registro_input input_form" type="text" name="nombre" placeholder="Nombre" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras">
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="apellido">Apellido:</label>
        <input class="registro_input input_form" type="text" name="apellido" placeholder="Apellidos" required  pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras">
      </div>

      <!-- <div class="control_form">
        <label class="registro_input label_form" for="edad">Edad:</label>
        <input class="registro_input input_form" type="number" name="edad" placeholder="Edad" required pattern="[0-9]+{2}" title="Aquí solo se permite introducir números">
      </div> -->

      <div class="control_form">
        <label class="registro_input label_form" for="direccion">Dirección:</label>
        <input class="registro_input input_form" type="text" name="direccion" placeholder="Cuidad" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras">
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="telefono">Teléfono:</label>
        <input class="registro_input input_form" type="number" name="telefono" placeholder="000-000-0000" required  title="Aquí solo se permite introducir números">
      </div>


      <div class="control_form">
        <label class="registro_input label_form" for="correo">Correo:</label>
        <input class="registro_input input_form" type="email" name="correo" placeholder="xxxxxx@gmail.com" title="Correo electronico con @">
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="fecha">Fecha de Nacimiento:</label>
        <input class="registro_input input_form" type="date" name="fecha" placeholder="0000-00-00" title="Aquí solo se permite introducir números">
      </div>

      <!-- Select del curso -->
      <div class="control_form">
        <label class="registro_input label_form" for="curso">Curso</label>
        <select name="curso" class="registro_input input_form">
          <option value="0">Seleccione:</option>
          <?php
            // $curso = $_SESSION['IDcurso'];
            // Realizamos la consulta para extraer los datos
            $sql = "SELECT * FROM cursos";
            $resultado = mysqli_query($conexion, $sql);
            While($valores = mysqli_fetch_array($resultado)) {
            $idCurso=$valores['idCurso'];
            $nombreMateria=$valores['nomCurso'];
          ?>
          <option value="<?php echo $idCurso ?>"><?php echo $nombreMateria ?></option>
          <?php
            }
          ?>
        </select>
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="usuario">Usuario: </label>
        <input class="registro_input input_form" type="text" name="usuario" placeholder="Usuario" title="digite el usuario">
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="clave">Clave: </label>
        <input class="registro_input input_form" type="password" name="clave" placeholder="Clave" required title="digite la contraseña " >
      </div>

      <!-- Select del Rol -->
      <div class="control_form">
        <label class="registro_input label_form" for="rol">Rol:</label>
        <select name="rol" class="registro_input input_form">
          <?php
            // $curso = $_SESSION['ID_Rol'];
            // Realizamos la consulta para extraer los datos
            $sql = "SELECT * FROM roles WHERE idRol= 3";
            $resultado = mysqli_query($conexion, $sql);
            While($valores = mysqli_fetch_array($resultado)) {
            $idRol=$valores['idRol'];
            $nombreRol=$valores['nomRol'];
          ?>
          <option value="<?php echo $idRol ?>"><?php echo $nombreRol ?></option>
          <?php
            }
          ?>
        </select>
      </div>

      <!-- Registro Tutor -->
      <div>
        <div class="text_nota"><p >Tutor del Estudiante:</p></div>
      <div class="control_form">
        <label class="registro_input label_form" for="nombre">Nombre:</label>
        <input class="registro_input input_form" type="text" name="nombret" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Digite el nombre del tutor"  placeholder="Nombre">
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="apellido">Apellido:</label>
        <input class="registro_input input_form" type="text" name="apellidot" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Digite el apellido del Tutor" placeholder="Apellido">
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="relacion">parentesco Familiar:</label>
        <input class="registro_input input_form" type="text" name="relacion" required pattern="[A-Za-zñíóúéá  ]{2,50}" title="Digite su relacion familiar con el tutor"  placeholder="parentesco Familiar:">
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="cedula">Cédula:</label>
        <input class="registro_input input_form" type="text" name="cedulat"  required pattern="[0-9]{7,10}" title="Digite la cedula" placeholder="000-0000000-0">
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="direccion">Dirección:</label>
        <input class="registro_input input_form" type="text" name="direcciont" required pattern="[A-Za-zñíóúéá  0-9]{3,50}" title="Digite la direccion" placeholder="Cuidad">
      </div>

      <div class="control_form">
        <label class="registro_input label_form" for="telefono">Teléfono:</label>
        <input class="registro_input input_form" type="number" name="telefonot"  required  title="Digite el numero de telefono" placeholder="000-0000-000">
      </div>

      <div class="btn_form">
        <input class="buton_tabla" type="submit" value="Registrar">
      </div>
    </form>
    </div>
  </body>
</html>
