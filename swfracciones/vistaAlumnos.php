<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'ControladorAlumno.php';
include_once 'sw/Sesion.php';
filtro_login();

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
        <script type="text/javascript">
            var parametro_prof_id = "<?php echo '?idProfesor='.$_SESSION['grupo'].'&grf=o' ?> " ;
            
        </script>
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />            
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
                $controladorServicioAlumno->eliminarAlumnoC();
                echo $_SESSION['grupo'];
                ?>  
            </div>       
        </div>
        <div class="contenido" >

            <h1 id="h1">Lista de Alumnos</h1>
            <div class="marco">

                <div id="tabla">
                    <input type="hidden" name="obtener_Alumnos" value="obtener"></input>
                    <a href="RegistroAlumno.php"><input type="button" class="boton" value="Agregar Alumno" id="verde"/></a>
                    <table id="datatables" class="display">
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
$alumnos=$controladorServicioAlumno->obtenerAlumnosC();
    $SALTO = "\n";
    $cadena_post = "";
    $index = 1;
//    echo count($alumnos).$_SESSION['grupo'];
foreach($alumnos as $alumno) {
        $class = "";
        if ($index % 2 == 0)
        $class = "par";
        
        $cadena_post .='            <tr>' . $SALTO;
        $cadena_post .='                <td>' . $alumno->getIdAlumno() . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $alumno->getNombre() . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $alumno->getApellidoP(). '</td>' . $SALTO;
        $cadena_post .='                <td>' . $alumno->getApellidoM() . '</td>' . $SALTO;
        $cadena_post .='                <td>' . $alumno->getGrupo() . '</td>' . $SALTO;
        $cadena_post .='                <td class="editar"><a href="EditarAlumno.php?ver_perfil_alumno=ver_perfil&matricula=' . $alumno->getMatricula() . '"><img src="img/utileria/editar.png" alt="Editar"/></a></td>' . $SALTO;
        //href="adm_producto_borrar.php?productoId='.$producto['productoId'].'"
        $cadena_post .='               	<td class="borrar"><a onclick = "confirmarEliminacionUsuario(' . $alumno->getIdUsuario() . ')" href="#"><img src="img/utileria/borrar.png" alt="Borrar"/></a></td>' . $SALTO;
//            $cadena_post .='                </td>'.$SALTO;
        $cadena_post .='            </tr>' . $SALTO;
        $index++;
    }
    if ($cadena_post == "") {
        $cadena_post .="<tr><td colspan='4'>No hay alumnos registrados</td></tr>" . $SALTO;
    }
    echo $cadena_post;

?>					</tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--<div id="actividad"></div>-->
    </body>
</html>
