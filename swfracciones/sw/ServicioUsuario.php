<?php

include_once 'DB/UsuarioDAO.php';

class ServicioUsuario {

    public function actualizarPerfilUsuario($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasenia) {
        $usuarioDAO = new UsuarioDAO();
        $exito = $usuarioDAO->actualizarInformacionUsuario($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasenia);
        if ($exito) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarUsuario($usuarioId) {
        $usuarioDAO = new UsuarioDAO();
        if ($usuarioDAO->borrarUsuario($usuarioId)) {
            return true;
        } else {
            return false;
        }
    }

    public function agregarUsuario($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM, $tipoUsuario) {
        $usuarioDAO = new UsuarioDAO();        
        if (!$usuarioDAO->existeUsuario($matricula)) {
            $usuarioDAO->insertarUsuario($contrasenia, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario);
            return true;
        } else {
            return false;
        }
    }

    public function buscarUsuarioPorMatricula($matricula) {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->seleccionarUsuarioPorMatricula($matricula);
    }

    public function obtenerTodosUsuarios() {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->seleccionarTodosUsuarios("");
    }

    public function validarUsuarios($matricula, $contrasena) {

        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->AccesoUsuarios($matricula, $contrasena);
    }

}
?>