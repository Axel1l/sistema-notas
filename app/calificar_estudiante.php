


<?php 
          session_start();
          if ($_SESSION['rol']!=2){
            header('Location:../login.php');
          }
          include ("../inc/menu_profesor.php");
          require_once ("../inc/session.php");
          require_once ('../bd/conexion.php');
          
          $curso = $_SESSION['IDcurso'];
          
          $consulta = "SELECT * FROM cursos WHERE idcurso ='$curso' ";
          $resultado = mysqli_query($conexion, $consulta);
          $fila=mysqli_fetch_array($resultado);
          
          $_SESSION['Curso'] = $fila['nomCurso'];
          $nomCurso = $_SESSION['Curso'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Listado de Calificaciones </title>
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
                            <h1>Gestionar Notas</h1>
                                <!-- <form action="anadir_materia.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="materia" placeholder="materia">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form> -->
                        </div>

                        <div class="col-md-8">
                            <table class="table table-striped mt-3" id="mitabla">
                                <thead class="table-success table-striped" >
                                    <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                        $sql = "SELECT * FROM alumnos WHERE id_Curso ='$curso' ";
                                        $resultado = mysqli_query($conexion, $sql);
                                            while($row=mysqli_fetch_assoc($resultado)){
                                        ?>
                                            <tr>
                                                <th ><?php echo $row['nomAlumno'] ?></th> 
                                                <th ><?php echo $row['apeAlumno'] ?></th> 
                                                <th><a href="mostrar_notas_estudiante_P.php?id=<?php echo $row['idAlumno'] ?>" class="btn btn-info">Ver</a></th>
                                                <th><a href="publicar_notas_estudiante.php?id=<?php echo $row['idAlumno'] ?>" class="btn btn-danger" >Publicar</a></th>                                        
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