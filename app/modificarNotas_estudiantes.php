<?php
     session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');
require_once ('../inc/menu_profesor.php')
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Actualizar Notas del Estudiante</title>
    <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <!-- <link rel="stylesheet" href="../css/estilos.css"> -->
  </head>
  <body class="fondo_sistema">
    <form action="procesar_actualizar_estudianteNota.php" method="POST">
    <h2 class="display-10">ACTUALIZAR NOTAS DEL ESTUDIANTE</h2>

      <?php
          $id = $_GET["id"];
          $sql = "SELECT C.*, M.* FROM calificaciones AS C INNER JOIN materias AS M ON C.idCalificaciones='$id' AND C.id_Materia = M.idMateria";
          $resultado = mysqli_query($conexion, $sql);

          While($mostrar = mysqli_fetch_assoc($resultado)) {
            // Recoger las calificaciones en un array
            $calificaciones = array(
              $mostrar['calificacionP'],
              $mostrar['calificacionS'],
              $mostrar['calificacionT'],
              $mostrar['calificacionC']
            );

            // Calcular el promedio de las calificaciones
            $promedio = array_sum($calificaciones) / count($calificaciones);
            $promedio = round($promedio);

     ?>
      <div >
        
        <input type="hidden" name="calificaciones" placeholder="calificaciones" value="<?php echo $mostrar['idCalificaciones'] ?>" required>
        <label for="" name="materia" class="form-control-plaintext"><?php echo $mostrar['nomMateria'] ?></label>
        <label for="califip" class="form-control-plaintext">Ago-Oct</label>
        <input type="number" class="form-control" name="califip" placeholder="calip" pattern="[0-9]|[1-9][0-9]|100" value="<?php echo $mostrar['calificacionP'] ?>" required>
        <label for="calis" class="form-control-plaintext">Nov-Ene</label>
        <input type="number" class="form-control" name="califis" placeholder="calis" pattern="[0-9]|[1-9][0-9]|100" value="<?php echo $mostrar['calificacionS'] ?>" required>
        <label for="calit" class="form-control-plaintext">Feb-Mar</label>
        <input type="number" class="form-control" name="califit" placeholder="calit"  pattern="[0-9]|[1-9][0-9]|100" value="<?php echo $mostrar['calificacionT'] ?>" required>
        <label for="calic" class="form-control-plaintext">Abr-Jun</label>
        <input type="number" class="form-control" name="calific" placeholder="calic"  pattern="[0-9]|[1-9][0-9]|100" value="<?php echo $mostrar['calificacionC'] ?>" required>
        <input type="hidden" name="promedio" placeholder="promedio" value="<?php echo $promedio ?>" required>
        
        <!-- Mostrar el promedio de las calificaciones -->
        <p class="form-control-plaintext">Promedio: <?php echo $promedio; ?></p>
        
      </div>
      <?php
    }
      ?>
      <div>
      <input type="submit" class="btn btn-primary" value="Actualizar"/>
        <p>Haga click para salir <a href="calificar_estudiante.php">Click aquí</a></p>
      </div>

  </form>
  </body>
</html>

