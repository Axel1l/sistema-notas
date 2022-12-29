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
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Calificaciones</title>
    <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
</head>

<body class="fondo_sistema">

    <div class="content_sistema">
        <div class="form_perfiles">

            <div class="btn_Regresar">
                <a href="calificar_estudiante.php"><img src="../assets/icons/paraatras.svg" title="Volver Atras"></a>
            </div>

            <div class="cont_tablas_notas">

                <div class="text_nota">
                    <p class="">Estudiante:</p>
                    <p class="text_nom"><?php
    $id = $_GET["id"];
        $consulta = "SELECT * FROM alumnos WHere idAlumno ='$id'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila=mysqli_fetch_array($resultado);
        
       echo $fila['nomAlumno']." ".$fila['apeAlumno'];   
    ?></p>
                </div>


                <div class="cont_buton">
                    <h1 class="titulo_tabla">Calificaciones</h1>

                </div>
                <div class="contenedor_tabla">
                <table class="tabla_sistem">
                    <thead class="">
                        <tr>
                            <th class="tit_thead" rowspan="3" scope="col">ASIGNATURAS</th>
                            <th class="tit_thead" colspan="7" scope="col">CALIFICACIONES DEL AÑO ESCOLAR</th>
                        </tr>
                        <tr>
                            <th class="tit_thead" colspan="7">CALIFICACIONES PARCIALES</th>
                        </tr>
                        <tr>
                            <th class="tit_thead" scope="col">AGO-OCT</th>
                            <th class="tit_thead" scope="col">NOV-ENE</th>
                            <th class="tit_thead" scope="col">FEB-MAR</th>
                            <th class="tit_thead" scope="col">ABR-JUN</th>
                            <th class="tit_thead" scope="col">C.F.</th>
                            <th class="tit_thead" scope="col">A/R</th>
                            <th class="tit_thead" scope="col">Editar</th>
                        </tr>
                    </thead>

                    <?php
         $id = $_GET["id"];
         $_SESSION['ID_Alumno'] = $id;

          $sql = "SELECT * FROM calificaciones AS c INNER JOIN materias AS m ON c.id_Materia = m.idMateria AND id_Alumno = '$id' ";

          $resultado = mysqli_query($conexion, $sql);

          while ($mostrar = mysqli_fetch_assoc($resultado))
          {
          // $nf  = ($mostrar['calificacionP']+$mostrar['calificacionS']+$mostrar['calificacionT']+$mostrar['calificacionC'])/4;
            ?>
                    <tbody>
                        <tr>
                            <th class="tit_thead" scope="row"><?php echo $mostrar['nomMateria'] ?></th>
                            <td class="campos_td"><?php echo $mostrar['calificacionP'] ?></td>
                            <td class="campos_td"><?php echo $mostrar['calificacionS'] ?></td>
                            <td class="campos_td"><?php echo $mostrar['calificacionT'] ?></td>
                            <td class="campos_td"><?php echo $mostrar['calificacionC'] ?></td>
                            <td class="campos_td"><?php echo $mostrar['notaFinal'] ?></td>
                              
                            <!-- <td class="campos_td"><?php echo floor($nf) ?></td> -->
                            <td class="campos_td" class="color"><?php
                             $nf = $mostrar['notaFinal'];
                            if($nf>=70 && $nf<=100){
              echo "<font color=\"gree\">APROBADO</font>";
              }else{
              echo "<font color=\"red\">REPROBADO</font>";
              } ?></td>
                            <td class="campos_td">
                                <div class="">
                                    <a class="opcion_tablas" href="modificarNotas_estudiantes.php?id=<?php echo $mostrar['idCalificaciones'] ?>"><img
                                            title="Editar Notas" src="../assets/icons/edit.svg" alt="modificar nota"></a> | <a class="opcion_tablas" href="eliminar_notas.php?id=<?php echo $mostrar['idCalificaciones'] ?>"><img
                                            title="eliminar Notas" src="../assets/icons/trash.svg" alt="eliminar nota"></a>
                                </div>
                            </td>
                        </tr>
                        <?php
        }
        ?>
                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>

</body>

</html>