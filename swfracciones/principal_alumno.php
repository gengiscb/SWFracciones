<?php
include_once 'sw/GestionPlantilla.php';
include_once 'sw/Sesion.php';
include_once '_ControladorActividades.php';

filtro_login();
$gestorPlantilla = new GestionPlantilla();
//$listarActividadAlumno = new ControladorActividad();
$controladorActividades  = new _ControladorActividad();

?>   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Actividades</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />         
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />    
        <link href="css/css_tablas.css" rel="stylesheet" type="text/css" />    
        
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />            
<!--        <script type="text/javascript" language="javascript" src="js/js_principal.js"></script>-->
        <script type="text/javascript" language="javascript" src="js/js_validaciones_eliminar.js"></script>
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

            <h1>Actividades Diaponibles</h1>
            <div class="marco">

                <div class="tabla">
              <form  method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>" > 
                    
                  <?php 
                  $controladorActividades->finalizadofecha();
                  echo $controladorActividades->listarActividadesAlumno();
//                             $finalizadoFecha = new ControladorActividad();
//                             $finalizadoFecha -> finalizadoFecha();?>
                     </form>
                     
                </div>

 
<div class="tabla"></div>




          </div>
        </div>
        <!--<div id="actividad"></div>-->
    </body>
</html>
