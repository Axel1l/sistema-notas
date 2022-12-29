<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');


$periodo = $_POST["periodo"];

$insertar = "INSERT INTO periodo
(idperiodo,periodo)VALUES('','$periodo')";


$verificar_periodo = mysqli_query($conexion, "SELECT * FROM periodo WHERE periodo='$periodo'");

if(mysqli_num_rows($verificar_periodo) > 0) {
  echo "<script>
  alert('el periodo ya esta registrado.');
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
    alert("el periodo escolar ha sido registrado.");
    window.history.back(-1);
    </script>';
  
}


exit;


?>