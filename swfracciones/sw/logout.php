<?php
    include_once '../config.inc.php';
    session_start();   
    $_SESSION['login']=false;
    session_destroy();
    header("Location: ".$GLOBALS['raiz_sitio']);
?>