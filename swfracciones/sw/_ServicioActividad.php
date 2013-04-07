<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'DB/_ActividadDAO.php';
include_once 'sw/Sesion.php';

class _ServicioActividad {

    public function listarActividadesAlumno() {
        $ActividadDAO = new ActividadDAO();
        $resultado = $ActividadDAO->listarActividadesAlumnos($_SESSION['usuarioId']);
        $resultadoHTML = "";
        for ($i = 0; $i < count($resultado); $i++) {
            if ($ActividadDAO->obtenerEstadoActividad($resultado[$i]['idActividad'], $_SESSION['usuarioId']) != "Finalizada" && $ActividadDAO->obtenerEstadoActividad($resultado[$i]['idActividad'], $_SESSION['usuarioId']) != "Deshabilitada") {
                $resultadoHTML.="<a href='VistaActividadAlumno.php?idAct=" . $resultado[$i]['idActividad'] . "&usuarioId= " . $_SESSION['usuarioId'] . "' ><div class='clean-gray'>";
                $resultadoHTML.="<span class='text_act'>";
                $resultadoHTML.=$resultado[$i]['nombre'];
                $resultadoHTML.="</span>";
                $resultadoHTML.="<span class='text_act'>";
                $resultadoHTML.=$resultado[$i]['fechaInicio'];
                $resultadoHTML.="</span>";

                $resultadoHTML.="<span class='text_act'>";
                $resultadoHTML.=$resultado[$i]['fechaFinalizacion'];
                $resultadoHTML.="</span>";

                $resultadoHTML.="</div></a>";
            }
        }
        if ($resultadoHTML == "") {
                $resultadoHTML.="<div class='clean-gray'>No hay actividades disponibles</div>";
        }
        return $resultadoHTML;
    }

    public function listarActividades($grupo) {

        $ActividadDAO = new ActividadDAO();
        $resultado = $ActividadDAO->listarActividadesProfesor();
        $resultadoHTML = "";
        for ($i = 0; $i < count($resultado); $i++) {


            $resultadoHTML.="<div class='clean-gray'>";
            //"<a href='VistaActividadAlumno.php?idAct=" . $resultado[$i]['idActividad'] . "&usuarioId= " . $_SESSION['usuarioId'] . "' >";
            $resultadoHTML.="<span class='text_act'>";
            $resultadoHTML.=$resultado[$i]['numeroActividad']."--.";
            $resultadoHTML.="</span>";
            $resultadoHTML.="<span class='text_act'>";
            $resultadoHTML.=$resultado[$i]['nombre'];
            $resultadoHTML.="</span><br>";

            $resultadoHTML.="<span>";
            if($this->actividadEstaHabilitada($resultado[$i]['idActividad'], $grupo)){
                $resultadoHTML.="<a  href='Habilitar.php?cid=" . $resultado[$i]['idActividad'] . "'>                
                <input class='boton' type ='button' value='Habilitar' /></a>";
            }
            else {
                $resultadoHTML.="<input  class='boton' onclick=\"alert('Solo puede habilitar una vez la actividad')\" type ='button' value='Habilitar' />";
            }
            $resultadoHTML.="<a  href='Deshabilitar.php?cid=" . $resultado[$i]['idActividad'] . "&nombre=" . $resultado[$i]['nombre'] . "'>
                <input class='boton' type ='button' value='Desabilitar' /></a>";
            $resultadoHTML.="<a href='VerActividades.php?idAct=" . $resultado[$i]['idActividad'] . "&usuarioId= " . $_SESSION['usuarioId'] . "&nombre=" . $resultado[$i]['nombre'] . "'>
                <input class='boton' type ='button' value='Visualizar' /></a>";

            $resultadoHTML.="</span>";
            $resultadoHTML.="</div>";

        }

        if (count($resultado) == 0) {
            $resultadoHTML.="<div class='clean-gray'>No hay resultados</div>";
        }
        return $resultadoHTML;
    }

    public function actividadEstaHabilitada($idActividad, $grupo) {
        $ActividadDAO = new ActividadDAO();
        return $ActividadDAO->actividadHabilitable($idActividad, $grupo);
    }    
    public function habilitarActividad($idActividad, $fechaInicio, $fechaFinalizacion, $grupo) {
        $ActividadDAO = new ActividadDAO();
        if ($ActividadDAO->actualizarEstadoActividad($idActividad, $grupo, $fechaInicio, $fechaFinalizacion)) {
            return 'Se ha habilitado la actividad con anterioridad';
//            echo "<script>window.location = 'listarActividades.php';</script>";
        } else {
            return 'Actividad Habilitada';
            //echo "<script>window.location = 'listarActividades.php';</script>";
        }
    }

    //ricardo
    public function obtenerIntentos($idActividad, $idAlumno) {
        $ActividadDAO = new ActividadDAO();
        $intentos = $ActividadDAO->obtenerNumeroIntentos($idActividad, $idAlumno);
        return $intentos;
    }

    //ricardo 
        public function reinicieIntentos($idActividad, $idAlumno) {
        $ActividadDAO = new ActividadDAO();
        $resultado = $ActividadDAO->reiniciarIntentos($idActividad, $idAlumno);
        return $resultado;
    }
    public function incrementeIntentos($idActividad, $idAlumno) {
        $ActividadDAO = new ActividadDAO();
        $resultado = $ActividadDAO->incrementarIntentos($idActividad, $idAlumno);
        return $resultado;
    }

    public function incrementeAsciertos($idActividad, $idAlumno) {
        $ActividadDAO = new ActividadDAO();
        $resultado = $ActividadDAO->incrementarAsciertos($idActividad, $idAlumno);
        return $resultado;
    }

    public function incrementeFallos($idActividad, $idAlumno) {
        $ActividadDAO = new ActividadDAO();
        $resultado = $ActividadDAO->incrementarFallos($idActividad, $idAlumno);
        return $resultado;
    }

    //ricardo
    public function incrementeIngresos($idActividad, $idAlumno) {
        $ActividadDAO = new ActividadDAO();
        $resultado = $ActividadDAO->incrementarIngresos($idActividad, $idAlumno);
        return $resultado;
    }

    //ricardo
    public function obtenerEstadoActAlumno($idActividad, $idAlumno) {
        $ActividadDAO = new ActividadDAO();
        $estado = $ActividadDAO->obtenerEstadoActividad($idActividad, $idAlumno);
        return $estado;
    }

    public function finalizarActividad($idActividad, $idAlumno) {
        $ActividadDAO = new ActividadDAO();
        $ActividadDAO->finalizarActividad($idActividad, $idAlumno);
    }

    public function iniciarActividad($idActividad, $idAlumno) {
        $ActividadDAO = new ActividadDAO();
        $ActividadDAO->iniciarActividad($idActividad, $idAlumno);
    }

    public function finalizadofecha() {
        $ActividadDAO = new ActividadDAO();
        $ActividadDAO->finalizadofecha();
    }

    public function deshabilitarActividad($grupo, $idAct) {
        $ActividadDAO = new ActividadDAO();

        if ($ActividadDAO->deshabilitarActividad($grupo, $idAct)) {
            return 'Actividad deshabilitada';
//            echo "<script>window.location = 'listarActividades.php';</script>";
        } else {
            return 'La actividad no ha sido desHabilitada';
            //echo "<script>window.location = 'listarActividades.php';</script>";
        }
    }

}

?>
