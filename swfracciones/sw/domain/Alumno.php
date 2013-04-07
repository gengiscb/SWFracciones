

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Alumno extends Usuario {
    private $idAlumno;
    private $grupo;
    
    public function __construct($idUsuario, $contrasena, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario, $grupo, $idAlumno) {
        parent::__construct($idUsuario, $contrasena, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario);
        $this->idAlumno = $idAlumno;
        $this->grupo = $grupo;
    }

    public function getIdAlumno() {
        return $this->idAlumno;
    }

    public function setIdAlumno($idAlumno) {
        $this->idAlumno = $idAlumno;
    }

    public function getGrupo() {
        return $this->grupo;
    }

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

}
?>