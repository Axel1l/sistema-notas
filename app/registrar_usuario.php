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
  <title>Registro de Administrador</title>
  <link rel="stylesheet" href="../styles.css">
        <script src="../js/jquery-3.4.1.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="../assets/icons/logo-prot.png">
    <script src="../js/jquery-3.4.1.js"></script>
</head>
<body class="fondo_sistema">

  <div class="form_registro">

    <div class="text_form">
      <div>
        <h2>REGISTRO DE USUARIOS</h2>
      </div>
      <div id="back_form">
        <a href="mostrar_usuarios.php"><img src="../assets/icons/arrow-out.svg" alt=""></a>
      </div>
    </div>

    <form action="anadir_usuario.php" method="post">

      <div  class="control_form">
        <label class="input_form" for="usuario">Usuario</label>
        <input class="input_form" type="text" name="usuario" required pattern="[A-Za-zñíóúéá0-9]{5,50}" title="No sobre salir del campo de caracteres '50'">
      </div>

      <div  class="control_form">
        <label class="input_form" for="clave">clave </label>
        <input class="input_form" type="password" name="clave"  required pattern="[A-Za-z0-9]{5,50}" title="No sobre salir del campo de caracteres '50'">
      </div>

      <!-- Select del Rol -->
<div class="control_form">
<p>Rol:
<select name='Rol'>
<option value="0" class="input_form">Seleccione:</option>
<?php
$ROL = $_SESSION['id_Rol'];
// Realizamos la consulta para extraer los datos
$sql = "SELECT * FROM roles";
$resultado = mysqli_query($conexion, $sql);
While($valores = mysqli_fetch_array($resultado)) {
$idRol=$valores['idRol'];
$nombreRol=$valores['nomRol'];
?>
<option value="<?php echo $idRol ?>"><?php echo $nombreRol ?></option>
<?php
}
?>
</select>
</p>
</div>

      <div id="btn_form">
        <input class="buton_tabla" id="btn_form" type="submit" value="Registrar">
      </div>

    </form>
  </div>
</body>
</html>
