<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/Sesion.php';
include_once '_ControladorActividades.php';
$sesion = new Sesion();
$sesion->filtro_login();
$gestorPlantilla = new GestionPlantilla();
$controladorActividades = new _ControladorActividad();
$idActividad = $_GET['idAct'];
$idAlumno = $_GET['usuarioId'];
if (!$controladorActividades->comprobarIntentos($idActividad, $idAlumno)) {
    header("Location:  principal_alumno.php");
}
?>      
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Principal</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />         
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />
        <link href="css/css_vista_actividad_alumno.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.6.4.js"></script>
        <script type="text/javascript" src="js/ajaxActividad1.js"></script>
        <?php
        $gestorArctividad = $controladorActividades->obtenerActividad();

        if (!isset($_GET['int'])) {
            $controladorActividades->incrementarIngresos($idActividad, $idAlumno);
        }
        if ($gestorArctividad != null) {
            echo $gestorArctividad->getActividadCSS();
        } else {
            header('Location: principal_alumno.php');
        }
        ?>

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
        <div class="contenido" id ="contenedor">
            <h1 id="h1">
                <?php
                echo $gestorArctividad->getNombreActividad();
                ?>

            </h1>
            <div id="actividad" >
                <?php
                echo $gestorArctividad->getIntrucciones();
                ?>
                <div id="contenedorAct" >
                    <?php
                    echo $gestorArctividad->getLightBox();
                    echo $gestorArctividad->getActividadHTML();
                    ?>
                </div>
                <?php
                echo $gestorArctividad->getHtmlResponder(1);
                echo $gestorArctividad->getActividadJS();
                ?>
                <input type="button" class="boton" value="Regresar" onclick="javascript:window.history.go(-1);"/>
            </div>

        </div>
    </body>
</html>
