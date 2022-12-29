<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$direccion = $_POST["direccion"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$telefono = $_POST["telefono"];

$actualizar = "UPDATE tutores SET nomTutor='$nombre', apeTutor='$apellido',cedula='$cedula',direccion='$direccion',telTutor='$telefono' WHERE idTutor='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if(!$resultado) {
  echo '<script>
        alert("Error al actualizar.");
        window.history.go(-2);
        </script>';
        // header("Location: mostrar_datos_tutores.php");
} else {
  echo '<script>
        alert("El Tutor ha sido modificado correctamente.");
        window.history.go(-2);
        </script>';
        // header("Location: mostrar_datos_tutores.php");
}
?>
