<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');
include ("../inc/menu_administrador.php");

$id = $_GET["id"];
$eliminar = "DELETE FROM usuario WHERE idUser='$id'";
$resultadoEliminar = mysqli_query($conexion, $eliminar);

if($resultadoEliminar) {
  echo "<script>alert('El usuario ha sido eliminado correctamente');
  window.history.go(-1);</script>";
  // header("Location: mostrar_usuario.php");
}else{
  echo"<script>
  alert('No se pudo eliminar el usuario.');
  window.history.go(-1);
  </script>";
}
 ?>
