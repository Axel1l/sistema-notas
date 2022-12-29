<?php
session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$id = $_SESSION['IDAlumno'];
$idMateria = $_POST["materia"];

$verificar_materia = mysqli_query($conexion, "SELECT * FROM calificaciones WHERE id_Alumno = '$id' AND id_Materia = '$idMateria'");

if(mysqli_num_rows($verificar_materia) > 0) {
  // Mostrar un mensaje de error y redirigir al usuario a otra página
  echo '<script>
    alert("la materia ya existe. Digite Otra");
    window.history.back(-1);
    </script>'; 
}else{
// $nommateria = $_POST["nomMateria"];
$califP = min(max($_POST["nota1"], 0), 100);
$califS = min(max($_POST["nota2"], 0), 100);
$califT = min(max($_POST["nota3"], 0), 100);
$califC = min(max($_POST["nota4"], 0), 100);
$califF = round(($califP + $califS + $califT + $califC)/4);

if ($califP > 0 && $califP < 100 && $califS > 0 && $califS < 100 && $califT > 0 && $califT < 100 && $califC > 0 && $califC < 100 && $califF > 0 && $califF < 100 ) {
  // Actualizar la base de datos
$insertar = "INSERT INTO calificaciones (idCalificaciones,calificacionP,calificacionS,calificacionT,calificacionC,notaFinal,id_Alumno,id_Materia)VALUES(NULL,'$califP','$califS','$califT','$califC','$califF','$id','$idMateria')";

$resultado = mysqli_query($conexion, $insertar);

if(!$resultado) {
    echo '<script>
    alert("error al Publicar la nota .");
    window.history.go(-2);
    </script>';
    
    exit;
} else {
    echo '<script>
    alert("la nota se a publicado correctamente");
    window.history.go(-2);
    </script>';
    exit;
}

} else {
  echo '<script>
    alert("Error: las calificaciones deben ser valores entre 0 y 100.");
    window.history.go(-1);
    </script>';
  exit;
}

}

?>
