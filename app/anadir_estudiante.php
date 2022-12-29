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
$rol = $_POST["rol"];
// tutor
$nom_tutor = $_POST["nombret"];
$ape_tutor = $_POST["apellidot"];
$relacion = $_POST["relacion"];
$celular_tutor = $_POST["cedulat"];
$direct_tutor = $_POST["direcciont"];
$tel_tutor = $_POST["telefonot"];
// estudiante
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
// $edad = $_POST["edad"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$fecha = $_POST["fecha"];
$curso = $_POST["curso"];



$insertar_Usuario = "INSERT INTO usuario
(idUser,usuario,clave,id_Rol)VALUES('','$usuario','$clave','$rol')";
$insertar_tutores = "INSERT INTO tutores
(nomTutor,apeTutor,relacion,cedula,direccion,telTutor)VALUES('$nom_tutor','$ape_tutor','$relacion','$celular_tutor','$direct_tutor','$tel_tutor')";



$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario'");

if(mysqli_num_rows($verificar_usuario) > 0) {
  echo '<script>
        alert("El Estudiante ya esta registrado.");
        window.history.back();
        </script>';

        exit;
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE clave='$clave'");

if(mysqli_num_rows($verificar_correo) > 0) {
    echo '<script>
    alert("la clave no cumple con los requisitos.");
    window.history.back();
    <script>';

    exit;
}

$resultado_usuario = mysqli_query($conexion, $insertar_Usuario);
$resultado_tutores = mysqli_query($conexion, $insertar_tutores);

if(!$resultado_usuario){
  echo '<script>
    alert("error al registrarse .");
    window.history.back();
    <script>';
}else if(!$resultado_tutores) {
    echo '<script>
    alert("error al registrarse .");
    window.history.back();
    <script>';
} else {

  $verificar_usuario = "SELECT * FROM usuario WHERE usuario='$usuario' and clave='$clave' ";
  $resultado_usuario = mysqli_query($conexion, $verificar_usuario);
  $fila_usuario=mysqli_fetch_assoc($resultado_usuario);
  $idusu = $fila_usuario['idUser'];


  $verificar_tutores = "SELECT * FROM tutores WHERE nomTutor='$nom_tutor' and apeTutor='$ape_tutor' ";
  $resultado_tutores = mysqli_query($conexion, $verificar_tutores);
  $fila_tutores=mysqli_fetch_assoc($resultado_tutores);
  $idtutor = $fila_tutores['idTutor'];

$insertar_estudiante = "INSERT INTO alumnos (nomAlumno,apeAlumno,edad,direccion,telAlumno,correoAlumno,nacFecha,id_Tutores,id_Curso,id_User)VALUES('$nombre','$apellido','','$direccion','$telefono','$correo','$fecha','$idtutor','$curso','$idusu')";
$resultado_estudiante = mysqli_query($conexion, $insertar_estudiante);

if(!$resultado_estudiante) {
    echo '<script>
    alert("El Estudiante no ha sido registrado.");
    window.history.back(-2);
    <script>';
}else {
  echo '<script>
  alert("El Estudiante ha sido registrado.");
  window.history.back(-2);
  <script>';
  header("location: mostrar_curso_del_Adm.php");
}
}


exit;
?>













