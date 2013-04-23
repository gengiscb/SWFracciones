<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/DB/ConexionGeneral.php';
include_once 'sw/Sesion.php';
include_once 'ControladorProfesor.php';
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
        <title>Editar Verfil::</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />
        <link href="css/css_login.css" type="text/css" rel="stylesheet"  />

        <link href="css/css_registro.css" type="text/css" rel="stylesheet"  />

        <script type="text/javascript" language="javascript" src="js/js_validarRegistro.js" ></script>
    </head>
    <body>    
        <div class="banner">
            <div class="encabezado" id="encabezado">

                <?php
                echo $gestorPlantilla->generarEncabezadoHTML();
                echo $gestorPlantilla->generarMenu();                
//                echo $_SESSION['matricula'];
                ?>

            </div>
        </div>
        <div class="contenido">
            <div class="marco_registro">            
                <div class="form_registro">
                    <h1>Edicion alumno</h1>
                    <?php echo $controladorServicioAlumno->actualizarAlumnoC();
                    $alumno = $controladorServicioAlumno->obtenerAlumnoC();
                     ?>
                    <!--                    include_php/_gestion_login.php-->
                    <form  method="post"  action="<?php echo $_SERVER['PHP_SELF'] . '?ver_perfil_alumno=ver_perfil&matricula=' . $alumno->getMatricula() ?>">                        
                        <table id="registro" cellpadding="0" cellspacing="0">
                            <tr>
                                <td> Nombre(s):</td>                          	    
                                <td> <input type="text" name="nombre" id="nombre" value="<?php echo $alumno->getNombre() ?>"/></td>
                            </tr>

                            <tr>
                                <td>Apellido Paterno:</td>  
                                <td> <input type="text" name="apellidoP" id="apellidoP" value="<?php echo $alumno->getApellidoP() ?>"/></td>
                            </tr>

                            <tr>
                                <td> Apellido Materno:</td> 
                                <td> <input type="text" name="apellidoM" id="apellidoM" size="20" maxlength="46"  value="<?php echo $alumno->getApellidoM() ?>"/></td>
                            </tr>


                            <tr>
                                <td> Matricula:</td>    
                                <td> <input type="text" disabled name="matricula" id="matricula" size="20" maxlength="46"  value="<?php echo $alumno->getMatricula() ?>"/></td>
                            </tr>

                            <tr>
                                <td>Contrase&ntilde;a:</td>  
                                <td> <input type="password" name="contrasena" id="password" value="<?php echo $alumno->getContrasena() ?>"/></td>
                            </tr>
                            <tr>
                                <td>Confirma tu contrase&ntilde;a:</td>
                                <td><input type="password"  name="ccontrasena" id="cpassword" value="<?php echo $alumno->getContrasena() ?>" /></td>
                            </tr>
                            <tr>
                                <td></td>                            
                            </tr>
                            <tr>
                                <input type="hidden" name="grupo" value="<?php echo $alumno->getGrupo() ?>"/>
                                <input type="hidden" name="usuarioID" value="<?php echo $alumno->getIdUsuario() ?>"/>
                                <input type="hidden" name="actualizar_alumno" value="actualizar"/>
                                <td colspan="2" ><input type="submit" class="boton" id="verde" value="Guardar"/><input type="button" onclick="javascript:window.history.go(-1);"  name="btn_regresar" class="boton"  id="naranja" value="Regresar"/></td>

                            </tr>                    
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
