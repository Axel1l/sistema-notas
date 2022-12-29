<?php
session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id = $_POST["calificaciones"];
$califiP = $_POST['califip'];
$califiS = $_POST['califis'];
$califiT = $_POST['califit'];
$califiC = $_POST['calific'];
$califF = $_POST['promedio'];
// $califF = round(($califP + $califS + $califT + $califC)/4);
// $alumno = $_POST['alumno'];
// $materia = $_POST['materia'];




$actualizar = "UPDATE calificaciones SET calificacionP='$califiP', calificacionS='$califiS',calificacionT='$califiT',calificacionC='$califiC',notaFinal='$califF' WHERE idCalificaciones='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if(!$resultado) {
  echo '<script>
        alert("Error al actualizar.");
        window.history.go(-1);
        </script>';
        // header("Location: modificarNotas_estudiantes.php");
} else {
  echo '<script>
        alert("La nota ha sido modificado correctamente.");
        window.history.go(-1);
        </script>';
        // header("Location: modificarNotas_estudiantes.php");
}
?>
