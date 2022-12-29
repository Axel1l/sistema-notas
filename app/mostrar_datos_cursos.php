
<?php 
     session_start();
     if ($_SESSION['rol']!=1){
       header('Location:../login.php');
     }
     include ("../inc/menu_administrador.php");
     require_once ("../inc/session.php");
     require_once ('../bd/conexion.php');
     
    $sql="SELECT *  FROM cursos";    
    $query=mysqli_query($conexion,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Materias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>

    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                            <h3>curso</h3>
                                <form action="anadir_curso.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="curso" placeholder="curso">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table table-striped mt-3" id="mitabla">
                                <thead class="table-success table-striped" >
                                    <tr>
                                    <th>Cursos</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th ><?php echo $row['nomCurso'] ?></th> 
                                                <th><a href="modificarDatos_cursos.php?id=<?php echo $row['idCurso'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="Eliminar_datos_cursos.php?id=<?php echo $row['idCurso'] ?>" class="btn btn-danger" >Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
            <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> 
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#mitabla').DataTable( {
                        language: {
                            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
                        }
                    } );
                } );
            </script>
    </body>
</html>