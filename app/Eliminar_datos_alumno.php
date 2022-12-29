<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id = $_GET["id"];
$eliminar = "DELETE FROM alumnos WHERE idAlumno='$id'";
$resultadoEliminar = mysqli_query($conexion, $eliminar);

if($resultadoEliminar) {
  echo"<script>
  alert('Se pudo eliminar el Estudiante correctamente.');
  window.history.go(-1);
  </script>";
  // header("Location: mostrar_datos_estudiante.php");
}else{
  echo"<script>
  alert('No se pudo eliminar el Estudiante.');
  window.history.go(-1);
  </script>";
}
 ?>
