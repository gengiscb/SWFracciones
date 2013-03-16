<?php
include_once 'ConexionGeneral.php';
include_once '/sw/domain/Profesor.php';
include_once '/sw/domain/Usuario.php';


class ProfesorDAO extends ConexionGeneral {
    public function seleccionarProfesorPorMatricula($profesorMatricula) {
        $usuarioDAO = new UsuarioDAO();
        $conexion = $this->abrirConexion();
        
        $usuario = $usuarioDAO->seleccionarUsuarioPorMatricula($profesorMatricula);
        $sql = "SELECT * FROM profesor WHERE usuarioId =".$usuario->getIdUsuario();
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        while ($fila = mysql_fetch_array($resultado)) {
            //$idUsuario,$contrasena, $nombre, $apellidoP, $apellidoM, $matricula,$tipoUsuario, $grupo, $idProfesor
            $profesor = new Profesor($usuario->getIdUsuario(),$usuario->getContrasena(), $usuario->getNombre(),$usuario->getApellidoP(),$usuario->getApellidoM(),$usuario->getMatricula(),$usuario->getTipoUsuario(),$fila["idProfesor"]);
            return $profesor;
        }
        $this->cerrarConexion($conexion);
        return $profesor;
    }

    public function insertarDatosProfesor($usuarioId) {
        $registroExitoso = false;
//        $usuarioDAO = new UsuarioDAO();
        $conexionDB = $this->abrirConexion();
//        $usuarioDAO->agregarUsuario($contrasena, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario);
//        $usuario = new Usuario();
//        $usuario = $usuarioDAO->obtenerUsuarioPorMatricula($matricula);        
        $query = "INSERT INTO profesor (usuarioId) VALUES ('".$usuarioId."' )";
        if ($this->ejecutarConsulta($query, $conexionDB)) {
            $registroExitoso = true;
        }
        $this->cerrarConexion($conexionDB);
        return $registroExitoso;
    }

//    public function actualizarInformacionProfesor($grupo,$usuarioId) {
//        $conexion = $this->abrirConexion();
//        $query = "UPDATE profesor SET Grupo = '" . $grupo . "';";
//        $resultado = $this->ejecutarConsulta($query, $conexion);
//        $this->cerrarConexion($conexion);
//        return $resultado;
//    }

    public function seleccionarTodosProfesores() {
        $usuarioDAO= new UsuarioDAO();        
        $usuariosP=$usuarioDAO->seleccionarTodosUsuarios("WHERE tipoUsuario='2' ");        
        $conexion = $this->abrirConexion();
        $profesores=array();
        for($i=0; $i <count($usuariosP);$i++ ){
            $sql = "SELECT * FROM profesor WHERE usuarioId=".$usuariosP[$i]->getIdUsuario();
            $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
            while ($fila = mysql_fetch_array($resultado_peticion)) {
                $profesores[$i] = new Profesor($usuariosP[$i]->getIdUsuario(), $usuariosP[$i]->getContrasena(),$usuariosP[$i]->getNombre(), 
                        $usuariosP[$i]->getApellidoP(), $usuariosP[$i]->getApellidoM(), $usuariosP[$i]->getMatricula(),$usuariosP[$i]->getTipoUsuario(), $fila['idProfesor']);
            }
        }
        $this->cerrarConexion($conexion);
        return $profesores;
    }

    public function borrarProfesor($usuarioId) {
        $usuarioDAO=new UsuarioDAO();
        return $usuarioDAO->borrarUsuario($usuarioId);
    }
}

?>
