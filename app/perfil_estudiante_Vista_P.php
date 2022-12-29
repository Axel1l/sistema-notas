<?php
session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
    include('../bd/conexion.php');
    include ("../inc/menu_administrador.php");
    require_once ("../inc/session.php");

     $id = $_GET["id"];
     $consulta = "SELECT * FROM alumnos WHERE idAlumno = '$id' ";
     $resultado = mysqli_query($conexion, $consulta);
     $fila=mysqli_fetch_array($resultado);
     $_SESSION['ID_Tutor'] = $fila['id_Tutores'];
     $_SESSION['ID_curso'] = $fila['id_Curso'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="../styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
</head>

<body class="fondo_sistema">
    <div class="content_sistema_P">
        <div class="form_perfiles">

            <div class="btn_Regresar">
                <a href="mostrar_curso_del_profesor.php"><img src="../assets/icons/paraatras.svg"
                        title="Volver Atras"></a>
            </div>

            <div>
                <img class="img_perfil" src="../assets/img/estudian.png" alt="Imagen de Estudiante">
            </div>

            <div class="form_perfile ">
                <div class="form_perfile">
                    <?php 
       $id = $_GET["id"];
        $sql = "SELECT * FROM alumnos WHERE idAlumno = '$id' ";
          $resultado = mysqli_query($conexion, $sql);


          if ($mostrar = mysqli_fetch_assoc($resultado))
          {
            ?>
                    <h1 class="title_perfil parrafo">Datos Personales</h1>
                    <p class="parrafo">Nombre:</p>
                    <p class="parrafo"><?php echo $mostrar['nomAlumno'] ?> <?php echo $mostrar['apeAlumno'] ?></p>
                    <p class="parrafo">Fecha de Nacimiento:</p>
                    <p class="parrafo"><?php echo $mostrar['nacFecha'] ?></p>
                    <p class="parrafo">Correo:</p>
                    <p class="parrafo"><?php echo $mostrar['correoAlumno'] ?></p>
                    <?php
        }
        ?>
                </div>

                <div class="form_perfile">
                    <?php
         $idcurso = $_SESSION['ID_curso'];
        $sql = "SELECT * FROM cursos WHERE idCurso  = '$idcurso'";
          $resultado = mysqli_query($conexion, $sql);

          if ($mostrar = mysqli_fetch_assoc($resultado))
          {
            ?>
                    <h1 class="title_perfil parrafo">curso:</h1>
                    <p class="parrafo"><?php echo $mostrar['nomCurso'] ?></p>
                    <?php
        }
        ?>
                </div>

                <div class="form_perfile">
                    <?php
        $idTutor = $_SESSION['ID_Tutor'];
        $sql = "SELECT * FROM tutores WHERE idTutor  = '$idTutor'";
          $resultado = mysqli_query($conexion, $sql);

          if ($mostrar = mysqli_fetch_assoc($resultado))
          {
            ?>
                    <h1 class="title_perfil parrafo">Tutores:</h1>
                    <p class="parrafo">Nombre:</p>
                    <p class="parrafo"><?php echo $mostrar['nomTutor'] ?> <?php echo $mostrar['apeTutor'] ?></p>
                    <p class="parrafo">parentesco Familiar:</p>
                    <p class="parrafo"><?php echo $mostrar['relacion'] ?></p>
                    <p class="parrafo">Telefono:</p>
                    <p class="parrafo"><?php echo $mostrar['telTutor'] ?></p>
                    <?php
        }
        ?>
                </div>

            </div>
        </div>
    </div>
    </div>

</body>

</html>