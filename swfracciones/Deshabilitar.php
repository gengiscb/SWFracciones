<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/Sesion.php';
include_once '_ControladorActividades.php';

$sesion = new Sesion();
$sesion->filtro_login();
$gestorPlantilla = new GestionPlantilla();
$controladorServicioActividades = new _ControladorActividad();
$controladorServicioActividades->deshabilitarActividad();
?>      
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Principal</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />         
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_tablas.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />            
        <script type="text/javascript" language="javascript" src="js/js_validaciones_eliminar.js"></script>
        <script type="text/javascript" src="js/jquery-1.6.4.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>     
        <script type="text/javascript" src="js/js_dehabilitar.js"></script>  

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
            <h1>Actividad</h1>
            <div class="marco">
                <div class="tabla">
                    <form id ="deshab_form" method="post" action="_ControladorActividades.php">
                        <input type="hidden" name="grupo"  value="<?php echo $_SESSION['grupo']; ?>"/>
                        <input type="hidden" name="ajax" value="des"></input>
                        <input type="hidden" name="actividad"  value="<?php echo $_GET['cid']; ?>">
                            <table id="registro" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td> Actividad </td>                          	    
                                    <td> <input type="text" name="actividad" disabled="disabled" value="<?php echo $_GET['cid']; ?>"/></td>
                                </tr>
                                <tr>
                                    <td> Nombre </td>                          	    
                                    <td> <input type="text" name="actividad" disabled="disabled" value="<?php echo $_GET['nombre']; ?>"/></td>
                                </tr>
                                <tr>
                                    <td ><input type="submit" name="btn_desHabilitar" class="boton"  id="naranja" value="deshabilitar"/> </td>
                                    <td><input type="button" onclick = "javascript:window.history.go(-1);" class="boton"   value="Volver" id="naranja"/> </td>
                                </tr>                    
                            </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>


