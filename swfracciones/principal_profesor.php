<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/Sesion.php';
$sesion = new Sesion();
$sesion->filtro_login();
$gestorPlantilla = new GestionPlantilla();
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
        <script type="text/javascript" language="javascript" src="js/js_principal.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>  
    </head>
    <body>
        <div class="banner">
            <div class="encabezado">
                <?php
                echo $gestorPlantilla->generarEncabezadoHTML();
                echo $gestorPlantilla->generarMenu();
                ?>  
            </div>       
        </div>
        <div class="contenido" >
            <h1 id="h1">Bienvenido</h1>            
            <div class="marco">
                <div class="tabla">
                    <div class="marco">
                        <div class="tabla">
                            <a href="ListarActividades.php"><div class='clean-gray' id='profesor'>
                                    <br/><span class='text_act'>
                                            Gestión de Actividades
                                        </span>
                                        <span class='text_act'>
                                        </span>
                                        <br></br>
                                </div><br/></a>
                            <a href="vistaReportes.php?idProfesor= <?php echo $_SESSION['grupo'] ?>" ><div class='clean-gray' id='profesor'>
                                    <br/><span class='text_act'>
                                            Gestión de Reportes
                                        </span>
                                        <span class='text_act'>
                                        </span>
                                        <br></br>
                                </div><br/></a>
                                                        <a href="vistaAlumnos.php?obtener_Alumnos=obtener"><div class='clean-gray' id='profesor'>
                                    <br/><span class='text_act'>
                                            Gestión de alumnos
                                        </span>
                                        <span class='text_act'>
                                        </span>
                                        <br></br>
                                </div><br/></a>
                        </div>
                    </div>
                </div>
                <!--<div id="actividad"></div>-->
            </div>

        </div>

    </body>
</html>
