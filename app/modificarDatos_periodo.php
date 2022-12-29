<?php 
  session_start();
  if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');


$id=$_GET['id'];

$sql="SELECT * FROM periodo WHERE idperiodo='$id'";
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
                    <form action="proceso_actualizar_periodo.php" method="POST">
                    <h2>Actualizar Datos del periodo</h2>
                    
                    <div class="back_form">
          <a href="mostrar_datos_periodo.php"><img src="../assets/icons/x.svg" alt=""></a>
        </div>
                    
                                <input type="hidden" name="id" value="<?php echo $row['idperiodo']  ?>">
                                
                                <label class="registro_input label_form" for="periodo">periodo:</label>
                                <input type="text" class="form-control mb-3" name="periodo" placeholder="periodo" value="<?php echo $row['periodo']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>