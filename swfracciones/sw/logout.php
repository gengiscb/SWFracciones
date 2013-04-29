<?php
    include_once '../config.inc.php';
    include_once 'Sesion.php';   
    $sesion = new Sesion();
    $sesion->cerrarSesion();
?>