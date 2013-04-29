<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'ControladorAlumno.php';
include_once 'sw/Sesion.php';
$sesion = new Sesion();
$sesion->filtro_login();
$gestorPlantilla = new GestionPlantilla();
$controladorServicioAlumno = new ControladorAlumno();
?>      
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Principal</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />         
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />      
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />
        <link href="css/tabla.css" rel="stylesheet" type="text/css" />            
        <script type="text/javascript" language="javascript" src="js/js_validaciones_eliminar.js"></script>
       	<script type="text/javascript" src="js/_Gjquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/js_reporte.js" ></script>

        <style type="text/css">
            @import "css/demo_table_jui.css";
            @import "js/themes/smoothness/jquery-ui-1.8.4.custom.css";

        </style>
    </head>
    <body>
        <div class="banner">
            <div class="encabezado">
                <?php
                echo $gestorPlantilla->generarEncabezadoHTML();
                echo $gestorPlantilla->generarMenu();
                //            echo generarMenuAdmin();;
                $controladorServicioAlumno->eliminarAlumnoC();
                ?>  
            </div>       
        </div>
        <div class="contenido" >

            <h1 id="h1">Lista de Alumnos</h1>
            <div class="marco">

                <div id="tabla">
                    <a href="RegistroAlumno.php"><input type="button" class="boton" value="Agregar Alumno" id="verde"/></a>
                    <input type="hidden" name="obtener_Alumnos" value="obtener"></input>	
                    <table id="datatables" class="display">
                        <caption></caption>
                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Nombre</th>
                                <th>ApellidoP</th>
                                <th>ApellidoM</th>
                                <th>Grupo</th>
                                <th>Editar</th>
                                <th>Borrar</th>                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo $controladorServicioAlumno->tablaAlumnos();
                            ?>					
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--<div id="actividad"></div>-->
    </body>
</html>
