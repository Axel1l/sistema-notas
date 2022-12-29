<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

// usuario
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$rol = $_POST["rol_admin"]; 

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];



$insertar_Usuario = "INSERT INTO usuario
(idUser,usuario,clave,id_Rol)VALUES('','$usuario','$clave','$rol')";


$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario'");

if(mysqli_num_rows($verificar_usuario) > 0) {
  echo '<script>
        alert("El usuario ya esta registrado.");
        window.history.back();
        </script>';

        exit;
}

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE clave='$clave'");

if(mysqli_num_rows($verificar_usuario) > 0) {
    echo '<script>
    alert("la Contraseña no cumple con los requisitos.");
    window.history.back();
    <script>';

    exit;
}

$resultado_usuario = mysqli_query($conexion, $insertar_Usuario);


if(!$resultado_usuario){
  echo '<script>
    alert("error al registrarse .");
    window.history.back();
    <script>';
} else {

  $verificar_usuario = "SELECT * FROM usuario WHERE usuario='$usuario' and clave='$clave' ";
  $resultado_usuario = mysqli_query($conexion, $verificar_usuario);
  $fila_usuario=mysqli_fetch_array($resultado_usuario);
  $idusu = $fila_usuario['idUser'];


  $insertar_Admin = "INSERT INTO administrador
(nomAdmin,apeAdmin,cedula,direccion,telAdmin,id_User)VALUES('$nombre','$apellido','$cedula','$direccion','$telefono','$idusu')";
$resultado_Admin = mysqli_query($conexion, $insertar_Admin);

if(!$resultado_Admin) {
    echo '<script>
    alert("El Administrador no ha sido registrado.");
    window.history.back(-2);
    <script>';
}else {
  echo '<script>
  alert("El Administrador ha sido registrado.");
  window.history.back(-2);
  <script>';
  header("location: mostrar_datos_administrador.php");
}
}


exit;
?>

