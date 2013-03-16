<?php
include_once 'sw/ServicioAlumno.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
 include_once('ServicioLogin.php');

class ControladorLogin{


    function ObtenerUsuario() {
        if (isset($_GET["btn_sesion"]) && $_GET["btn_sesion"] == "Iniciar Sesi&oacute;n") {
           
		    $matricula = $_GET["matricula"];
            $contrasena = $_GET["contrasena"];
          // $tipoUsuario = $_GET["tipo_usuario"];
			
            $servicioLogin = new ServicioLogin();           
           return $servicioLogin->ValidarUsuario($matricula, $contrasena);
        }
    }

  
}
?>
