<?php //
//include_once 'ControladorActividades.php';
//include_once 'sw/Sesion.php';
//$finalizarActividad = new ControladorActividad();
//$finalizarActividad-> finalizarActividad();
?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actividades</title>
</head>

<body>
<h1>Estoy viendo </h1>



<form method="get" action="<?//php echo $_SERVER["PHP_SELF"]; ?>">

<table id="registro" cellpadding="0" cellspacing="0">
                            <tr>
                                <td> idActividad </td>                          	    
                                <td> <input type="text" name="actividad" disabled="disabled" value="<?//php echo $_GET['cid']; ?>"/></td>
                            </tr>
                            <tr>
                                <td> Nombre: </td>                          	    
                                <td> <input type="text" name="grupo" disabled="disabled" value="<?//php echo $_GET['nombre']; ?>"/></td>
                            </tr>
                                <td> <input  type="button" value="Volver" onclick="location='ListarActividades.php'"/></td>
                            </tr>
                            <tr>
                            
                            
                                                                          
                        </table></form>
</body>
</html>-->
<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/Sesion.php';
include_once '_ControladorActividades.php';
filtro_login();
$gestorPlantilla = new GestionPlantilla();
$controladorActividades = new _ControladorActividad();
?>      
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Principal</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />         
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_vista_actividad_alumno.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.6.4.js"></script>
        <script language="javascript" src="js/js_vista_actividad_alumno.js"></script>
        <!--<script type="text/javascript" src="js/ajaxActividad1.js"></script>-->
        <?php
//        $controladorActividad = new _ControladorActividad();
        $gestorArctividad = $controladorActividades->obtenerActividad();
        $idActividad = $_GET['idAct'];
        $idAlumno = $_GET['usuarioId'];
        $controladorActividades->incrementarIngresos($idActividad, $idAlumno);
//        echo $controladorActividades->comprobarIntentos($idActividad, $idAlumno);
//        $controladorActividades->incrementarIntentos($idActividad, $idAlumno);
        if($gestorArctividad!=null){
            echo $gestorArctividad->getActividadCSS();
        }
        else {
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
            <h1>
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
                echo $gestorArctividad->getHtmlResponder(2);
//                echo $gestorArctividad->getActividadJS();
                ?>
            </div>

        </div>
    </body>
</html>
