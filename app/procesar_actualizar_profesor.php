<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

// usuario
$rol = $_POST["rol_prof"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$curso = $_POST["curso"];
$materia = $_POST["materia"];

$actualizar_Usuario = "UPDATE usuario SET usuario='$usuario',clave='$clave',id_Rol='$rol' WHERE idUser='$rol'";

$resultado = mysqli_query($conexion, $actualizar_Usuario);

if(!$resultado){
  echo '<script>
     alert("Error al actualizar.");
     window.history.go(-2);
     </script>';
}else{
 echo '<script>
       alert("El profesor ha sido modificado correctamente.");
       window.history.go(-2);
       </script>';
       // header("Location: mostrar_datos_profesor.php");
}

$actualizar_profesor = "UPDATE SET profesor nomProfesor='$nombre',apeProfesor='$apellido',cedula='$cedula',direccion='$direccion',telProfesor='$telefono',correoProfesor='$correo',id_Curso='$curso',id_User='$idusu',id_materia='$materia'";

$resultadop = mysqli_query($conexion, $actualizar_profesor);

if(!$resultadop) {
    echo '<script>
    alert("El Profesor no ha sido modificado.");
    window.history.go(-1);
    </script>';
}else {
  echo '<script>
  alert("El Profesor ha sido modificado.");
  window.history.go(-1);
  </script>';
  // header("location: mostrar_datos_profesor.php");
}
?>
