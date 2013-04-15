<?php
include_once 'ConexionGeneral.php';

class ReporteDAO extends ConexionGeneral {
    public function __construct() {
        
    }
    function obtenerActividadesAlumnosDeProfesor($idProfesor) {
       $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM `actividadesalumno` JOIN `usuarios` JOIN `alumno`  ON `actividadesalumno`.`idAlumno` = `alumno`.`usuarioId` AND `alumno`.`usuarioId` = `usuarios`.`usuarioId` AND alumno.grupo=$idProfesor";
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        $filas = array();
        while ($r = mysql_fetch_assoc($resultado_peticion)) {
            $filas[count($filas)] = $r;
        }
        $this->cerrarConexion($conexion);
        return $filas;
    }

//$sth = mysql_query("SELECT `ingresos`,`intentos`
//FROM `actividadesalumno` JOIN `usuarios` JOIN `alumno` 
//ON `actividadesalumno`.`idAlumno` = `alumno`.`usuarioId`
//AND `alumno`.`usuarioId` = `usuarios`.`usuarioId`");
    function obtenerDatosTablaReporte($idProfesor){
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM `actividadesalumno` JOIN `usuarios` JOIN `alumno`  ON `actividadesalumno`.`idAlumno` = `alumno`.`usuarioId` AND `alumno`.`usuarioId` = `usuarios`.`usuarioId` where alumno.grupo=$idProfesor";        
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $indice =0 ; 
        $filas = array();
        while($fila = mysql_fetch_array($resultado)){
            $filas[$indice] = $fila;
            $indice++;
        }
        mysql_close($conexion);
        return $filas;
    }
    
}

?>