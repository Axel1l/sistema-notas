<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Escolar</title>
    <link rel="stylesheet" href="css/estilos.css" />
  </head>
  <body class= "caja_login" >
    <div class="box">
      <form action="app/verificar.php" method="POST" autocomplete="off" class="login login_form">
        <img class="logo" src="assets/icons/logo-prot.png" alt="Registro" />

        <h2>Inicio de Sesión</h2>
        <div class="input_Box">
          <input type="text" name="usuario" required="required" autofocus placeholder="Usuario"/>
          <!-- <span>Usuario</span> -->
          <i></i>
        </div>
        <div class="input_Box">
          <input type="password" name="clave" required="required" placeholder="Contraseña" />
          <!-- <span>Contraseña</span> -->
          <i></i>
        </div>
        <div class="links">
          <a href="index.html">Volver al Inicio</a>
        </div>
        <input class="enviar_login" type="submit" value="login" />
      </form>
    </div>
  </body>
</html>
