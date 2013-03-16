<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario {

    private  $idUsuario;
    private  $contrasena;
    private  $nombre;
    private  $apellidoP;
    private  $apellidoM;
    private  $matricula;
    private  $tipoUsuario;

    public function __construct($idUsuario,$contrasena, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario) {
        $this->idUsuario=$idUsuario;
        $this->contrasena = $contrasena;
        $this->nombre = $nombre;
        $this->apellidoP = $apellidoP;
        $this->apellidoM = $apellidoM;
        $this->matricula = $matricula;
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidoP() {
        return $this->apellidoP;
    }

    public function getApellidoM() {
        return $this->apellidoM;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidoP($apellidoP) {
        $this->apellidoP = $apellidoP;
    }

    public function setApellidoM($apellidoM) {
        $this->apellidoM = $apellidoM;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

}

?>
