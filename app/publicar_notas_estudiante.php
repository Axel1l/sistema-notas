<?php
     session_start();
if ($_SESSION['rol']!=2){
  header('Location:../login.php');
}
require_once ("../inc/session.php");
require_once ('../bd/conexion.php');
require_once ('../inc/menu_profesor.php')
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Publicar Notas</title>
    <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body class="fondo_sistema">
    <form class="form_registro" action="agregar_notas.php" method="post">
        <div class="text_form">
            <div class="title_form">
                <h2>Publicar Notas</h2>
                <?php
                $id = $_GET["id"];
                $consulta = "SELECT * FROM alumnos WHere idAlumno ='$id'";
                $resultado = mysqli_query($conexion, $consulta);
                $fila=mysqli_fetch_array($resultado);

                echo "Estudiante: ".$fila['nomAlumno']." ".$fila['apeAlumno'];
                $_SESSION['nomestudiante'] = $fila['nomAlumno'];
?>
            </div>
             <div class="btn_Regresar">
                <a href="calificar_estudiante.php"><img src="../assets/icons/paraatras.svg" title="Volver Atras"></a>
            </div>
        </div>

        <?php
            $id = $_GET["id"];
            $_SESSION['IDAlumno'] = $id;
            $consulta = "SELECT * FROM calificaciones AS C INNER JOIN materias AS M ON C.id_Alumno='$id' AND C.id_Materia = M.idMateria";
            // $consulta = "SELECT * FROM alumnos WHere idAlumno ='$id'";
            $resultado = mysqli_query($conexion, $consulta);
            $fila=mysqli_fetch_array($resultado);
        ?>

        <div class="control_form">
            <label class="registro_input label_form" for="materia">Materia:</label>
            <select required class="registro_input input_form" name="materia">
                <option value="0">Seleccione:</option>
                <?php
                // $curso = $_SESSION['IDcurso'];
                // Realizamos la consulta para extraer los datos
                $sql = "SELECT * FROM materias";
                $resultado = mysqli_query($conexion, $sql);
                While($valores = mysqli_fetch_array($resultado)) {
                $idMateria=$valores['idMateria'];
                $nombreMateria=$valores['nomMateria'];
                // $_SESSION['IDmateria'] = $valores['idMateria'];
                ?>
                <option value="<?php echo $idMateria ?>"><?php echo $nombreMateria ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
            
        <div class="control_form">
            <label class="registro_input label_form" for="nota1">Ago-Oct </label>
            <input class="registro_input input_form" type="number" name="nota1" required 
                title="Aquí solo se permite introducir números" placeholder="00" required pattern="[0-9]+{2}" title="Aquí solo se permite introducir números">
        </div>

        <div class="control_form">
            <label class="registro_input label_form" for="nota2">Nov-Ene </label>
            <input class="registro_input input_form" type="number" name="nota2" required
                title="Aquí solo se permite introducir números" placeholder="00" required pattern="[0-9]+{2}" title="Aquí solo se permite introducir números">
        </div>

        <div class="control_form">
            <label class="registro_input label_form" for="nota3">Feb-Mar </label>
            <input class="registro_input input_form" type="number" name="nota3" required
                title="Aquí solo se permite introducir números" placeholder="00" required pattern="[0-9]+{2}" title="Aquí solo se permite introducir números">
        </div>

        <div class="control_form">
            <label class="registro_input label_form" for="nota4">Abr-Jun </label>
            <input class="registro_input input_form" type="number" name="nota4" required
                title="Aquí solo se permite introducir números" placeholder="00" required pattern="[0-9]+{2}" title="Aquí solo se permite introducir números">
        </div>

        <div class="btn_form">
            <input class="buton_tabla" id="Publicar" type="submit" value="Publicar">
        </div>
    </form>
</body>

</html>
