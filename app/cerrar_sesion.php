<?php

if(isset($_GET['cerrar'])) {

  //Vaciamos y destruimos las variables de sesión
  session_start();

session_unset();

session_destroy();

  //Redireccionamos a la pagina login.php
  header("Location: ../login.php");

}

?>