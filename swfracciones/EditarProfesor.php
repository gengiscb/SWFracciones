<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/DB/ConexionGeneral.php';
include_once 'sw/Sesion.php';
include_once 'ControladorProfesor.php';
    filtro_login();
    $gestorPlantilla = new GestionPlantilla();
    $controladorServicioProfesor = new ControladorProfesor();
    $controladorServicioProfesor->eliminarProfesorProf();
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
        <!--<script type="text/javascript" language="javascript" src="js/js_index.js" ></script>-->
        <!--<script type="text/javascript" language="javascript" src="js/js_validarRegistro.js" ></script>-->
        <script type="text/javascript" language="javascript" src="js/js_validaciones_eliminar.js" ></script>
    </head>
    <body>    
        <div class="banner">
            <div class="encabezado" id="encabezado">
                <div class="mini_perfil">
                    <?php
                    $gestorPlantilla->generarEncabezadoHTML();
                    $gestorPlantilla->generarMenu();
                    
                    
                    //echo $_SESSION['matricula'];
                    ?>
                    <div class="slogan"><a href="index.php">SWFRACCIONES</a></div>
                    <div class="clearboth"></div>        
                </div>         
            </div>
        </div>
        <div class="contenido">
            <div class="marco_registro">            
                <div class="form_registro">
                    <h1>Registro</h1>

                    <!--                    include_php/_gestion_login.php-->
                    <form  method="get"  action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <?php echo trim($controladorServicioProfesor->actualizarProfesorC());
                        $profesor = $controladorServicioProfesor->obtenerProfesorC();
                        ?>
                        <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['usuarioId']?>"/>
                        <table id="registro" cellpadding="0" cellspacing="0">

                            <tr>
                                <td> Nombre(s):</td>                          	    
                                <td> <input type="text" name="nombre" id="nombre" value="<?php echo $profesor->getNombre() ?>"/></td>
                            </tr>

                            <tr>
                                <td>Apellido Paterno:</td>  
                                <td> <input type="text" name="apellidoP" id="apellidoP" value="<?php echo $profesor->getApellidoP() ?>"/></td>
                            </tr>

                            <tr>
                                <td> Apellido Materno:</td> 
                                <td> <input type="text" name="apellidoM" id="apellidoM" size="20" maxlength="46"  value="<?php echo $profesor->getApellidoM() ?>"/></td>
                            </tr>


                            <tr>
                                <td> Matricula:</td>    
                                <td> <input type="text" name="matricula" id="matricula" size="20" maxlength="46"  value="<?php echo $profesor->getMatricula() ?>"/></td>
                            </tr>

                            <tr>
                                <td>Contrase&ntilde;a:</td>  
                                <td> <input type="password" name="contrasena" id="password" value="<?php echo $profesor->getContrasena() ?>"/></td>
                            </tr>
                            <tr>
                                <td>Confirma tu contrase&ntilde;a:</td>
                                <td><input type="password"  name="ccontrasena" id="cpassword" value="<?php echo $profesor->getContrasena() ?>" /></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <input type="hidden" name="grupo" value="<?php echo $profesor->getIdProfesor() ?>"/>
                                <input type="hidden" name="actualizar_profesor" value="registrar"/>                                
                                <td ><input type="submit" class="boton" id="registrar" value="Guardar"/></td>
                                <td><a onclick = "confirmarEliminacionProfesorProf(<?php echo $profesor->getIdUsuario() ?>)" href="#"><input class="boton" type="button" value="Eliminar Cuenta" ></input></a></td>
                                
                            </tr>                    
                        </table>
                    </form>
                </div>
            </div>
            
        </div>
    </body>
</html>
