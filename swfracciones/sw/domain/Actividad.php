<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Actividad {
    private $fechaInicio;
    private $fechaFinal;
    private $nombre;
    private $estado;
    private $idAlumno;
    private $numeroActividad;
//    private $idActividad;
//    private $urlEscenario;
//    private $urlRespuestas;
    
    public function __construct($fechaInicio, $fechaFinal, $numeroActividad) {
        $this->fechaInicio = $fechaInicio;
        $this->fechaFinal = $fechaFinal;
        $this->numeroActividad = $numeroActividad;
        $this->nombreActividad = "";
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getFechaFinal() {
        return $this->fechaFinal;
    }

    public function getNumeroActividad() {
        return $this->numeroActividad;
    }
}
?>