<?php

include_once 'DB/ReporteDAO.php';
include_once 'DB/_ActividadDAO.php';
/**
 * Clase: GestorResportes
 * Descripcion: Esta clase se encarga de gestionar la creacion de reportes.
 * Requisitos relacionados:
 * -RF-RE001
 * -RF-RE002
 * -RF-RE003
 */
class GestorResportes {

    //put your code here
    public function obtenerJSONDatosGraficaProfesor($idProfesor) {
        $reporteDao = new ReporteDAO();
        $actDao = new ActividadDAO();
        $datosY = array();
        $datosY['name'] = 'Nombre';
        $datosX = array();
        $datosX['name'] = 'AA';
        $listActi = $actDao->listarActividadesProfesor();
        $datos = $reporteDao->obtenerActividadesAlumnosDeProfesor($idProfesor);
        $alumnosIds = array();
        for ($indice = 0; $indice < count($datos); $indice++) {
            $fila = $datos[$indice];
            if (!$this->estaElementoEnArray($datos[$indice]['idAlumno'], $alumnosIds)) {
                $datosY['data'][] = $fila['idAlumno'];
                $alumnosIds[count($alumnosIds)] = $datos[$indice]['idAlumno'];
                $ingresos = 0;
                $totalPuntos = 0;
                $intentos = 0;
                $asciertos = 0;
                for ($i = 0; $i < count($listActi); $i++) {
                    $filaAct = null;
                    for ($f = 0; $f < count($datos); $f++) {
                        if (strcmp(trim($datos[$f]['idActividad']), trim($listActi[$i]['idActividad'])) == 0 && strcmp(trim($datos[$f]['idAlumno']), trim($datos[$indice]['idAlumno'])) == 0) {
                            $filaAct = $datos[$f];
                        }
                    }
                    if (($filaAct) != null) {
                        $ingresos+=trim($filaAct['ingresos']);
                        $intentos+=trim($filaAct['intentos']);
                        $asciertos += trim($filaAct['Aciertos']);
                        $totalPuntos +=($intentos > 0) ? $intentos : 1;
                    } else {
                        $totalPuntos +=1;
                    }
                }
                $datosX['data'][] = (($ingresos > 0) ? $asciertos / $totalPuntos : 0) * 100;
            }
        }

        $resultadoGrafico = array();
        array_push($resultadoGrafico, $datosY);
        array_push($resultadoGrafico, $datosX);
        return json_encode($resultadoGrafico, JSON_NUMERIC_CHECK);
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
                $ingresos = 0;
                $intentos = 0;
                $asciertos = 0;
                $fallos=0;
                $totalPuntos = 0;
                for ($i = 0; $i < count($listActi); $i++) {
                    $filaAct = null;
                    for ($f = 0; $f < count($datos); $f++) {
                        if (strcmp(trim($datos[$f]['idActividad']), trim($listActi[$i]['idActividad'])) == 0 && strcmp(trim($datos[$f]['idAlumno']), trim($datos[$indice]['idAlumno'])) == 0) {
                            $filaAct = $datos[$f];
                        }
                    }
                    if (($filaAct) != null) {
                        $ingresos+=trim($filaAct['ingresos']);
                        $intentos+=trim($filaAct['intentos']);
//                        $intentos+=trim($filaAct['Aciertos']);
                        $fallos += $filaAct['Fallos'] ;
                        $asciertos += trim($filaAct['Aciertos']);
                        $totalPuntos +=($intentos > 0) ? $intentos : 1;
                        $trTabla.= '    <td align="center">' . $filaAct['Aciertos'] . '</td>';
                        $trTabla.= '    <td align="center">' . $filaAct['Fallos'] . '</td>';
                        $trTabla.= '    <td align="center">' . $filaAct['ingresos'] . '</td>';
                        $trTabla.= '    <td align="center">' . $filaAct['intentos'] . '</td>';
                    } else {
                        $totalPuntos +=1;
                        $trTabla.= '    <td align="center">0</td>';
                        $trTabla.= '    <td align="center">0</td>';
                        $trTabla.= '    <td align="center">0</td>';
                        $trTabla.= '    <td align="center">0</td>';
                    }
                }
                $AA = ((($ingresos > 0) ? $asciertos / $totalPuntos : 0) * 100);
                $trTabla.= '    <td align="center">' .(round($AA * 100) / 100). '</td>';
                //(( (($ingresos > 0) ? ($ingresos - 1 ) : 0) * 3) + $intentos )
                $trTabla.= '    <td align="center">' . ($asciertos+$fallos). '</td>';
                $trTabla.= '</tr>';
            }
        }
        return $trTabla;
    }
    private function estaElementoEnArray($elemento, $array) {
        for ($a = 0; $a < count($array); $a++) {

            if (strcmp(trim($elemento), trim($array[$a])) == 0) {
                return true;
            }
        }
        return false;
    }
}
?>