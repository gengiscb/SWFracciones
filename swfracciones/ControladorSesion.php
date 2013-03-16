<?php

include_once 'sw/ServicioUsuario.php';


class ControladorInformacion{


 public   function ObtenerInformacion() {
        if (isset($_GET["btn_sesion"]) && $_GET["btn_sesion"] == "Iniciar sesi&oacute;n") {
          
            $matricula = $_GET["matricula"];
            $contrasena = $_GET["contrasena"];
			
			$servicioUsuario = new ServicioUsuario();
			$servicioUsuario->validarUsuarios($matricula, $contrasena);
			
			
/* */          
        }
    }
}
	
?>