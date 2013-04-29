<?php

include_once 'ConexionGeneral.php';
include_once '/sw/domain/Alumno.php';
include_once '/sw/domain/Usuario.php';
include_once 'UsuarioDAO.php';

class AlumnoDAO extends ConexionGeneral {

    public function seleccionarAlumnoPorMatricula($alumnoMatricula) {
        $usuarioDAO = new UsuarioDAO();
        $conexion = $this->abrirConexion();
        $usuario = $usuarioDAO->seleccionarUsuarioPorMatricula($alumnoMatricula);
        $sql = "SELECT * FROM alumno WHERE usuarioId =" . $usuario->getIdUsuario();
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $alumno = null;
        while ($fila = mysql_fetch_array($resultado)) {
            $alumno = new Alumno($usuario->getIdUsuario(), $usuario->getContrasena(), $usuario->getNombre(), $usuario->getApellidoP(), $usuario->getApellidoM(), $usuario->getMatricula(), $usuario->getTipoUsuario(), $fila["Grupo"], $fila["idAlumno"]);
            return $alumno;
        }
        $this->cerrarConexion($conexion);
        return $alumno;
    }

    public function insertarDatosAlumno($usuarioId, $grupo) {

        $registroExitoso = false;

        $conexionDB = $this->abrirConexion();

        $query = "INSERT INTO alumno (Grupo,usuarioId) VALUES ('" . $grupo . "','" . $usuarioId . "' )";
        if ($this->ejecutarConsulta($query, $conexionDB)) {
            $registroExitoso = true;
        }
        $this->cerrarConexion($conexionDB);
        return $registroExitoso;
    }

    public function actualizarInformacionAlumno($grupo, $usuarioId) {
        $conexion = $this->abrirConexion();
        $query = "UPDATE alumno SET Grupo = '" . $grupo . "';";
        $resultado = $this->ejecutarConsulta($query, $conexion);
        $this->cerrarConexion($conexion);
        return $resultado;
    }

    public function seleccionarTodosAlumnos($grupo) {
        $usuarioDAO = new UsuarioDAO();
        $usuariosAlumno = $usuarioDAO->seleccionarTodosUsuarios("WHERE tipoUsuario='3'");
        $conexion = $this->abrirConexion();
        $alumnos = array();
        for ($i = 0; $i < count($usuariosAlumno); $i++) {
            $sql = "SELECT * FROM alumno WHERE usuarioId=" . $usuariosAlumno[$i]->getIdUsuario();
            $lresult = $this->ejecutarConsulta($sql, $conexion);
            while ($fila = mysql_fetch_array($lresult)) {
                if ($grupo == $fila['Grupo']) {
                    $alumnos[$i] = new Alumno($usuariosAlumno[$i]->getIdUsuario(), $usuariosAlumno[$i]->getContrasena(), $usuariosAlumno[$i]->getNombre(),
                                    $usuariosAlumno[$i]->getApellidoP(), $usuariosAlumno[$i]->getApellidoM(), $usuariosAlumno[$i]->getMatricula(), $usuariosAlumno[$i]->getTipoUsuario(), $fila['Grupo'], $fila['idAlumno']);
                }
            }
        }
        $this->cerrarConexion($conexion);
        return $alumnos;
    }

}

?>
