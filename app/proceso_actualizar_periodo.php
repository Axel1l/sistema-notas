<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id = $_POST["id"];
$periodo = $_POST["periodo"];

$actualizar = "UPDATE periodo SET periodo='$periodo' WHERE idperiodo='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if(!$resultado) {
  echo '<script>
        alert("Error al actualizar.");
        window.history.go(-2);
        </script>';
        header("Location: mostrar_datos_periodo.php");
} else {
  echo '<script>
        alert("El materia ha sido modificado correctamente.");
        window.history.go(-2);
        </script>';
        header("Location: mostrar_datos_periodo.php");
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