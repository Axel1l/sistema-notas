<?php
session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
  include ("../inc/menu_profesor.php");
  include('../bd/conexion.php');
  require_once ("../inc/session.php");
  $IDprof = $_SESSION['IDProfesor']
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
  </head>
  <body class="fondo_sistema">
    <div class="content_sistema_P">
  <div class="form_perfiles">
    
    <div class="btn_Regresar">
      <abbr title="Volver"><a href="home_profesor.php"><img src="../assets/icons/paraatras.svg" alt="volver"></a></abbr>
    </div>

    <div class="linea">
    <img src="../assets/img/descarga.png" alt="Imagen de Profesor">
    </div>

    <div class="form_perfil">
       <?php
        $sql = "SELECT * FROM profesor WHERE idProfesor ='$IDprof'";
          $resultado = mysqli_query($conexion, $sql);

          if ($mostrar = mysqli_fetch_assoc($resultado))
          {
            ?>
          <h1 class="title_perfil parrafo">Datos Personales</h1>
          <p class="parrafo">Nombre:</p>
          <p class="parrafo"><?php echo $mostrar['nomProfesor'] ?> <?php echo $mostrar['apeProfesor'] ?></p>
          <p class="parrafo">Cedula:</p>
          <p class="parrafo"><?php echo $mostrar['cedula'] ?></p>
          <p class="parrafo">Correo:</p>
          <p class="parrafo"><?php echo $mostrar['correoProfesor'] ?></p>
          <p class="parrafo">Teléfono:</p>
          <p class="parrafo"><?php echo $mostrar['telProfesor'] ?></p>
          <p class="parrafo">Dirección:</p>
          <p class="parrafo"><?php echo $mostrar['direccion'] ?></p>
          <p class="parrafo">Estado:</p>
          <p class="parrafo"><?php echo $mostrar['estado'] ?></p>
           <?php
        }
        ?>
        </div>
    </div>
    </div>
  </body>
</html>
