<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id = $_GET["id"];
$eliminar = "DELETE FROM tutores WHERE idTutor='$id'";
$resultadoEliminar = mysqli_query($conexion, $eliminar);

if($resultadoEliminar) {
  echo "<script>
  alert('El tutor ha sido eliminado correctamente');
  window.history.go(-1);
  </script>";
  // header("Location: mostrar_datos_tutores.php");
}else{
  echo"<script>
  alert('No se pudo eliminar el Tutor.');
  window.history.go(-1);
  </script>";
}
 ?>
