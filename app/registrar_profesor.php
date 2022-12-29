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
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Registro de Profesor</title>
    <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
</head>

<body>
    <div class="form_registro">
        <div class="text_form">
            <div class="title_form">
                <h2>Registrar Profesor</h2>
            </div>
            <div class="back_form">
                <a href="mostrar_datos_profesor.php"><img src="../assets/icons/x.svg" alt=""></a>
            </div>
        </div>

        <form action="anadir_profesor.php" method="post">
            <div class="control_form">
                <label class="registro_input label_form" for="nombre">Nombre: </label>
                <input class="registro_input input_form" type="text" name="nombre" placeholder="Nombre" required
                    pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras">
            </div>

            <div class="control_form">
                <label class="registro_input label_form" for="apellido">Apellido: </label>
                <input class="registro_input input_form" type="text" name="apellido" placeholder="Apellido" required
                    pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras">
            </div>

            <div class="control_form">
                <label class="registro_input label_form" for="cedula">Cédula: </label>
                <input class="registro_input input_form" type="text" name="cedula" placeholder="000-0000000-0" required
                    pattern="[0-9--]{10,15}" title="Aquí solo se permite introducir números">
            </div>

            <div class="control_form">
                <label class="registro_input label_form" for="direccion">Dirección: </label>
                <input class="registro_input input_form" type="text" name="direccion" placeholder="Cuidad" required
                    pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras">
            </div>

            <div class="control_form">
                <label class="registro_input label_form" for="telefono">Teléfono: </label>
                <input class="registro_input input_form" type="tel" name="telefono" placeholder="000-0000-000" required
                    pattern="[0-9--]{10,15}" title="Aquí solo se permite introducir números">
            </div>

            <div class="control_form">
                <label class="registro_input label_form" for="correo">Correo: </label>
                <input class="registro_input input_form" type="email" name="correo" placeholder="xxxxxx@gmail.com"
                    required pattern="[A-Za-zñíóúéá.@]{2,40}" title="Correo electronico con @">
            </div>


            <!-- Select del curso -->
            <div class="control_form">
                <label class="registro_input label_form" for="curso">Curso:</label>
                <select name="curso" class="registro_input input_form">
                    <option value="0">Seleccione:</option>
                    <?php

              // Realizamos la consulta para extraer los datos
              $sql = "SELECT * FROM cursos";
              $resultado = mysqli_query($conexion, $sql);
              While($valores = mysqli_fetch_array($resultado)) {
              $idCurso=$valores['idCurso'];
              $nomcurso=$valores['nomCurso'];
            ?>
                    <option value="<?php echo $idCurso ?>"><?php echo $nomcurso ?></option>
                    <?php
              }
            ?>
                </select>
            </div>

            <!-- Select del materia -->
            <div class="control_form">
                <label class="registro_input label_form" for="materia">materia:</label>
                <select name="materia" class="registro_input input_form">
                    <option value="0">Seleccione:</option>
                    <?php

            // Realizamos la consulta para extraer los datos
            $sql = "SELECT * FROM materias ";
            $resultado = mysqli_query($conexion, $sql);
            While($valores = mysqli_fetch_array($resultado)) {
            $idmateria=$valores['idMateria'];
            $nomMateria=$valores['nomMateria'];
          ?>
                    <option value="<?php echo $idmateria ?>"><?php echo $nomMateria ?></option>
                    <?php
            }
          ?>
                </select>
            </div>

            <!-- Select del Rol -->
            <div class="control_form">
                <label class="registro_input label_form" for="rol">Rol:</label>
                <select name="rol_prof" class="registro_input input_form">
                    <?php

            // Realizamos la consulta para extraer los datos
            $sql = "SELECT * FROM roles WHERE idRol= 2";
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

            <div class="control_form">
                <label class="registro_input label_form" for="usuario">Usuario:</label>
                <input class="registro_input input_form" type="text" name="usuario" placeholder="Usuario" required
                    pattern="[A-Za-zñíóúéá0-9]{5,50}" title="introduzca el usuario">
            </div>

            <div class="control_form">
                <label class="registro_input label_form" for="clave">Clave:</label>
                <input class="registro_input input_form" type="password" name="clave" placeholder="Clave" required
                    title="contraseña con mas de 3 caracteres">
            </div>

            <div class="btn_form">
                <input class="buton_tabla" type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>

</html>