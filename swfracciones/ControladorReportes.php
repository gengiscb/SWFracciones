<?php

include_once 'config.inc.php';
include_once 'sw/GestorResportes.php';
/**
 * Clase: ControladorReportes
 * Descripcion: Esta clase se encarga de 
 * Requisitos relacionados:
 * -RF-RE001
RF-RE002
RF-RE003

 */
class ControladorReportes {

    public function obtenerJSONGrafica() {
        if (isset($_GET['idProfesor']) && isset($_GET['grf'])) {
            $idProfesor = $_GET['idProfesor'];
            $gestorReportes = new GestorResportes();
            return $gestorReportes->obtenerJSONDatosGraficaProfesor($idProfesor);
        }
    }

    public function obtenerHTMLTablaReporteProfesor() {
        if (isset($_GET['idProfesor'])) {
            $idProfesor = $_GET['idProfesor'];
            $gestorReportes = new GestorResportes();
            return $gestorReportes->obtenerHTMLTablaReportes($idProfesor);
        }
    }

    public function obtenerTitulosActividadesDisponibles() {
        if (isset($_GET['idProfesor'])) {
            $gestorReportes = new GestorResportes();
            return $gestorReportes->obtenerTituloActividades();
        }
    }

}

$ctrReportes = new ControladorReportes();
print $ctrReportes->obtenerJSONGrafica();
?>