<?php

include_once 'ConexionGeneral.php';
include_once '/sw/domain/Profesor.php';
include_once '/sw/domain/Usuario.php';
/**
 * Clase: ProfesorDAO
 * Descripcion: Esta clase se encarga de gestionar consultas a la base de datos relacionadas con la entidad profesor.
 * Requisitos relacionados:
 * -RF-PR001
 * -RF-PR002
 * -RF-PR003
 * -RF-PR004
 * -RF-AD001
 * -RF-AD002
 * -RF-AD003
 */
class ProfesorDAO extends ConexionGeneral {

    public function seleccionarProfesorPorMatricula($profesorMatricula) {
        $usuarioDAO = new UsuarioDAO();
        $conexion = $this->abrirConexion();

        $usuario = $usuarioDAO->seleccionarUsuarioPorMatricula($profesorMatricula);
        $sql = "SELECT * FROM profesor WHERE usuarioId =" . $usuario->getIdUsuario();
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        while ($fila = mysql_fetch_array($resultado)) {
            $profesor = new Profesor($usuario->getIdUsuario(), $usuario->getContrasena(), $usuario->getNombre(), $usuario->getApellidoP(), $usuario->getApellidoM(), $usuario->getMatricula(), $usuario->getTipoUsuario(), $fila["idProfesor"]);
            return $profesor;
        }
        $this->cerrarConexion($conexion);
        return $profesor;
    }

    public function insertarDatosProfesor($usuarioId) {
        $registroExitoso = false;
        $conexionDB = $this->abrirConexion();
        $query = "INSERT INTO profesor (usuarioId) VALUES ('" . $usuarioId . "' )";
        if ($this->ejecutarConsulta($query, $conexionDB)) {
            $registroExitoso = true;
        }
        $this->cerrarConexion($conexionDB);
        return $registroExitoso;
    }

    public function seleccionarTodosProfesores() {
        $usuarioDAO = new UsuarioDAO();
        $usuariosP = $usuarioDAO->seleccionarTodosUsuarios("WHERE tipoUsuario='2' ");
        $conexion = $this->abrirConexion();
        $profesores = array();
        for ($i = 0; $i < count($usuariosP); $i++) {
            $sql = "SELECT * FROM profesor WHERE usuarioId=" . $usuariosP[$i]->getIdUsuario();
            $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
            while ($fila = mysql_fetch_array($resultado_peticion)) {
                $profesores[$i] = new Profesor($usuariosP[$i]->getIdUsuario(), $usuariosP[$i]->getContrasena(), $usuariosP[$i]->getNombre(),
                                $usuariosP[$i]->getApellidoP(), $usuariosP[$i]->getApellidoM(), $usuariosP[$i]->getMatricula(), $usuariosP[$i]->getTipoUsuario(), $fila['idProfesor']);
            }
        }
        $this->cerrarConexion($conexion);
        return $profesores;
    }

    public function borrarProfesor($usuarioId) {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->borrarUsuario($usuarioId);
    }

}

?>
