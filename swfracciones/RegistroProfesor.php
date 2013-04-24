<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/DB/ConexionGeneral.php';
include_once 'ControladorProfesor.php';
include_once 'sw/Sesion.php';

$gestionPlantilla = new GestionPlantilla();
$sesion = new Sesion();
$sesion->filtro_login_Excepcion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Registro</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />
        <link href="css/css_login.css" type="text/css" rel="stylesheet"  />
        <link href="css/css_registro.css" type="text/css" rel="stylesheet"  />
        <script type="text/javascript" language="javascript" src="js/jquery-1.6.4.js" ></script>
        <script type="text/javascript" language="javascript" src="js/jquery.form.js" ></script>
        <script type="text/javascript" language="javascript" src="js/js_validarRegistro.js" ></script>
    </head>
    <body>    
        <div class="banner">
            <div class="encabezado" id="encabezado">
                <?php
                if (isset($_SESSION['tipo']) && ($_SESSION['tipo']) == 1) {
                    echo $gestionPlantilla->generarEncabezadoHTML();
                    echo $gestionPlantilla->generarMenu();
                } else {
                    echo '     <div class="mini_perfil">
                    <div class="slogan"><a href="index.php">Registrate..</a></div>
                    <div class="clearboth"></div>        
                </div>         ';
                }
                ?>

            </div>
        </div>
        <div class="contenido">
            <div class="marco_registro">            
                <div class="form_registro">
                    <h1 class="alumno">Registro profesor</h1>
                    <?php
//                    	if($controladorServicioProfesor->agregaProfesorC());
                    ?>
                    <form id="form_reg_prof"  method="get" action="ControladorProfesor.php" >
                        <table class="registro" cellpadding="0" cellspacing="0">
                            <tr>
                                <td> Nombre(s):</td>  
                                <td> <input type="text" name="nombre" id="nombre" value=""/></td>
                            </tr>
                            <tr>
                                <td>Apellido Paterno:</td> 
                                <td> <input type="text" name="apellidoP" id="apellidoP" value=""/></td>
                            </tr>
                            <tr>
                                <td> Apellido Materno:</td>
                                <td> <input type="text" name="apellidoM" id="apellidoM" size="20" maxlength="46"  value=""/></td>
                            </tr>
                            <tr>
                                <td> Matr&iacute;cula:<span>(Usuario 6 caracteres)</span></td> 
                                <td> <input type="text" name="matricula" id="matricula" size="20" maxlength="46"  value=""/></td>
                            </tr>
                            <tr>
                                <td>Contrase&ntilde;a:</td>                          
                                <td> <input type="password" name="contrasena" id="password" value=""/></td>
                            </tr>
                            <tr>
                                <td>Confirma tu contrase&ntilde;a:</td>
                                <td><input type="password"  name="cpassword" id="cpassword" value="" /></td>
                            </tr>
                            <tr>                              
                                <td colspan="2">
                                    <input type="hidden" name="registrar_profesor" value="registrar"/>
                                    <input type="submit"  name="btn_registrar" class="boton"  id="verde" value="Registrar"/>
                                    <input type="button" onclick="document.location='index.php'"  name="btn_regresar" class="boton"  id="naranja" value="Regresar"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
