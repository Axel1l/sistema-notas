<?php
$alert = "";
session_start();
    if(!empty($_POST)) {
        if(empty($_POST['usuario']) || empty($_POST['clave'])) {
                $alert = 'Todos los campos son necesarios';
            } else {
                require_once ('../bd/conexion.php');


                $usuario = $_POST['usuario'];
                $clave = $_POST['clave'];
                $consulta = "SELECT*FROM usuario where usuario='$usuario' and clave='$clave'";
                $resultado = mysqli_query($conexion, $consulta);
                $fila=mysqli_fetch_array($resultado);


                    $_SESSION['idUser'] = $fila['idUser'];
                    $_SESSION['user'] = $fila['usuario'];
                    $_SESSION['pass'] = $fila['clave'];
                    $_SESSION['rol'] = $fila['id_Rol'];
                    $_SESSION['tiempo'];


        if ($_SESSION['rol'] == 1) {
            header('location: home_administrador.php');
        }else if($_SESSION['rol'] == 2) {
            header('location: home_profesor.php');
        } else if($_SESSION['rol'] == 3) {
            header('location: home_estudiante.php');
            }else{
              echo '<script>
                    alert("Contraseña o Usurio incorrectos.");
                    window.history.go(-1);
                    </script>';
            //  echo $alert;
            session_destroy();
            // header('location:../login.php');
        }
    }
}
?>
