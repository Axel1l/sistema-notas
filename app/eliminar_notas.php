<?php
session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id_cali = $_GET["id"];

// Verificar que el usuario tenga permisos para eliminar calificaciones
if ($_SESSION['rol']!=2) {
  echo '<script>
    alert("No tienes permisos para eliminar calificaciones.");
    window.history.go(-1);
  </script>';
  exit;
}

// Verificar que el ID de la calificación exista en la base de datos
$verificar_calificacion = mysqli_query($conexion, "SELECT * FROM calificaciones WHERE idCalificaciones = '$id_cali'");

if(mysqli_num_rows($verificar_calificacion) == 0) {
  echo '<script>
    alert("El ID de la calificación no existe en la base de datos.");
    window.history.go(-1);
  </script>';
  exit;
}

// Si se cumplen las condiciones anteriores, eliminar la calificación
$eliminar = "DELETE FROM calificaciones WHERE idCalificaciones ='$id_cali'";
$resultadoEliminar = mysqli_query($conexion, $eliminar);

if($resultadoEliminar) {
  echo "<script>alert('La calificación ha sido eliminada correctamente');
  window.history.go(-1);</script>";
  // header("Location: mostrar_datos_administrador.php");
}else{
  echo"<script>
  alert('No se pudo eliminar la calificación.');
  window.history.go(-1);</script>";
}
?>



