<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id = $_POST["idCurso"];
$nombre = $_POST["curso"];

$actualizar = "UPDATE cursos SET nomCurso = '$nombre' WHERE idCurso = '$id'";

$resultado = mysqli_query($conexion, $actualizar);

if(!$resultado) {
  echo '<script>
        alert("Error al actualizar.");
        window.history.go(-2);
        </script>';
        header("Location: mostrar_datos_cursos.php");
} else {
  echo '<script>
        alert("El curso ha sido modificado correctamente.");
       window.history.go(-2);
        </script>';
        header("Location: mostrar_datos_cursos.php");
}
?>
