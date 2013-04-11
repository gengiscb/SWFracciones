<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'ConexionGeneral.php';
include_once '/sw/domain/Actividad.php';

class ActividadDAO extends ConexionGeneral {

    public function listarActividadesAlumnos($idAlumno) {
        $conexion = $this->abrirConexion();
        
        $sql = "SELECT * FROM  `actividadesalumno` JOIN `actividades`  ON `actividadesalumno`.`idActividad` = `actividades`.`idActividad` WHERE  `actividadesalumno`.`idAlumno` = $idAlumno  ORDER BY `actividadesalumno`.`fechaInicio` ASC";
//echo $sql;
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        $indice = 0;
        $lista = array();
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            $lista[$indice] = $fila;
            $indice++;
        }
        $this->cerrarConexion($conexion);
        return $lista;
    }

    public function listarActividadesProfesor() {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM  actividades";
        $resultado_peticion = $this->ejecutarConsulta($sql, $conexion);
        $indice = 0;
        $lista = array();
        while ($fila = mysql_fetch_array($resultado_peticion)) {
            $lista[$indice] = $fila;
            $indice++;
        }
        $this->cerrarConexion($conexion);
        return $lista;
    }

    public function actividadHabilitable($idActividad, $grupo){
        $habilitada = true;
        $conexionDB = $this->abrirConexion();
            $sql = "Select * from actividadesalumno join alumno on actividadesalumno.idalumno = alumno.usuarioid where grupo=$grupo and   idactividad=$idActividad    ";
//            echo $sql;
            $resultado = $this->ejecutarConsulta($sql, $conexionDB);
            $num_filas = mysql_num_rows($resultado);
            
            if($num_filas>0){
                $habilitada = false;
            }
        $this->cerrarConexion($conexionDB);
        return $habilitada;
    }


    public function actualizarEstadoActividad($idActividad, $grupo, $fechaInicio, $fechaFinalizacion) {
        $habilitada = false;
        $idAlumno = $this->obtenerAlumnos($grupo);
        $conexionDB = $this->abrirConexion();
        for ($i = 0; $i < count($idAlumno); $i++) {
            $sql = "INSERT INTO actividadesalumno (idActividad,idAlumno,ingresos,estado,intentos,fechaInicio, fechaFinalizacion, Aciertos, Fallos) VALUES (\"" . $idActividad . "\",\"" . $idAlumno[$i]['usuarioId'] . "\", \"0\",\"Habilitada\", \"0\",\"" . $fechaInicio . "\",\"" . $fechaFinalizacion . "\",\"0\",\"0\");";
            $resultado = $this->ejecutarConsulta($sql, $conexionDB);
            if (!$resultado) {
                $habilitada = true;
            }
        }
        $this->cerrarConexion($conexionDB);
        return $habilitada;
    }

    public function deshabilitarActividad($grupo, $idAc) {
        $deshabilitada = true;
//	 $grupo = $_SESSION["grupo"];
        $idAlumno = $this->obtenerAlumnos($grupo);
        $conexion = $this->abrirConexion();

        for ($i = 0; $i < count($idAlumno); $i++) {
            $query = "UPDATE  actividadesalumno SET  estado =  'Deshabilitada' 
            WHERE  idAlumno =" . $idAlumno[$i]['usuarioId'] . " AND idActividad=" . $idAc;
            $resultado = $this->ejecutarConsulta($query, $conexion);
            if (!$resultado) {
                $cerror = "No fue posible recuperar la información de la base de datos.<br>";
                $cerror .= "SQL: $query <br>";
                $cerror .= "Descripción: " . mysql_error($conexion);
                die($cerror);
                $deshabilitada = false;
            }
        }
        $this->cerrarConexion($conexion);

        return $deshabilitada;
    }

//Asciertos
    public function incrementarAsciertos($idActividad, $idAlumno) {
        $conexion = $this->abrirConexion();
        $query = "UPDATE actividadesalumno SET aciertos = (aciertos + 1), estado='Finalizada' WHERE idActividad =" . $idActividad . " AND idAlumno=" . $idAlumno . "";
//        echo $query;
        $resultado = $this->ejecutarConsulta($query, $conexion);
        $this->cerrarConexion($conexion);
    }
    public function incrementarFallos($idActividad, $idAlumno) {
        $conexion = $this->abrirConexion();
        $query = "UPDATE actividadesalumno SET fallos = (fallos + 1) WHERE idActividad =" . $idActividad . " AND idAlumno=" . $idAlumno . "";
//        echo $query;
        $resultado = $this->ejecutarConsulta($query, $conexion);
        $this->cerrarConexion($conexion);
    }

    public function incrementarIntentos($idActividad, $idAlumno) {
        $conexion = $this->abrirConexion();
        $query = "UPDATE actividadesalumno SET intentos = (intentos + 1) WHERE idActividad =" . $idActividad . " AND idAlumno=" . $idAlumno . "";
//        echo $query;
        $resultado = $this->ejecutarConsulta($query, $conexion);
        $this->cerrarConexion($conexion);
    }
    public function reiniciarIntentos($idActividad, $idAlumno) {
        $conexion = $this->abrirConexion();
        $query = "UPDATE actividadesalumno SET intentos = 0 WHERE idActividad =" . $idActividad . " AND idAlumno=" . $idAlumno . "";
//        echo $query;
        $resultado = $this->ejecutarConsulta($query, $conexion);
        $this->cerrarConexion($conexion);
    }
    public function incrementarIngresos($idActividad, $idAlumno) {
        $conexion = $this->abrirConexion();
        $query = "UPDATE actividadesalumno SET ingresos = (ingresos + 1), intentos = 0 WHERE idActividad =" . $idActividad . " AND idAlumno=" . $idAlumno . "";
        $resultado = $this->ejecutarConsulta($query, $conexion);
        $this->cerrarConexion($conexion);
    }

    public function obtenerAlumnos($grupo) {
        $indice = 0;
        $conexion = $this->abrirConexion();
        $query = "SELECT usuarioId FROM alumno WHERE grupo = " . $grupo . "";
        $resultado = $this->ejecutarConsulta($query, $conexion);
        $lista= array();
        if (!$resultado) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $query <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        } else {

            while ($fila = mysql_fetch_array($resultado)) {
                $lista[$indice] = $fila;
                $indice++;
            }
        }
        $this->cerrarConexion($conexion);
        return $lista;
    }

    public function obtenerNumeroIntentos($idActividad, $idAlumno) {
        $conexion = $this->abrirConexion();
        $intentos = 0;
        $query = "SELECT intentos FROM actividadesalumno WHERE idActividad = " . $idActividad . " AND idAlumno=" . $idAlumno . "";
        $resultado = $this->ejecutarConsulta($query, $conexion);
        if (!$resultado) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $query <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        } else {
            if (mysql_num_rows($resultado) > 0) {
                while ($datos = mysql_fetch_array($resultado)) {
                    $intentos = $datos["intentos"];
                }
            }
            mysql_free_result($resultado);
            return $intentos;
        }
    }

    public function obtenerEstadoActividad($idActividad, $idAlumno) {
        $estado = "";
        $conexion = $this->abrirConexion();
        $query = "SELECT estado FROM actividadesalumno WHERE idActividad = " . $idActividad . " AND idAlumno=" . $idAlumno . "";
        $resultado = $this->ejecutarConsulta($query, $conexion);
        if (!$resultado) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $query <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        } else {
            if (mysql_num_rows($resultado) > 0) {
                while ($datos = mysql_fetch_array($resultado)) {
                    $estado = $datos["estado"];
                }
            }
            mysql_free_result($resultado);
            return $estado;
        }
    }

    public function iniciarActividad($idActividad, $idAlumno) {
        $conexion = $this->abrirConexion();
        $query = "UPDATE actividadesalumno SET estado = 'Iniciada' WHERE idActividad =" . $idActividad . " AND idAlumno=" . $idAlumno . "";
        $resultado = $this->ejecutarConsulta($query, $conexion);
        if (!$resultado) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $cquery <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        }
        $this->cerrarConexion($conexion);
    }

    public function finalizarActividad($idActividad, $idAlumno) {

        $conexion = $this->abrirConexion();

        $query = "UPDATE actividadesalumno SET estado = 'Finalizado' WHERE idActividad = '$idActividad' AND idAlumno= '$idAlumno'";


        $resultado = $this->ejecutarConsulta($query, $conexion);


        if (!$resultado) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $query <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        }

        $this->cerrarConexion($conexion);
        echo $finalizada;
    }

    public function finalizadofecha() {        
        date_default_timezone_set('America/Mexico_City');
        $conexion = $this->abrirConexion();
        $fecha = date("Y-m-d H:i:s");
        $query = "UPDATE actividadesalumno SET estado = 'Finalizado' WHERE fechaFinalizacion < '" . $fecha . "'";
        $resultado = $this->ejecutarConsulta($query, $conexion);

        if (!$resultado) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $query <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        }

        $this->cerrarConexion($conexion);
    }

}

?>