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
$edad = $_POST["edad"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$fecha = $_POST["fecha"];
$tutor = $_POST["tutores"];
$curso = $_POST['curso'];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

$actualizar = "UPDATE alumnos SET nomAlumno='$nombre', apeAlumno='$apellido',edad='$edad',direccion='$direccion',telAlumno='$telefono',correoAlumno='$correo',nacFecha='$fecha',id_Tutores='$tutor',id_Curso='$curso',usuario='$usuario',clave='$clave' WHERE idAlumno='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if(!$resultado) {
  echo '<script>
        alert("Error al actualizar.");
        window.history.go(-1);
        </script>';
        header("Location: mostrar_datos_estudiante.php");
} else {
  echo '<script>
        alert("El Estudiante ha sido modificado correctamente.");
        window.history.go(-1);
        </script>';
        header("Location: mostrar_datos_estudiante.php");
}
// if(!$resultado){
//      echo '<script>
//      alert("Error al actualizar");
//      window.history.go(-1);
//      </script>';
// }else{
//      echo "El usuario ha sido modificado correctamente.";
//      header("Location: mostrar_datos_estudiante.php");
// }
?>
