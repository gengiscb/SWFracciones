<?php

include_once 'sw/ServicioProfesor.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ControladorProfesor {

    //Necesito pasar los post del registro y no se como llamar  a la funcion no se si borrar la de arriba y modificarla 

    function agregaProfesorC() {
        if (isset($_GET["registrar_profesor"]) && $_GET["registrar_profesor"] == "registrar") {
            $nombre = $_GET["nombre"];
            $apellidoP = $_GET["apellidoP"];
            $apellidoM = $_GET["apellidoM"];
            $matricula = $_GET["matricula"];
//            $grupo = $_GET["grupo"];
            $contrasena = $_GET["contrasena"];
///* */       $tipoUsuario = $_GET["tipo_usuario"];
            $servicioProfesor = new ServicioProfesor();
            if ($servicioProfesor->agregarProfesor($matricula, $nombre, $contrasena, $apellidoP, $apellidoM)) {
                return "TRUE";
            } else {
                return "FALSE";
            }
        }
    }

    function obtenerProfesorC() {
        if (isset($_SESSION["matricula"])) {
            $matricula = $_SESSION["matricula"];
            $servicioProfesor = new ServicioProfesor();
            return $servicioProfesor->buscarProfesorPorMatricula($matricula);
        }
    }

    function obtenerProfesoresC() {
        if (isset($_GET["obtener_profesores"]) && $_GET["obtener_profesores"] == "obtener") {
            $servicioProfesor = new ServicioProfesor();
            return $servicioProfesor->obtenerTodosProfesores();
        }
    }

    function eliminarProfesorC() {
        if (isset($_GET["eliminar_profesor"]) && $_GET["eliminar_profesor"] == "eliminar") {
            $usuarioId = $_GET["idUsuario"];
            $servicioProfesor = new ServicioProfesor();
            return $servicioProfesor->eliminarProfesor($usuarioId);
        }
    }

    function actualizarProfesorC() {
        if (isset($_GET["actualizar_profesor"]) && $_GET["actualizar_profesor"] == "registrar") {
            $nombre = $_GET["nombre"];
            $apellidoP = $_GET["apellidoP"];
            $apellidoM = $_GET["apellidoM"];
//            $grupo = $_GET["grupo"];
            $contrasena = $_GET["contrasena"];
            $usuarioId = $_GET["usuarioId"];
            $servicioProfesor = new ServicioProfesor();
            if ($servicioProfesor->actualizarPerfilProfesor($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasena)) {
                $msj = "<div class='exito'>Exito en la actualizacion</div>";
            } else {
                $msj = "<div class='error'>Error al intentar actualizar</div>";
            }
            return $msj;
        }
    }

    function eliminarProfesorProf() {
        if (isset($_GET["eliminar_profesor"]) && $_GET["eliminar_profesor"] == "eliminarProf") {
            $usuarioId = $_GET["idUsuario"];
            $servicioProfesor = new ServicioProfesor();
            $servicioProfesor->eliminarProfesor($usuarioId);
            include_once '../config.inc.php';
            session_start();
            $_SESSION['login'] = false;
            session_destroy();
            header("Location: " . $GLOBALS['raiz_sitio']);
        }
    }

	function tablaProfesores(){
		$profesores=$this->obtenerProfesoresC();
    	$SALTO = "\n";
    	$cadena_post = "";
    	$index = 1;
		foreach($profesores as $profesor) {
        	$class = "";
        	if ($index % 2 == 0)
        		$class = "par";
        	$cadena_post .='            <tr class="' . $class . '">' . $SALTO;
        	$cadena_post .='                <td>' . $profesor->getIdProfesor() . '</td>' . $SALTO;
        	$cadena_post .='                <td>' . $profesor->getNombre() . '</td>' . $SALTO;
        	$cadena_post .='                <td>' . $profesor->getApellidoP(). '</td>' . $SALTO;
        	$cadena_post .='                <td>' . $profesor->getApellidoM() . '</td>' . $SALTO;
        	$cadena_post .='                <td>' . $profesor->getIdProfesor() . '</td>' . $SALTO;
        	$cadena_post .='                <td>'.$profesor->getContrasena().'</td>' . $SALTO;
        //href="adm_producto_borrar.php?productoId='.$producto['productoId'].'"
        	$cadena_post .='               	<td class="borrar"><a onclick = "confirmarEliminacionProfesor(' . $profesor->getIdUsuario() . ')" href="#"><img src="img/utileria/borrar.png" alt="Borrar"/></a></td>' . $SALTO;
//            $cadena_post .='                </td>'.$SALTO;
        	$cadena_post .='            </tr>' . $SALTO;
        	$index++;
    	}
    	if ($cadena_post == "") {
        	$cadena_post .="<tr><td colspan='4'>No hay profesores registrados</td></tr>" . $SALTO;
    	}
    	return $cadena_post;
	}
}
$controladorProfesor = new ControladorProfesor ();
echo trim($controladorProfesor->agregaProfesorC());

?>
