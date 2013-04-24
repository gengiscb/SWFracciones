<?php

include_once 'DB/_ActividadDAO.php';
include_once 'sw/Sesion.php';
/**
 * Clase: _ServicioActividad
 * Descripcion: Esta clase se encarga de gestionar la partelogica visual relacionada con los servicios sobre las actividades
 * Requisitos relacionados:
 * -Modulo gestor de actividades
 */
class _ServicioActividad {

    public function listarActividadesAlumno() {
        $ActividadDAO = new ActividadDAO();
        $resultado = $ActividadDAO->listarActividadesAlumnos($_SESSION['usuarioId']);
        $resultadoHTML = "";
        for ($i = 0; $i < count($resultado); $i++) {
            if ($ActividadDAO->obtenerEstadoActividad($resultado[$i]['idActividad'], $_SESSION['usuarioId']) != "Finalizada" && $ActividadDAO->obtenerEstadoActividad($resultado[$i]['idActividad'], $_SESSION['usuarioId']) != "Finalizado" && $ActividadDAO->obtenerEstadoActividad($resultado[$i]['idActividad'], $_SESSION['usuarioId']) != "Deshabilitada") {
                $resultadoHTML.="<a href='VistaActividadAlumno.php?idAct=" . $resultado[$i]['idActividad'] . "&usuarioId= " . $_SESSION['usuarioId'] . "' ><div class='clean-gray'>";
                $resultadoHTML.="<span class='text_act'>";
                $resultadoHTML.=$resultado[$i]['nombre'];
                $resultadoHTML.="</span> <br>";
                $resultadoHTML.="<span class='text_fact'>De ";
                $resultadoHTML.=$resultado[$i]['fechaInicio'];
                $resultadoHTML.="</span>";

                $resultadoHTML.="<span class='text_fact'> hasta ";
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
            $resultadoHTML.="<div class='clean-gray' id='profesor'>";
            $resultadoHTML.="<span class='text_act'>";
            $resultadoHTML.=$resultado[$i]['numeroActividad'] . "--.";
            $resultadoHTML.="</span>";
            $resultadoHTML.="<span class='text_act'>";
            $resultadoHTML.=$resultado[$i]['nombre'];
            $resultadoHTML.="</span><br>";

            $resultadoHTML.="<span>";
            if ($this->actividadEstaHabilitada($resultado[$i]['idActividad'], $grupo)) {
                $resultadoHTML.="<a  href='Habilitar.php?cid=" . $resultado[$i]['idActividad'] . "'>
                <input class='boton' id='verde' type ='button' value='Habilitar' /></a>";
            } else {
                //$resultadoHTML.="<a><input  class='boton' id='verde' type ='button' onclick=\"alert('Solo puede habilitar una vez la actividad')\"  value='Habilitar' /></a>";
                //$resultadoHTML.="<input  class='boton' id='' type ='button' disabled value='Habilitar' />";
                $resultadoHTML.="<a  href='Deshabilitar.php?cid=" . $resultado[$i]['idActividad'] . "&nombre=" . $resultado[$i]['nombre'] . "'>
                <input class='boton' id='naranja' type ='button' value='Deshabilitar' /></a>";
            }

            $resultadoHTML.="<a href='VerActividades.php?idAct=" . $resultado[$i]['idActividad'] . "&usuarioId= " . $_SESSION['usuarioId'] . "&nombre=" . $resultado[$i]['nombre'] . "'>
                <input class='boton' type ='button' id='azul' value='Visualizar' /></a>";

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
        } else {
            return 'Actividad Habilitada';
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
        } else {
            return 'La actividad no ha sido desHabilitada';
        }
    }

}

?>