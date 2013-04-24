<?php

include_once 'ServicioUsuario.php';
include_once 'DB/ProfesorDAO.php';
/**
 * Clase: ServicioProfesor
 * Descripcion: Esta clase se encarga de  de gestionar los servicios sobre el profesor
 * Requisitos relacionados:
 * -RF-PR001
RF-PR002
RF-PR003
RF-PR004
RF-AD001
RF-AD003
 */
class ServicioProfesor {

    public function actualizarPerfilProfesor($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasenia) {
        $servicioUsuario = new ServicioUsuario();
        return $servicioUsuario->actualizarPerfilUsuario($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasenia);
    }

    public function eliminarProfesor($usuarioId) {
        $profesorDAO = new ProfesorDAO();
        if ($profesorDAO->borrarProfesor($usuarioId)) {
            return true;
        } else {
            return false;
        }
    }

    public function agregarProfesor($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM) {
        $servicioUsuario = new ServicioUsuario();
        $agregado = $servicioUsuario->agregarUsuario($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM, 2);
        if ($agregado) {
            $usuario = $servicioUsuario->buscarUsuarioPorMatricula($matricula);
            $profesorDAO = new ProfesorDAO();
            $profesorDAO->insertarDatosProfesor($usuario->getIdUsuario());
            return true;
        } else {
            return false;
        }
    }

    public function buscarProfesorPorMatricula($profesorMatricula) {
        $profesorDAO = new ProfesorDAO();
        return $profesorDAO->seleccionarProfesorPorMatricula($profesorMatricula);
    }

    public function obtenerTodosProfesores() {
        $profesorDAO = new ProfesorDAO();
        return $profesorDAO->seleccionarTodosProfesores();
    }

}

?>