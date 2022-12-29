<?php
 
    $inactivo = 5000;
 
    if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo)
        {
            session_destroy();
            header("Location: ../"); 
        }
    }
 
    $_SESSION['tiempo'] = time();
?>