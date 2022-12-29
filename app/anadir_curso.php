<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id = $_POST["id"];
$curso = $_POST["curso"];

$insertar = "INSERT INTO cursos
(idCurso,nomCurso)VALUES('$id','$curso')";

$verificar_curso = mysqli_query($conexion, "SELECT * FROM cursos WHERE nomCurso='$curso'");

if(mysqli_num_rows($verificar_curso) > 0) {
    echo '<script>
    alert("El Curso ya existe. Digite Otro");
    window.history.back(-1);
    </script>';

    exit;
}

$resultado = mysqli_query($conexion, $insertar);

if(!$resultado) {
    echo '<script>
    alert("error al registrar el Curso.");
    window.history.back(-1);
    </script>';
} else {
    echo '<script>
    alert("El Curso ha sido registrado Correctamente.");
    window.history.back(-1);
    </script>';
    header("location: mostrar_datos_cursos.php");
}

exit;
?>
