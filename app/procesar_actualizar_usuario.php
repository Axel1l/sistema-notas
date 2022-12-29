<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id = $_POST["id"];
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$roles = $_POST['roles'];
$actualizar = "UPDATE usuario SET usuario='$usuario',clave='$clave',id_Rol='$roles' WHERE idUser='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if(!$resultado) {
  echo '<script>
        alert("Error al actualizar.");
        window.history.go(-2);
        </script>';
        // header("Location: mostrar_usuarios.php");
} else {
  echo '<script>
        alert("El usuario ha sido modificado correctamente.");
        window.history.go(-2);
        </script>';
        // header("Location: mostrar_usuarios.php");
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
