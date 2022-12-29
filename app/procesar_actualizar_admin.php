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
$telefono = $_POST["telefono"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

$actualizar = "UPDATE administrador SET nomAdmin='$nombre', apeAdmin='$apellido',cedula='$cedula',direccion='$direccion',usuario='$usuario',clave='$clave',telAdmin='$telefono' WHERE idAdministrador='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if(!$resultado) {
  echo '<script>
        alert("Error al actualizar.");
        window.history.go(-1);
        </script>';
        header("Location: mostrar_datos_administrador.php");
} else {
  echo '<script>
        alert("El Administrador ha sido modificado correctamente.");
        window.history.go(-1);
        </script>';
        header("Location: mostrar_datos_administrador.php");
}
// if(!$resultado){
//      echo '<script>
//      alert("Error al actualizar");
//      window.history.go(-1);
//      </script>';
// }else{
//      echo "El usuario ha sido modificado correctamente.";
//      header("Location: mostrar_datos_administrador.php");
// }
?>
