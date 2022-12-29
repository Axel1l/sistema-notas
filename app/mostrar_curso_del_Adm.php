<?php
    session_start();
if ($_SESSION['rol']!=1){
  header('Location:../login.php');
}
include ("../inc/menu_administrador.php");
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Cursos</title>
    <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/jquery-3.4.1.js"></script>
</head>

<body class="fondo_sistema">

    <div class="content_sistema_P">
        <div class="form_perfiles">

            <div class="cont_grupos">

                <div class="btn_Regresar">
                    <a href="home_administrador.php"><img src="../assets/icons/paraatras.svg" title="Volver Atras"></a>
                </div>

                <div class="titulo_curso">

                    <div>
                        <h1 class="">Estudiantes</h1>
                    </div>
                    <div class="btn_cursoss">
                        <div clasd="">
                            <p><a href="mostrar_todos_los_estudiante_AD.php"><input class="buton_tabla" type="submit"
                                        value="Ver todos" title="Ver todos los Estudiante" /></a></p>
                        </div>

                        <div class="btnc">
                            <p><a href="registrar_estudiante.php"><input class="buton_tabla" type="submit"
                                        value="Agregar Estudiante" title="Agregar Estudiante" /></a></p>
                        </div>

                    </div>
                </div>

                <div class="cajas_home">
                    <?php

            $sql = "SELECT * FROM cursos";
            $resultado = mysqli_query($conexion, $sql);

            while($mostrar = mysqli_fetch_assoc($resultado)) {
          ?>


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
                                href="mostrar_estudiante_en_cursos_AD.php?id=<?php echo $mostrar['idCurso'];?>"><span
                                    class="nombtn">Ir <img src="../assets/icons/eye.svg" alt="Editar"></span></a>
                        </div>
                    </div>


                    <?php
                         }
                          ?>

                </div>
            </div>
        </div>
    </div>

</body>

</html>