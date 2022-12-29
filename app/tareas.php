<?php
session_start();
if ($_SESSION['rol']!=3){
  header('Location:../login.php');
}
      require_once ('../bd/conexion.php');
      require_once ("../inc/menu_estudiante.php");
      require_once ("../inc/session.php");
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tareas</title>
   <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
     <script src="../js/jquery-3.4.1.js"></script>
  </head>
  <body class="fondo_sistema">
      <div class="back_form">
      <abbr title="Volver"><a href="home_estudiante.php"><img src="../assets/icons/paraatras.svg" alt=""> </a></abbr>
      </div>
      <h2>Tareas</h2> 
        <?php
            $sql = "SELECT * FROM comentarios";
            $resultado = mysqli_query($conexion, $sql);

            while($comentario = mysqli_fetch_array($resultado)){
            ?>
            <p>Profesor <?php echo($comentario['profesor']); ?> (<?php echo ($comentario['fecha']); ?>) Publico:

            <?php echo ($comentario['comentario']);?>
            <?php 
            }
            ?>
            </p>
       </form>
       </div>
  </body>
</html>