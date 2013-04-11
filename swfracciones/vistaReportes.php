<?php
include_once 'ControladorReportes.php';
include_once 'sw/GestionPlantilla.php';
$ctroladorReportes = new ControladorReportes();
include_once 'sw/Sesion.php';
filtro_login();

$gestorPlantilla = new GestionPlantilla();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Reporte Alumnos</title>        
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />         
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_tablas.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />            
        <script type="text/javascript" language="javascript" src="js/js_principal.js"></script>
        <script type="text/javascript" language="javascript" src="js/js_validaciones_eliminar.js"></script>

        <script type="text/javascript" src="js/_Gjquery.min.js"></script>
        <script type="text/javascript" src="js/js_grafica.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/js_reporte.js" ></script>
        <style type="text/css">
            @import "css/demo_table_jui.css";
            @import "js/themes/smoothness/jquery-ui-1.8.4.custom.css";
            @import "css/tabla.css";
        </style>


    </head>
    <body>
        <script src="js/highcharts.js"></script>
        <script src="js/themes/gray.js"></script>

        <div class="banner">
            <div class="encabezado">
                <?php
                echo $gestorPlantilla->generarEncabezadoHTML();
                echo $gestorPlantilla->generarMenu();
                //            echo generarMenuAdmin();;
                echo $_SESSION['grupo'];
                ?>  
            </div>       
        </div>
        <div class="contenido" >

            <h1>Lista de Alumnos</h1>
            <div class="marco">        


                <p align="center">Tabla Reporte Alumnos.</p>
                <div id= tabla style="OVERFLOW: auto;" >
                    <table id="datatables" class="display" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <?php
                                echo $ctroladorReportes->obtenerTitulosActividadesDisponibles();
                                ?>
                                <th>Avance Acumulado</th>
                                <th>Total Intentos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo $ctroladorReportes->obtenerHTMLTablaReporteProfesor();
                            ?>
                        </tbody>
                    </table>
                </div>
                <p align="center">Gráfico del Reporte de Alumnos</p>   
                <div id="grafico" style="width: 800px; height: 200px; margin: 0 auto"></div>
            </div></div>
    </body>
</html>