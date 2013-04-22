<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'ControladorProfesor.php';
include_once 'sw/Sesion.php';
filtro_login();

$gestorPlantilla = new GestionPlantilla();
$controladorServicioProfesor = new ControladorProfesor();
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
        <script type="text/javascript">
            var parametro_prof_id = "<?php echo '?idProfesor='.$_SESSION['grupo'].'&grf=o' ?> " ;
            
        </script>          
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
        <script src="js/themes/dark-green.js"></script>
        <div class="banner">
            <div class="encabezado">
                <?php
                echo $gestorPlantilla->generarEncabezadoHTML();
                echo $gestorPlantilla->generarMenu();
                //            echo generarMenuAdmin();;
                $controladorServicioProfesor->eliminarProfesorC();
                ?>  
            </div>       
        </div>
        <div class="contenido" >
			
            <h1 id="h1">Lista de Profesores</h1>
            <div class="marco">

                <div class="tabla">
                    <?php
                    ?>
                    <input type="hidden" name="obtener_Alumnos" value="obtener"></input>
                    <table id="datatables" class="display">
                        <caption><a href="RegistroProfesor.php"><input type="button" class="boton" id="verde" value="Agregar Nuevo"/></a></caption>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>ApellidoP</th>
                            <th>ApellidoM</th>
                            <th>Grupo</th>                            
                            <th>Password</th>
                            <th>Borrar</th>                            
                        </tr>
<?php
//                            echo listarProductosConOpciones();
$profesores=$controladorServicioProfesor->obtenerProfesoresC();
    $SALTO = "\n";
    $cadena_post = "";
    $index = 1;
foreach($profesores as $profesor) {
        $class = "";
        if ($index % 2 == 0)
        $class = "par";
        
        $cadena_post .='            <tr class="' . $class . '">' . $SALTO;
        $cadena_post .='                <td>' . $profesor->getIdProfesor() . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $profesor->getNombre() . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $profesor->getApellidoP(). '</td>' . $SALTO;
        $cadena_post .='                <td>' . $profesor->getApellidoM() . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $profesor->getIdProfesor() . '</td>' . $SALTO;
        $cadena_post .='                <td>'.$profesor->getContrasena().'</td>' . $SALTO;
        //href="adm_producto_borrar.php?productoId='.$producto['productoId'].'"
        $cadena_post .='               	<td class="borrar"><a onclick = "confirmarEliminacionProfesor(' . $profesor->getIdUsuario() . ')" href="#"><img src="img/utileria/borrar.png" alt="Borrar"/></a></td>' . $SALTO;
//            $cadena_post .='                </td>'.$SALTO;
        $cadena_post .='            </tr>' . $SALTO;
        $index++;
    }
    if ($cadena_post == "") {
        $cadena_post .="<tr><td colspan='4'>No hay profesores registrados</td></tr>" . $SALTO;
    }
    echo $cadena_post;

?>
                    </table>
                </div>
            </div>
        </div>
        <!--<div id="actividad"></div>-->
    </body>
</html>
