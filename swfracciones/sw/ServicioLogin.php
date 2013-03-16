<?php

include_once 'sw/DB/UsuarioDAO.php';
include_once 'Sesion.php';

class ServicioLogin {
    public function ValidarAcceso($matricula, $contrasena) {
        $usuarioDAO = new UsuarioDAO();
        $usuarioMatricula = $usuarioDAO->seleccionarUsuarioPorMatricula($matricula);
        if ($usuarioMatricula) {
            echo $usuarioMatricula->getMatricula()." ".$usuarioMatricula->getContrasena();
            $cContrasena = trim($usuarioMatricula->getContrasena());
            if (trim($contrasena) == $cContrasena) {
                echo '<script language="javascript">
				alert("El usuario ha iniciado sesión correctamente.")"
				</script>';
                $sesion = new Sesion();
                $sesion->iniciarSesion($matricula);
                return TRUE;
            } else {
                echo '<script language="javascript">
				alert("contraseña incorrecta, verifique.")
				self.location ="#"

				
				</script>';

                return FALSE;
            }
        } else {


            echo '<script language="javascript">
				alert("usuario incorrecto, verifique.")
				
				self.location ="#"
				</script>';
        }
    }

}

?>