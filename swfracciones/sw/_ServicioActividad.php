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
            if ($ActividadDAO->obtenerEstadoActividad($resultado[$i]['idActividad'], $_SESSION['usuarioId']) != "Finalizado" && $ActividadDAO->obtenerEstadoActividad($resultado[$i]['idActividad'], $_SESSION['usuarioId']) != "Deshabilitada") {
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
            if (count($resultado) == 0) {
                $resultadoHTML.="<div class='clean-gray'>No hay resultados</div>";
            }
            return $resultadoHTML;
        }
    }

    public function listarActividades() {
        $ActividadDAO = new ActividadDAO();
        $resultado = $ActividadDAO->listarActividadesProfesor();
        $resultadoHTML = "";
        for ($i = 0; $i < count($resultado); $i++) {


            $resultadoHTML.="<table><tr><th>Id de Actividad</th><th><span class='text_act'>";
            $resultadoHTML.=$resultado[$i]['idActividad'];
            $resultadoHTML.="</span></th></tr>";

            $resultadoHTML.="<tr><th>Numero de Actividad</th><th><span class='text_act'>";
            $resultadoHTML.=$resultado[$i]['numeroActividad'];
            $resultadoHTML.="</span></th></tr>";

            $resultadoHTML.="<tr><th>Nombre:</th><th><span class='text_act'>";
            $resultadoHTML.=$resultado[$i]['nombre'];
            $resultadoHTML.="</span></tr></th>";



            $resultadoHTML.="<th>Habilitar
                                </th>
                                <th><a disabled='disabled' href=\"Habilitar.php?cid=" . $resultado[$i]['idActividad'] . "\"><img alt=\"Editar\" src=\"img/utileria/habilitar.jpg\"></a>
				</th>
				</tr>";
            $resultadoHTML.="<th>Deshabilitar
                                </th>
				<th><a href=\"Deshabilitar.php?cid=" . $resultado[$i]['idActividad'] . "&nombre=" . $resultado[$i]['nombre'] . "\"><img alt=\"Editar\" src=\"img/utileria/deshabilitar.gif\"></a>
				</th>
				</tr>";
            $resultadoHTML.="<th>Visualizar
							</th>
							<th><a href=\"VerActividades.php?idAct=" . $resultado[$i]['idActividad'] . "&usuarioId= " . $_SESSION['usuarioId']."&nombre=" . $resultado[$i]['nombre'] . "\"><img alt=\"Editar\" src=\"img/utileria/eye.gif\"></a>
							</th>
						</tr></table>";
        }
        if (count($resultado) == 0) {
            $resultadoHTML.="<div class='clean-gray'>No hay resultados</div>";
        }
        return $resultadoHTML;
    }

    public function habilitarActividad($idActividad, $fechaInicio, $fechaFinalizacion, $grupo) {
        $ActividadDAO = new ActividadDAO();
        if ($estado = $ActividadDAO->actualizarEstadoActividad($idActividad, $grupo, $fechaInicio, $fechaFinalizacion)) {
            return  'Se ha habilitado la actividad con anterioridad';
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

    public function deshabilitarActividad($grupo,$idAct) {
        $ActividadDAO = new ActividadDAO();
        
        if ($ActividadDAO->deshabilitarActividad($grupo,$idAct)) {
            return  'Se ha deshabilitado la actividad con anterioridad';
//            echo "<script>window.location = 'listarActividades.php';</script>";
        } else {
            return 'Actividad desHabilitada';
            //echo "<script>window.location = 'listarActividades.php';</script>";
        }
    }

}

?>
