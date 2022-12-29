<?php
session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');

$usuario = $_SESSION['user'];
$clave = $_SESSION['pass'];

$consulta = "SELECT D.idAdministrador, D.nomAdmin, D.apeAdmin, D.id_User, U.idUser, U.usuario, U.clave FROM administrador as D INNER JOIN usuario as U ON usuario='$usuario' and clave='$clave' AND D.id_User = U.idUser ";
$resultado = mysqli_query($conexion, $consulta);
$fila=mysqli_fetch_array($resultado);

  $_SESSION['IDAdmin'] = $fila['idAdministrador'];
  $_SESSION['Nom_Admin'] = $fila['nomAdmin'];
  $_SESSION['AP_Admin'] = $fila['apeAdmin'];

// $ID_Estudiante = $_SESSION['IDAdmin'];
// $NOM_Estudiante = $_SESSION['Nom_Admin'];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
</head>

<body class="" >

    <div class="content_sistema_P">
        <div class="cont_home ">
            <div class="cont_info_p">
                <div class="img_home_p">
                    <img src="../assets/img/Admin.png" alt="Imagen de admin">
                </div>

                <?php
            $ID_ADM = $_SESSION['IDAdmin'];
         $sql = "SELECT * FROM administrador WHERE idAdministrador ='$ID_ADM'";
          $resultado = mysqli_query($conexion, $sql);

          if ($mostrar = mysqli_fetch_assoc($resultado))
          {
            ?>
                <div class="info_perfil">
                    <h3>Datos Personales</h3>
                    <p> Nombre: <?php echo $mostrar['nomAdmin'] ?> <?php echo $mostrar['apeAdmin'] ?></p>
                     <p>Rol: Administrador</p>
                </div>
                <?php
        }
        ?>
                <!-- <div class="btn_perfil_P">
                <a class="" href="?id=<?php echo $_SESSION['IDAdmin'];?>"><img
                        src="../assets/icons/edit.svg" alt="Ver" title="ver Perfil"></a>
            </div> -->
            </div>

            <div class="info_impotante_menu_p">
                <div>
                    <h2>Acceso Rápido</h2>
                </div>
                <div class="cajas_home">
                    <div class="caja_principal">
                        <div class="caja_info">
                            <div>
                                <img class="img_grupo_P" src="../assets/icons/group.svg" title="Alumno" alt="Alumno">
                            </div>

                            <!-- caja 1 -->
                            <div>
                                <h3>ver Estudiantes</h3>
                                <p>
                                    Administrar Estudiantes
                                </p>
                            </div>
                        </div>
                        <div class="caja_btn_ir">
                            <a class="imgbuton_ir" href="mostrar_curso_del_Adm.php"><span class="nombtn">Ir <img
                                        src="../assets/icons/arrow-right-circle.svg" title="IR A ADMNISTRAR Estudiantes"
                                        alt="ver"></span></a>
                        </div>
                    </div>

                    <!-- caja 2 -->
                    <div class="caja_principal">
                        <div class="caja_info">
                            <div>
                                <img class="img_grupo_P" src="../assets/img/profesor.png" title="Grupo" alt="Grupo">
                            </div>

                            <div>
                                <h3>Gestionar Profesores</h3>
                                <p>
                                    Ver Profesores | Añadir | Editar
                                </p>
                            </div>
                        </div>
                        <div class="caja_btn_ir">
                            <a class="imgbuton_ir" href="../app/mostrar_datos_profesor.php"><span class="nombtn">Ir <img
                                        src="../assets/icons/arrow-right-circle.svg" title="IR A ADMNISTRAR CURSO"
                                        alt="ver"></span></a>
                        </div>
                    </div>

                    <!-- caja 4 -->
                    <div class="caja_principal">
                        <div class="caja_info">
                            <div>
                                <img class="img_grupo_P" src="../assets/img/aula.png" title="Grupo" alt="Grupo">
                            </div>

                            <div>
                                <h3>Gestionar Cursos</h3>
                                <p>
                                    Ver cursos | Añadir | Editar
                                </p>
                            </div>
                        </div>
                        <div class="caja_btn_ir">
                            <a class="imgbuton_ir" href="../app/mostrar_datos_cursos.php"><span class="nombtn">Ir <img
                                        src="../assets/icons/arrow-right-circle.svg" title="IR A ADMNISTRAR CURSO"
                                        alt="ver"></span></a>
                        </div>
                    </div>

                    <!-- caja 5 -->
                    <div class="caja_principal">
                        <div class="caja_info">
                            <div>
                                <img class="img_grupo_P" src="../assets/img/libro.png" title="Grupo" alt="Grupo">
                            </div>

                            <div>
                                <h3>Gestionar materias</h3>
                                <p>
                                    Ver Materias | Añadir | Editar
                                </p>
                            </div>
                        </div>
                        <div class="caja_btn_ir">
                            <a class="imgbuton_ir" href="../app/mostrar_datos_materias.php"><span class="nombtn">Ir <img
                                        src="../assets/icons/arrow-right-circle.svg" title="IR A ADMNISTRAR CURSO"
                                        alt="ver"></span></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</body>

</html>
