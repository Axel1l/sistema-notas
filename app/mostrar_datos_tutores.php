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
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Lista de Tutores</title>
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
                <a href="home_administrador.php"><img src="../assets/icons/paraatras.svg" title="Volver Atras"
                        alt="volver"></a>
            </div>

                <div class="cont_tablas">

                    <div class="cont_buton">
                        <h1 class="titulo_tabla">Listado de Tutores</h1>
                        <!-- <p><a href="registrar_tutor.php"><input class="buton_tabla" type="submit" value="Añadir Tutor"/></a></p> -->
                    </div>

                    <div class="contenedor_ad">
                        <table class="tabla_sistem">
                            <tr>
                                <th class="campos_th">Nombre</th>
                                <th class="campos_th">Apellido</th>
                                <th class="campos_th">Cédula</th>
                                <th class="campos_th">Dirección</th>
                                <th class="campos_th">Teléfono</th>
                                <th class="campos_th">Operación</th>
                            </tr>

                            <?php
            $sql = "SELECT * FROM tutores";
            $resultado = mysqli_query($conexion, $sql);

            while($mostrar = mysqli_fetch_assoc($resultado)) {
          ?>

                            <tr>
                                <td class="campos_td"><?php echo $mostrar['nomTutor'] ?></td>
                                <td class="campos_td"><?php echo $mostrar['apeTutor'] ?></td>
                                <td class="campos_td"><?php echo $mostrar['cedula'] ?></td>
                                <td class="campos_td"><?php echo $mostrar['direccion'] ?></td>
                                <td class="campos_td"><?php echo $mostrar['telTutor'] ?></td>
                                <td class="campos_td">
                                    <div class="opcion_icon">
                                        <a class="opcion_tablas"
                                            href="modificarDatos_tutor.php?id=<?php echo $mostrar['idTutor'];?>"><img
                                                src="../assets/icons/edit.svg" alt="Editar"></a> |
                                        <a class="opcion_tablas"
                                            href="Eliminar_datos_tutor.php?id=<?php echo $mostrar['idTutor'] ?>"
                                            class="textoEliminar"><img src="../assets/icons/trash.svg"
                                                alt="Eliminar"></a>
                                    </div>
                                </td>
                            </tr>

                            <?php
    }
          ?>
                        </table>
                        <div>

                        </div>
                    </div>

</body>

</html>