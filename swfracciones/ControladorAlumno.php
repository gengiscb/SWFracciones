<?php
include_once 'sw/ServicioAlumno.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ControladorAlumno{
    function agregarAlumnoC() {
        if (isset($_GET["btn_registrar"]) && $_GET["btn_registrar"] == "Registrar") {
            $nombre = $_GET["nombre"];
            $apellidoP = $_GET["apellidoP"];
            $apellidoM = $_GET["apellidoM"];
            $matricula = $_GET["matricula"];
            $grupo = $_GET["grupo"];
            $contrasena = $_GET["contrasena"];
///* */          $tipoUsuario = $_GET["tipo_usuario"];
            $servicioAlumno = new ServicioAlumno();            
            if($servicioAlumno->agregarAlumno($matricula, $nombre, $contrasena, $apellidoP, $apellidoM, "3", $grupo))
            {
                $msj="TRUE";
            }
            else{
                $msj="FALSE";
            }
            return $msj;
        }
    }
    
    function obtenerAlumnoC() {
        if (isset($_GET["ver_perfil_alumno"]) && $_GET["ver_perfil_alumno"] == "ver_perfil") {
            $matricula = $_GET["matricula"];
            $servicioAlumno = new ServicioAlumno();            
            return $servicioAlumno->buscarAlumnoPorMatricula($matricula);
        }
    }
    
    function obtenerAlumnosC() {        
        if (isset($_GET["obtener_Alumnos"]) && $_GET["obtener_Alumnos"] == "obtener") {
            $servicioAlumno = new ServicioAlumno();            
//            echo $_SESSION['grupo']."----";
            return $servicioAlumno->obtenerTodosAlumnos($_SESSION["grupo"]);
        }
    }
        
    function eliminarAlumnoC() {
        if (isset($_GET["eliminar_Alumno"]) && $_GET["eliminar_Alumno"] == "eliminar") {
            $usuarioId = $_GET["idUsuario"];
            $servicioAlumno = new ServicioAlumno();            
            return $servicioAlumno->eliminarAlumno($usuarioId);
        }
    }
    function actualizarAlumnoC() {
//        echo '1';
        if (isset($_POST["actualizar_alumno"]) && $_POST["actualizar_alumno"] == "actualizar") {
//            echo '2';
            $nombre = $_POST["nombre"];
            $apellidoP = $_POST["apellidoP"];
            $apellidoM = $_POST["apellidoM"];
            $grupo = $_POST["grupo"];
            $contrasena = $_POST["contrasena"];
            $usuarioId = $_POST["usuarioID"];
            $servicioAlumno = new ServicioAlumno();            
            if($servicioAlumno->actualizarPerfilAlumno($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasena, $grupo)){
                return "<div class='exito'>Alumno actualizado con exito</div>";   
            }
            else {
                return "<div class='error'>Error en la actualizacion</div>";
            }
        }
    }
}

$agregarAlumno = new ControladorAlumno();
echo $agregarAlumno->agregarAlumnoC();
?>
