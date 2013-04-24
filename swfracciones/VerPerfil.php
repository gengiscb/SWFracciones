<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/Sesion.php';
include_once 'ControladorAlumno.php';

$sesion = new Sesion(); 
$sesion->filtro_login();
$gestorPlantilla = new GestionPlantilla();
$controladorServicioAlumno = new ControladorAlumno();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Verfil::</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />
        <link href="css/css_login.css" type="text/css" rel="stylesheet"  />
		
        <link href="css/css_registro.css" type="text/css" rel="stylesheet"  />
		<script type="text/javascript" src="js/jquery.min.js"></script>  
        <script type="text/javascript" language="javascript" src="js/js_index.js" ></script>
    </head>
    <body>
        <div class="banner">
            <div class="encabezado" id="encabezado">

                <?php
                $gestorPlantilla->generarEncabezadoHTML();
                $gestorPlantilla->generarMenu();
                $alumno = $controladorServicioAlumno->obtenerAlumnoC();
                echo $_SESSION['matricula'];
                ?>                
            </div>
        </div>
        <div class="contenido">
            <div class="marco_registro">            
                <div class="form_registro">
                    <h1>Perfil</h1>
                    <form  method="get" action="EditarPerfil.php" >
                        <table id="registro" cellpadding="0" cellspacing="0">
                            <tr>
                                <td> Nombre(s):</td>                          	    
                                <td> <input type="text" name="nombre" disabled="disabled" value="<?php echo $alumno->getNombre(); ?>"/></td>
                            </tr>
                            <tr>
                                <td>Apellido Paterno:</td>
                                <td> <input type="text" disabled="disabled" name="apellidoP" value="<?php echo $alumno->getApellidoP() ?>"/></td>
                            </tr>
                            <tr>
                                <td> Apellido Materno:</td>   
                                <td> <input type="text" name="apellidoM" size="20" maxlength="46" disabled="disabled" value="<?php echo $alumno->getApellidoM() ?>"/></td>
                            </tr>
                            <tr>
                                <td> Matricula:</td>
                                <td> <input type="text" name="matricula" size="20" disabled="disabled" maxlength="46"  value="<?php echo $alumno->getMatricula() ?>"/></td>
                            </tr>
                            <tr>
                                <td> Grupo:</td>
                                <td> <input type="text" name="grupo" disabled="disabled" size="20" maxlength="46"  value="<?php echo $alumno->getGrupo() ?>"/></td>
                            </tr>
                            <tr>
                                <td>Contrase&ntilde;a:</td>   
                                <td> <input type="password"  disabled="disabled" name="password" value="<?php echo $alumno->getContrasena() ?>"/></td>
                            </tr>
<!--                            <tr>
                                <td>Confirma tu contrase&ntilde;a:</td>
                                <td><input type="password"  disabled="disabled" name="password" value="<?php echo $alumno->getContrasena() ?>" /></td>
                            </tr>-->
                            <tr>
                                <td></td>                            
                            </tr>
                            <tr>
                                <input type="hidden" name="login" value="login"/>
                                <td ><input type="submit" class="boton"   value="Editar"/> </td>
                            </tr>                    
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
