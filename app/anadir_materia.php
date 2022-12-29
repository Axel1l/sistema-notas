
<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');


$materia = $_POST["materia"];

$insertar = "INSERT INTO materias
(idMateria,nomMateria)VALUES('$id','$materia')";


$verificar_nombre = mysqli_query($conexion, "SELECT * FROM materias WHERE nomMateria='$materia'");

if(mysqli_num_rows($verificar_nombre) > 0) {
  echo "<script>
  alert('la materia ya esta registrado.');
  window.history.go(-1);</script>";

    exit;
}

$resultado = mysqli_query($conexion, $insertar);

if(!$resultado) {
  "<script>
  alert('error al guardar.');
  window.history.go(-1);</script>";
} else {
    echo '<script>
    alert("La materia ha sido registrada.");
    window.history.back(-1);
    </script>';
  
}


exit;


?>



