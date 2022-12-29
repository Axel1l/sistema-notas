<?php

    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    $conexion = mysqli_connect("localhost", "root", "", "sistema_de_administracion_escolar");

    if (!$conexion) {
        echo "error de conexion";
    }
?>
