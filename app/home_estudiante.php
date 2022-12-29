<?php
session_start();
if ($_SESSION['rol']!=3){
  header('Location:../login.php');
}

      require_once ('../bd/conexion.php');
      require_once ("../inc/menu_estudiante.php");
      require_once ("../inc/session.php");


      $usuario = $_SESSION['user'];
      $clave = $_SESSION['pass'];

$consulta = "SELECT A.idAlumno, A.nomAlumno, A.apeAlumno, A.id_User, A.id_Curso, A.id_Tutores, U.idUser, U.usuario, U.clave FROM alumnos as A INNER JOIN usuario as U ON usuario='$usuario' and clave='$clave' AND A.id_User = U.idUser ";
$resultado = mysqli_query($conexion, $consulta);
$fila=mysqli_fetch_array($resultado);



        $_SESSION['IDAlumno'] = $fila['idAlumno'];
        $_SESSION['Nom_Alumno'] = $fila['nomAlumno'];
        $_SESSION['AP_alumno'] = $fila['apeAlumno'];
        $_SESSION['IDcurso'] = $fila['id_Curso'];
        $_SESSION['ID_Tutor'] = $fila['id_Tutores'];

      $ID_Estudiante = $_SESSION['IDAlumno'];
      $NOM_Estudiante = $_SESSION['Nom_Alumno'];
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Inicio</title>
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
        <div class="cont_home form_registro_2">
            <div class="cont_info_p">
                <div class="img_perfil">
                    <img src="../assets/img/estudian.png" alt="Imagen de Profesor">
                </div>

                <?php
                $ID_Estudiante = $_SESSION['IDAlumno'];
         $sql = "SELECT * FROM alumnos WHERE idAlumno ='$ID_Estudiante'";
          $resultado = mysqli_query($conexion, $sql);

          if ($mostrar = mysqli_fetch_assoc($resultado))
          {
            ?>
                <div class="info_perfil">
                    <h3>Datos Personales</h3>
                    <p> Nombre: <?php echo $mostrar['nomAlumno'] ?> <?php echo $mostrar['apeAlumno'] ?></p>
                    <p>Correo: <?php echo $mostrar['correoAlumno'] ?></p>
                    <p>Teléfono: <?php echo $mostrar['telAlumno'] ?></p>
                </div>
                <?php
        }
        ?>
                <div class="btn_perfil_P">
                    <a class="" href="Perfil_estudiante.php?id=<?php echo $ID_Estudiante ?>"><img
                            src="../assets/icons/edit.svg" alt="Ver" title="ver Perfil"></a>
                </div>
            </div>
            <div class="info_impotante_menu_p">
                <h2>Acceso Rapido</h2>
                <!-- <div class="caja_principal">
                    <div class="caja_info">
                        <div>
                            <img class="img_grupo_P" src="../assets/icons/group.svg" title="Grupo" alt="Grupo">
                        </div>

                        <div>
                            <h3>ver Curso</h3>
                            <p>
                                Ver curso | Administrar estudiantes
                            </p>
                        </div>
                    </div>
                    <div class="caja_btn_ir">
                        <a class="imgbuton_ir" href="mostrar_curso_del_profesor.php"><span class="nombtn">Ir <img
                                    src="../assets/icons/arrow-right-circle.svg" title="IR A ADMNISTRAR CURSO"
                                    alt="ver"></span></a>
                    </div>
                </div> -->

                <div class="caja_principal">
                    <div class="caja_info">
                        <div>
                            <img class="img_grupo_P" src="../assets/icons/group.svg" title="Grupo" alt="Grupo">
                        </div>

                        <div>
                            <h3>Ver Notas</h3>
                            <p>
                                Ver Notas
                            </p>
                        </div>
                    </div>
                    <div class="caja_btn_ir">
                        <a class="imgbuton_ir" href="notas_estudiante.php"><span class="nombtn">Ir <img
                                    src="../assets/icons/arrow-right-circle.svg" title="IR A ADMNISTRAR CURSO"
                                    alt="ver"></span></a>
                    </div>
                </div>


            </div>
        </div>
    </div>

</body>

</html>