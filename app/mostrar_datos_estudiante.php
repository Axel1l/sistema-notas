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
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
  </head>
  <body>

    <div class="content_sistema">
      <div class="cont_tablas">

        <div class="cont_buton">
          <h1 class="titulo_tabla">Listado de Estudiante</h1>
          <p><a href="registrar_estudiante.php"><input class="buton_tabla" type="submit" value="Añadir Estudiante"/></a></p>
        </div>

        <div class="contenedor_ad">
          <table class="tabla_sistem">
            <tr>
              <th class="campos_th">Nombre</th>
              <th class="campos_th">Apellido</th>
              <th class="campos_th">Edad</th>
              <th class="campos_th">Dirección</th>
              <th class="campos_th">Teléfono</th>
              <th class="campos_th">Correo</th>
              <th class="campos_th">Fecha nacimiento</th>
              <th class="campos_th">Nombre Tutor</th>
              <th class="campos_th">Curso</th>
              <th class="campos_th">Usuario</th>
              <th class="campos_th">Clave</th>
              <th class="campos_th">Operación</th>
            </tr>
            <?php
            $sql = "SELECT * FROM tutores";
            $resultado = mysqli_query($conexion, $sql);
            ?>

            <?php
              $sql = "SELECT * FROM alumnos AS a JOIN cursos AS c ON a.id_Curso = c.idCurso JOIN tutores AS t ON a.id_Tutores = t.idTutor JOIN usuario AS u ON a.id_User=u.idUser  ";
              $resultado = mysqli_query($conexion, $sql);

              while($mostrar = mysqli_fetch_assoc($resultado)) {
            ?>

            <tr>
              <td class="campos_td"><?php echo $mostrar['nomAlumno'] ?></td>
              <td class="campos_td"><?php echo $mostrar['apeAlumno'] ?></td>
              <td class="campos_td"><?php echo $mostrar['edad'] ?></td>
              <td class="campos_td"><?php echo $mostrar['direccion'] ?></td>
              <td class="campos_td"><?php echo $mostrar['telAlumno'] ?></td>
              <td class="campos_td"><?php echo $mostrar['correoAlumno'] ?></td>
              <td class="campos_td"><?php echo $mostrar['nacFecha'] ?></td>
              <td class="campos_td"><?php echo $mostrar['nomTutor'] ?></td>
              <td class="campos_td"><?php echo $mostrar['nomCurso'] ?></td>
              <td class="campos_td"><?php echo $mostrar['usuario'] ?></td>
              <td class="campos_td"><?php echo $mostrar['clave'] ?></td>
              <td class="campos_td">
                <div class="opcion_icon">
                  <a  class="opcion_tablas" href="modificarDatos_estudiante.php?id=<?php echo $mostrar['idAlumno']; ?>"><img src="../assets/icons/edit.svg" alt="Editar"></a> |
                  <a  class="opcion_tablas" href="Eliminar_datos.php?id=<?php echo $mostrar['idAlumno'] ?>"class="textoEliminar"><img src="../assets/icons/trash.svg" alt="Eliminar"></a>
                </div>
              </td>
            </tr>

          <?php
    }
          ?>

          </table>
        </div>

      </div>
    </div>

  </body>
</html>
