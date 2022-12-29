<?php
session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
  require_once ('../bd/conexion.php');
  require_once ("../inc/menu_profesor.php");
  require_once ("../inc/session.php");
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="iso-8859-1">
    <title>Tareas</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
  </head>
  <body class="fondo_sistema">

  <div class="form_registro">
    <div class="back_form">
      <div class="text_form">
        <div class="title_form">
          <h2>TAREAS</h2>
        </div>
        <div class="back_form">
      <abbr title="Volver"><a href="home_profesor.php"><img src="../assets/icons/paraatras.svg" alt=""> </a><abbr>
        </div>
      </div>
    <form action="publicar_tarea_p.php" method="POST" >
    <div class="tareas">
      <label for="profesor">Profesor: </label>
      <input class="" type="text" id="profesor" name="profesor" required pattern="[A-Za-zñíóúéá  ]{2,40}" title="Aquí solo se permite introducir letras"  placeholder="Nombre">
    </div>
  
    <div class="tareas">
      <label for="com">Comentario:</label>
      <textarea id="comentario" rows="8" cols="50" name="comentario"></textarea>
    </div>

    <div class="btn_form">
        <input class="buton_tabla" type="submit" value="Publicar">
      </div>

    <?php
      $sql = "SELECT * FROM comentarios";
      $resultado = mysqli_query($conexion, $sql);

      while($comentario = mysqli_fetch_array($resultado)){
    ?>
    
    <p>Profesor <?php echo($comentario['profesor']);?> (<?php echo ($comentario['fecha']); ?>) Publico: <?php echo ($comentario['comentario']);?>
    <a class="opcion_tablas" href="eliminar_tarea.php?id=<?php echo $row['idComentario'];?>"><img src="../assets/icons/trash.svg" alt="Eliminar"></a>
    
    <?php 
      }
    ?>
    </p>
    </form>
  </div>
  </body>
</html>