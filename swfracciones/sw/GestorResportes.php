<?php

include_once 'DB/ReporteDAO.php';
include_once 'DB/_ActividadDAO.php';

class GestorResportes {

    //put your code here
    public function obtenerJSONDatosGraficaProfesor($idProfesor) {
        $reporteDao = new ReporteDAO();
        $datos = $reporteDao->obtenerActividadesAlumnosDeProfesor($idProfesor);
        return json_encode($datos, JSON_NUMERIC_CHECK);
    }

    public function obtenerTituloActividades() {
        $actDao = new ActividadDAO();
        $datos = $actDao->listarActividadesProfesor();
        $trTabla = "";
        for ($indice = 0; $indice < count($datos); $indice++) {
            $trTabla.= '<th>A Act' . $datos[$indice]['idActividad'] . '</th>';
            $trTabla.= '<th>F Act' . $datos[$indice]['idActividad'] . '</th>';
            $trTabla.= '<th>Ing Act' . $datos[$indice]['idActividad'] . '</th>';
            $trTabla.= '<th>Int Act' . $datos[$indice]['idActividad'] . '</th>';
        }
        return $trTabla;
    }

    public function obtenerHTMLTablaReportes($idProfesor) {
        $reporteDao = new ReporteDAO();
        $actDao = new ActividadDAO();
        $listActi = $actDao->listarActividadesProfesor();
        $datos = $reporteDao->obtenerDatosTablaReporte($idProfesor);
        $trTabla = "";
        $alumnosIds = array();
        for ($indice = 0; $indice < count($datos); $indice++) {
            
            if (!$this->estaElementoEnArray($datos[$indice]['idAlumno'], $alumnosIds)) {
                $alumnosIds[count($alumnosIds)] = $datos[$indice]['idAlumno'];
                $trTabla.= '<tr>';
                $trTabla.= '<td align="center">' . $datos[$indice]['idAlumno'] . '</td>';
                $trTabla.= '    <td align="center">' . $datos[$indice]['nombre'] . '</td>';
                $ingresos = 0 ; 
                $intentos = 0; 
                $asciertos = 0; 
                for ($i = 0; $i < count($listActi); $i++) {
                    $filaAct=null;
                    for ($f = 0; $f < count($datos); $f++) {
                        if(strcmp(trim($datos[$f]['idActividad']),trim($listActi[$i]['idActividad']))==0){
                            $filaAct = $datos[$f];
                        }
                    }
                    if (($filaAct)!=null) {
                        $ingresos+=trim($filaAct['ingresos'] );
                        $intentos+=trim($filaAct['intentos'] );
                        $asciertos += trim($filaAct['Aciertos'] ); 
                        $trTabla.= '    <td align="center">' . $filaAct['Aciertos'] . '</td>';
                        $trTabla.= '    <td align="center">' . $filaAct['Fallos'] . '</td>';
                        $trTabla.= '    <td align="center">' . $filaAct['ingresos'] . '</td>';
                        $trTabla.= '    <td align="center">' . $filaAct['intentos'] . '</td>';
                    } else {
                        $trTabla.= '    <td align="center">0</td>';
                        $trTabla.= '    <td align="center">0</td>';
                        $trTabla.= '    <td align="center">0</td>';
                        $trTabla.= '    <td align="center">0</td>';
                    }
                }
                $trTabla.= '    <td align="center">' . ( ($ingresos>0)?$asciertos/$ingresos*3:0). '</td>';
                $trTabla.= '    <td align="center">' . (( (($ingresos>0)?($ingresos - 1 ):0) * 3) + $intentos ). '</td>';
                $trTabla.= '</tr>';
            }
        }
        return $trTabla;
    }

    private function estaElementoEnArray($elemento, $array) {
        for ($a = 0; $a < count($array); $a++) {
            
            if (strcmp(trim($elemento), trim($array[$a]))==0) {
                return true;
            }
        }
        return false;
    }

}

?>
