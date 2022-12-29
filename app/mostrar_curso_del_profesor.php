<?php
    session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
include ("../inc/menu_profesor.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>SISTEMA ESCOLAR</title>
    <link rel="stylesheet" href="../styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/jquery-3.4.1.js"></script>
</head>

<body class="">

    <div class="content_sistema_g">
        <div class="form_registro">

            <div class="text_form">
                <div class="title_form">

                    <h1 class="">Curso</h1>

                </div>
                <div class="btn_Regresar">
                    <a href="home_profesor.php"><img src="../assets/icons/paraatras.svg" title="Volver Atras"></a>
                </div>
            </div>

            <div class="caja_grupo">

                <?php
          $curso_profe = $_SESSION['IDcurso'];
            $sql = "SELECT * FROM cursos WHERE idCurso ='$curso_profe' ";
            $resultado = mysqli_query($conexion, $sql);

            while($mostrar = mysqli_fetch_assoc($resultado)) {
          ?>
                <div class="">

                    <div class="caja_principal">
                        <div class="caja_info">
                            <div>
                                <img class="img_grupo_P" src="../assets/icons/group.svg" title="Grupo" alt="Grupo">
                            </div>

                            <div>
                                <h3 class=""><?php echo $mostrar['nomCurso'] ?></h3>
                                <p>
                                    Ver Estudiantes
                                </p>
                            </div>
                        </div>
                        <div class="caja_btn_ir">
                            <a class="imgbuton_ir"
                                href="mostrar_estudiante_en_cursos_P.php?id=<?php echo $mostrar['idCurso'];?>"><span
                                    class="nombtn">Ir <img src="../assets/icons/eye.svg" alt="Editar"></span></a>
                        </div>
                    </div>


                    <?php
          }
          ?>
                </div>
            </div>
        </div>

</body>

</html>