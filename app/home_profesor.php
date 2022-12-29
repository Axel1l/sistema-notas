<?php
session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
include ("../inc/menu_profesor.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$usuario = $_SESSION['user'];
$clave = $_SESSION['pass'];

$consulta = "SELECT P.idProfesor , P.nomProfesor, P.apeProfesor, P.id_User, P.id_Curso, U.idUser, U.usuario, U.clave FROM profesor as P INNER JOIN usuario as U ON usuario='$usuario' and clave='$clave' AND P.id_User = U.idUser ";
$resultado = mysqli_query($conexion, $consulta);
$fila=mysqli_fetch_array($resultado);

  $_SESSION['IDProfesor'] = $fila['idProfesor'];
  $_SESSION['Nom_Profesor'] = $fila['nomProfesor'];
  $_SESSION['AP_Profesor'] = $fila['apeProfesor'];
  $_SESSION['IDcurso'] = $fila['id_Curso'];

// $ID_Estudiante = $_SESSION['IDProfesor'];
// $NOM_Estudiante = $_SESSION['Nom_Profesor'];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

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

<body class="">

    <div class="content_sistema_P">
        <div class="cont_home ">
            <div class="cont_info_p">
                <div class="img_home_p">
                    <img src="../assets/img/descarga.png" alt="Imagen de Profesor">
                </div>

                <?php
         $sql = "SELECT * FROM profesor WHERE idProfesor ='$IDprof'";
          $resultado = mysqli_query($conexion, $sql);

          if ($mostrar = mysqli_fetch_assoc($resultado))
          {
            ?>
                <div class="info_perfil">
                    <h3>Datos Personales</h3>
                    <p> Nombre: <?php echo $mostrar['nomProfesor'] ?> <?php echo $mostrar['apeProfesor'] ?></p>
                    <p>Correo: <?php echo $mostrar['correoProfesor'] ?></p>
                    <p>Teléfono: <?php echo $mostrar['telProfesor'] ?></p>
                </div>
                <?php
        }
        ?>
                <div class="btn_perfil_P">
                    <a class="" href="Perfil_profesor.php?id=<?php echo $_SESSION['IDProfesor'];?>"><img
                            src="../assets/icons/edit.svg" alt="Ver" title="Ver Perfil"></a>
                </div>
            </div>
            <div class="info_impotante_menu_p">
                <h2>Acceso Rápido</h2>
                <div class="caja_principal">
                    <div class="caja_info">
                        <div>
                            <img class="img_grupo_P" src="../assets/icons/group.svg" title="Grupo" alt="Grupo">
                        </div>

                        <div>
                            <h3>Administrar Cursos</h3>
                            <p>
                                Ver Curso | Administrar Estudiantes
                            </p>
                        </div>
                    </div>
                    <div class="caja_btn_ir">
                        <a class="imgbuton_ir" href="mostrar_curso_del_profesor.php"><span class="nombtn">Ir <img
                                    src="../assets/icons/arrow-right-circle.svg" title="IR A ADMNISTRAR CURSO"
                                    alt="ver"></span></a>
                    </div>
                </div>

                <div class="caja_principal">
                    <div class="caja_info">
                        <div>
                            <img class="img_grupo_P" src="../assets/icons/exam.svg" title="Grupo" alt="Grupo">
                        </div>

                        <div>
                            <h3>Gestionar Notas</h3>
                            <p>
                                Ver Notas | Publicar Notas
                            </p>
                        </div>
                    </div>
                    <div class="caja_btn_ir">
                        <a class="imgbuton_ir" href="../app/calificar_estudiante.php"><span class="nombtn">Ir <img
                                    src="../assets/icons/arrow-right-circle.svg" title="IR A ADMNISTRAR CURSO"
                                    alt="ver"></span></a>
                    </div>
                </div>


            </div>
        </div>
    </div>

</body>

</html>
