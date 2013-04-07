

<?php
include_once('Usuario.php');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Profesor extends Usuario {

    private $idProfesor;    
    private $grupo;
    public function __construct($idUsuario,$contrasena, $nombre, $apellidoP, $apellidoM, $matricula,$tipoUsuario, $idProfesor ) {
        parent::__construct($idUsuario,$contrasena, $nombre, $apellidoP, $apellidoM, $matricula,$tipoUsuario);
        $this->idProfesor = $idProfesor;
		
    }
    
    public function getIdProfesor() {
        return $this->idProfesor;
    }

    public function setIdProfesor($idProfesor) {
        $this->idProfesor = $idProfesor;
    }
    public function getGrupoProfesor() {
        return $this->idProfesor;
    }

    public function setGrupoProfesor($idProfesor) {
        $this->idProfesor = $idProfesor;
    }
}

?>