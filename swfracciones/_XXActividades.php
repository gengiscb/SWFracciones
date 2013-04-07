<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/Sesion.php';
include_once 'ControladorActividades.php';

filtro_login();
$gestorPlantilla = new GestionPlantilla();
$habilitarActividad = new ControladorActividad();
$habilitarActividad->habilitarActividad();
?>      
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Actividades</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />         
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_tablas.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />            
        <script type="text/javascript" language="javascript" src="js/js_principal.js"></script>
        <script type="text/javascript" language="javascript" src="js/js_validaciones_eliminar.js"></script>
        <?php
        function fecha() {
           $cadena = "<select name=\"select_dia\" id=\"select_dia\">
                           <option value=\"01\">01 </option>
                            <option value=\"02\">02 </option>
                            <option value=\"03\">03 </option>
                            <option value=\"04\">04 </option>
                            <option value=\"05\">05 </option>
                            <option value=\"06\">06 </option>
                            <option value=\"07\">07 </option>
                            <option value=\"08\">08 </option>
                            <option value=\"09\">09 </option>
                            <option value=\"10\">10 </option>
                            <option value=\"11\">11 </option>
                            <option value=\"12\">12 </option>
                            <option value=\"13\">13 </option>
                            <option value=\"14\">14 </option>
                            <option value=\"15\">15 </option>
                            <option value=\"16\">16 </option>
                            <option value=\"17\">17 </option>
                            <option value=\"18\">18 </option>
                            <option value=\"19\">19 </option>
                            <option value=\"20\">20 </option>
                            <option value=\"21\">21 </option>
                            <option value=\"22\">22 </option>
                            <option value=\"23\">23 </option>
                            <option value=\"24\">24 </option>
                            <option value=\"25\">25 </option>
                            <option value=\"26\">26 </option>
                            <option value=\"27\">27 </option>
                            <option value=\"28\">28 </option>
                            <option value=\"29\">29 </option>
                            <option value=\"30\">30 </option>
                            <option value=\"31\">31 </option>
                            
                            </select>
                            <select name=\"select_mes\" id=\"select_mes\">
                       <option value=\"01\">Enero </option>
                       <option value=\"02\">Febrero </option>
                       <option value=\"03\">Marzo </option>
                       <option value=\"04\">Abril </option>
                       <option value=\"05\">Mayo </option>
                       <option value=\"06\">Junio </option>
                       <option value=\"07\">Julio </option>
                       <option value=\"08\">Agosto </option>
                       <option value=\"09\">Septiembre </option>
                       <option value=\"10\">Octubre </option>
                       <option value=\"11\">Noviembre </option>
                       <option value=\"12\">Diciembre </option>
       	           </select> 
                    <select name=\"anio\" id=\"anio\">
                    <option value=\"2013\">2013</option>
                    <option value=\"2014\">2014</option>
                    <option value=\"2015\">2015</option>
                    <option value=\"2016\">2016</option>
                    <option value=\"2017\">2017</option>
                    </select>";
            return $cadena;
        }
        ?>    </head>
    <body>
        <div class="banner">
            <div class="encabezado">
                <?php
                echo $gestorPlantilla->generarEncabezadoHTML();
                echo $gestorPlantilla->generarMenu();

                echo "Grupo : ";
                echo $_SESSION['grupo'];
                echo "    Usuario : ";
                echo $_SESSION['usuarioId'];
                ?>  
            </div>       
        </div>
        <div class="contenido" >
            <h1>Habilitar Actividades</h1>
            <div class="marco">
                <div class="tabla">
                    <form  method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                        <table>
                            <tr>
                                <th>Actividad</th>
                                <th>Grupo</th>
                                <th>FechaInicio</th>
                                <th>FechaFinalizacion</th>
                                <th>Habilitar</th>
                            </tr>
                            <tr>
                                <th><select name="num_actividad" id="num_actividad">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select></th>
                                <th> <?php echo $_SESSION['grupo']; ?></th>
                                <th><?php echo date("d-m-Y"); ?></th>
                                <th><?php echo fecha(); ?></th>
                                <th><input type="submit"  name="btn_Actividad" class="boton"  id="acceder" value="Continuar"/></th>
                            </tr>
                        </table>
                    </form>   
                </div>
                <div class="tabla"></div>
            </div>
        </div>
        <!--<div id="actividad"></div>-->
    </body>
</html>
