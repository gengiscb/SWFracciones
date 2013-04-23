<?php

include_once 'config.inc.php';
/**
 * Clase: ConexionGeneral
 * Descripcion: Esta clase es la interfaz general de acceso a la base de datos.
 * Requisitos relacionados:
 * -Todos los accesos a base de datos
 */
class ConexionGeneral {

    public function abrirConexion() {
        $conexion = @mysql_connect($GLOBALS["servidor"], $GLOBALS["usuarioDB"], $GLOBALS["contrasenaDB"]) or
                die('<div class="error" style="font-family:Arial, Helvetica, sans-serif;font-size:20px;">Intente acceder en otro momento ERROR: " ' . mysql_error()) . '"</div>';
        $this->selecionarBD($conexion);
        return $conexion;
    }

    private function selecionarBD($conexion) {
        return @mysql_select_db($GLOBALS["base_datos"], $conexion);
    }

    public function ejecutarConsulta($query, $conexion) {
        return mysql_query($query, $conexion);
    }

    public function cerrarConexion($conexion) {
        return @mysql_close($conexion);
    }

}

?>