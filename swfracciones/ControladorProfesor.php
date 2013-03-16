<?php
include_once 'sw/ServicioProfesor.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ControladorProfesor{
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
            return $servicioProfesor->agregarProfesor($matricula, $nombre, $contrasena, $apellidoP, $apellidoM);
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
            $usuarioId = $_SESSION["usuarioId"];
            $servicioProfesor = new ServicioProfesor();            
            return $servicioProfesor->actualizarPerfilProfesor($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasena);
                    
        }
    }
    function eliminarProfesorProf() {
        if (isset($_GET["eliminar_profesor"]) && $_GET["eliminar_profesor"] == "eliminarProf") {
            $usuarioId = $_GET["idUsuario"];
            $servicioProfesor = new ServicioProfesor();            
            $servicioProfesor->eliminarProfesor($usuarioId);
            include_once '../config.inc.php';
            session_start();   
            $_SESSION['login']=false;
            session_destroy();
            header("Location: ".$GLOBALS['raiz_sitio']);
        }
    }
}
?>
