<?php

include_once 'sw/_ServicioActividad.php';
include_once 'sw/GestorActividad1_1.php';
include_once 'sw/GestorActividad102.php';
include_once 'sw/GestorActividad1_3.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class _ControladorActividad {

    function listarActividadesAlumno() {
        $resultado = "";
        $servicioActividad = new _ServicioActividad();
        $resultado = $servicioActividad->listarActividadesAlumno();
        return $resultado;
    }

    function obtenerActividad() {
        $idActividad = $_GET['idAct'];
        $actividaObj = null;
        if (strcmp($idActividad, '1') == 0) {
            $actividaObj = new GestorActividad1_1($_SESSION['usuarioId']);
        }
        if (strcmp($idActividad, '2') == 0) {
            $actividaObj = new GestorActividad1_2($_SESSION['usuarioId']);
        }   
        
        if (strcmp($idActividad, '3') == 0) {
            $actividaObj = new GestorActividad1_3($_SESSION['usuarioId']);
        }  
        return $actividaObj;
    }

    function habilitarActividad() {
//        echo "x";
        if (isset($_POST["btn_habilitar"]) && $_POST["btn_habilitar"] == "Habilitar") {            
            $select_dia = $_POST["select_dia"];
            $select_mes = $_POST["select_mes"];
            $anio = $_POST["anio"];
            $select_diaFin = $_POST["select_diaFin"];
            $select_mesFin = $_POST["select_mesFin"];
            $anioFin = $_POST["anioFin"];
            $idActividad = $_POST["actividad"];
            $hora = $_POST["hora"];
            $horaFin = $_POST["horaFin"];
            $min = $_POST["min"];
            $minFin = $_POST["minFin"];
            $fechaInicio = "" . $anio . "-" . $select_mes . "-" . $select_dia . " " . $hora . ":" . $min . "";
            $fechaFin = "" . $anioFin . "-" . $select_mesFin . "-" . $select_diaFin . " " . $horaFin . ":" . $minFin . "";
            $grupo = $_POST["grupo"];
            $servicioActividad = new _ServicioActividad();
            return $servicioActividad->habilitarActividad($idActividad, $fechaInicio, $fechaFin, $grupo);
        }
    }
    
    function esHabilitableLaActividad() {
            $idActividad = $_POST["actividad"];
            $grupo = $_POST["grupo"];
            $servicioActividad = new _ServicioActividad();
            return $servicioActividad->actividadEstaHabilitada($idActividad,$grupo);        
    }

    public function listarActividades($grupo) {        
        
        $ServicioActividad = new _ServicioActividad();
        $resultado = $ServicioActividad->listarActividades($grupo);
        return $resultado;
    }

    public function deshabilitarActividad() {
        if (isset($_POST["btn_desHabilitar"]) && $_POST["btn_desHabilitar"] == "deshabilitar") { 
            $grupo = $_POST["grupo"];
            $idAct = $_POST["actividad"];
            $ServicioActividad = new _ServicioActividad();
           return  $ServicioActividad->deshabilitarActividad($grupo,$idAct);
        }
    }

    public function finalizarActividad($idActividad, $idAlumno) {
        $ServicioActividad = new _ServicioActividad();
        $ServicioActividad->finalizarActividad($idActividad, $idAlumno);
    }

    public function finalizadofecha() {
        $ServicioActividad = new _ServicioActividad();
        $ServicioActividad->finalizadofecha();
    }

    //ricardo

    public function comprobarEstado($idActividad, $idAlumno) {
        $ServicioActividad = new _ServicioActividad();
        $estado = $ServicioActividad->obtenerEstadoActAlumno($idActividad, $idAlumno);
        if ($estado == 'No iniciada' || $estado == 'Finalizada') {
            return true;
        } else {
            return false;
        }
    }

    //ricardo
    public function comprobarIntentos($idActividad, $idAlumno) {
        $ServicioActividad = new _ServicioActividad();
        $intentos = $ServicioActividad->obtenerIntentos($idActividad, $idAlumno);        
        if ($intentos < 3) {
            return true;
        } else {
            $ServicioActividad->reinicieIntentos($idActividad, $idAlumno);
            return false;
        }
    }

    public function incrementarIntentos($idActividad, $idAlumno) {
        $ServicioActividad = new _ServicioActividad();
        $resultado = $ServicioActividad->incrementeIntentos($idActividad, $idAlumno);
        return $resultado;
    }

    public function incrementarFallos($idActividad, $idAlumno) {
        $ServicioActividad = new _ServicioActividad();
        $resultado = $ServicioActividad->incrementeFallos($idActividad, $idAlumno);
        return $resultado;
    }

    public function incrementarAsciertos($idActividad, $idAlumno) {
        $ServicioActividad = new _ServicioActividad();
        $resultado = $ServicioActividad->incrementeAsciertos($idActividad, $idAlumno);
        return $resultado;
    }

    public function incrementarIngresos($idActividad, $idAlumno) {
        $ServicioActividad = new _ServicioActividad();
        $ingresos = $ServicioActividad->incrementeIngresos($idActividad, $idAlumno);
        return $ingresos;
    }

}
if (isset($_POST['ajax'])) {
        $intanciaControlador = new _ControladorActividad();
    if (strcmp($_POST['ajax'], "int") == 0) {
            $idActividad = $_POST['idAct'];
            $idAlumno = $_POST['idAlum'];
        if ($intanciaControlador->comprobarIntentos($idActividad, $idAlumno)) {
//            $intanciaControlador->incrementarIntentos($idActividad, $idAlumno);
            echo "true";
        } else {
            echo "false";
        }
    } elseif (strcmp($_POST['ajax'], "asc") == 0) {
        $idActividad = $_POST['idAct'];
        $idAlumno = $_POST['idAlum'];
        $intanciaControlador->incrementarAsciertos($idActividad, $idAlumno);
        echo "+";
    } elseif (strcmp($_POST['ajax'], "fal") == 0) {
        $idActividad = $_POST['idAct'];
        $idAlumno = $_POST['idAlum'];
        $intanciaControlador->incrementarFallos($idActividad, $idAlumno);
        $intanciaControlador->incrementarIntentos($idActividad, $idAlumno);
    }
    elseif (strcmp($_POST['ajax'], "hab") == 0) {
        echo $intanciaControlador->habilitarActividad();
    }
    elseif (strcmp($_POST['ajax'], "des") == 0) {
        echo "X";
        echo $intanciaControlador->deshabilitarActividad();
    }
}

//if (isset($_GET['ajax'])) {
////    $idActividad = $_POST['idAct'];
////    $idAlumno = $_POST['idAlum'];
//    $intanciaControlador = new _ControladorActividad();
//    if (strcmp($_POS['ajax'], "hab") == 0) {
//        $intanciaControlador->habilitarActividad();
//        echo '-';
//    }
//}

?>
