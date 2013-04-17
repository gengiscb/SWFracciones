<?php
include_once 'ConexionGeneral.php';
include_once '/sw/domain/Usuario.php';
/**
 * Clase: 
 * Descripcion: Esta clase se encarga de 
 * Requisitos relacionados:
 * -
 */
class UsuarioDAO extends ConexionGeneral {

    public function seleccionarUsuarioPorMatricula($usuarioMatricula) {
        $conexion=$this->abrirConexion();        
        $sql = "SELECT * FROM usuarios WHERE matricula ='" . mysql_real_escape_string($usuarioMatricula) . "'";
//        echo $sql;
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $usuario=null;
        while ($fila = mysql_fetch_array($resultado)) {
            $usuario = new Usuario($fila["usuarioId"],$fila["contrasenia"], $fila["nombre"], $fila["apellidoP"], $fila["apellidoM"], $fila["matricula"], $fila["tipoUsuario"]);
            return $usuario;
        }
        $this->cerrarConexion($conexion);        
        return $usuario;
    }

    public function insertarUsuario($contrasena, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario) {
        $registroExitoso = false;
        $conexionDB = $this->abrirConexion();
        $sql = "INSERT INTO USUARIOS (nombre,apellidoP,apellidoM,matricula,contrasenia,tipoUsuario) VALUES (\"" . $nombre .
                "\",\"".$apellidoP."\", \"" . $apellidoM . "\",\"" . $matricula . "\", \"" . $contrasena . "\"," . $tipoUsuario . ");";
        //echo $sql;
        if ($this->ejecutarConsulta($sql, $conexionDB)) {
            $registroExitoso = true;
        }
        $this->cerrarConexion($conexionDB);
        return $registroExitoso;
    }

    public function actualizarInformacionUsuario($usuarioId, $nombre, $apellidoP, $apellidoM,$contrasenia) {
        $conexion = $this->abrirConexion();        
        $query = "UPDATE usuarios SET nombre = '" . $nombre . "', apellidoP ='" . $apellidoP . "', apellidoM = '" . $apellidoM . "', contrasenia='" . $contrasenia . "' WHERE usuarioId = " . $usuarioId . "";
        
        $resultado = $this->ejecutarConsulta($query, $conexion);
        $this->cerrarConexion($conexion);
        return $resultado;
    }

    public function seleccionarTodosUsuarios($condicion) {
        $conexion = $this->abrirConexion();        
        $sql = "SELECT * FROM usuarios $condicion ORDER BY nombre ASC";
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
//        echo $sql;
        $indice = 0;
        $usuarios = array();
        while ($fila = mysql_fetch_array($resultado_peticion)) {          
            $usuarios[$indice] = new Usuario($fila['usuarioId'],$fila["contrasenia"], $fila["nombre"], $fila["apellidoP"], $fila["apellidoM"], $fila["matricula"], $fila["tipoUsuario"]);            
            $indice++;
        }
        $this->cerrarConexion($conexion);
        return $usuarios;
    }

    public function borrarUsuario($usuarioId) {
        $conexion = $this->abrirConexion();
        $usuarioEliminado = false;
        $query = "DELETE FROM usuarios 
            WHERE usuarioId = '" . mysql_real_escape_string($usuarioId) . "'";
//        echo $query;
        $resultado = $this->ejecutarConsulta($query, $conexion);
        if (!$resultado) {
            $cerror = "Ocurrió un error al acceder a la base de datos.<br>";
            $cerror .= "SQL: $query <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        } else {
            if (mysql_affected_rows($conexion) >= 1)
                $usuarioEliminado = true;
        }
        $this->cerrarConexion($conexion);
        return $usuarioEliminado;
    }

    public function existeUsuario($matricula) {
        $conexion = $this->abrirConexion();
        $existeUsuario = true;
        $query = "SELECT * FROM usuarios WHERE matricula = '" . mysql_real_escape_string($matricula) . "'";
        $lresult = $this->ejecutarConsulta($query, $conexion);
        if (!$lresult) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $query <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        } else {
            if (mysql_num_rows($lresult) === 0)
                $existeUsuario = false;
        }        
        return $existeUsuario;
    }
}

?>
