<?php
include_once 'ServicioUsuario.php';
include_once 'DB/ProfesorDAO.php';

class ServicioProfesor {
    public function actualizarPerfilProfesor($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasenia) {
        $servicioUsuario = new ServicioUsuario();
        $servicioUsuario->actualizarPerfilUsuario($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasenia);
//        $profesorDAO = new ProfesorDAO();
//        $profesorDAO->actualizarInformacionProfesor( $usuarioId);
    }

    public function eliminarProfesor($usuarioId) {
        $profesorDAO=new ProfesorDAO();
        if ($profesorDAO->borrarProfesor($usuarioId)) {
            return true;
        } else {
            return false;
        }
    }

    public function agregarProfesor($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM) {
        $servicioUsuario = new ServicioUsuario();
        $agregado = $servicioUsuario->agregarUsuario($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM, 2);
        if($agregado){
            $usuario = $servicioUsuario->buscarUsuarioPorMatricula($matricula);
            $profesorDAO = new ProfesorDAO();
            $profesorDAO->insertarDatosProfesor($usuario->getIdUsuario());
            return true;
        }
        else{
            return false;
        }
    }

    public function buscarProfesorPorMatricula($profesorMatricula) {
        $profesorDAO = new ProfesorDAO();
        return $profesorDAO->seleccionarProfesorPorMatricula($profesorMatricula);
    }

    public function obtenerTodosProfesores(){
        $profesorDAO= new ProfesorDAO();
        return $profesorDAO->seleccionarTodosProfesores();
    }

}

?>