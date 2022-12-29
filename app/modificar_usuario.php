

<?php 
  session_start();
  if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');


$id = $_GET["id"];

$sql = "SELECT * FROM usuario WHERE idUser='$id'";
$query=mysqli_query($conexion,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="procesar_actualizar_usuario.php" method="POST">
                    <h2>Actualizar Datos de la Materia</h2>
                    <div class="back_form">
          <a href="mostrar_usuario.php"><img src="../assets/icons/x.svg" alt=""></a>
        </div>
                    
                                <input type="hidden" name="id" value="<?php echo $row['idUser'] ?>">
                                
                                <label class="" for="materia">Materia:</label>
                                <input type="text" class="form-control mb-3" name="usuario"  value="<?php echo $row['usuario'] ?>">
                                <label class="" for="materia">Clave:</label>
                                <input type="text" class="form-control mb-3" name="clave" value="<?php echo $row['clave'] ?>">
                                
                                <!-- Select del Rol -->
        <div class="control_form">
          <label class="registro_input label_form" for="rol">Rol:</label>
          <select class="form-control mb-2" name="roles" class="registro_input input_form">
            <option value="0">Seleccione:</option>
            <?php
            $curso = $_SESSION['IDcurso'];

            // Realizamos la consulta para extraer los datos
            $sql = "SELECT * FROM roles";
            $resultado = mysqli_query($conexion, $sql);
            While($valores = mysqli_fetch_array($resultado)) {
            $idRol=$valores['idRol'];
            $nombreRol=$valores['nomRol'];
            ?>
            <option value="<?php echo $idRol ?>"><?php echo $nombreRol ?></option>
            <?php
              }
            ?>
          </select>
        </div>


                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>