<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
;
include_once 'sw/GestionPlantilla.php';
$sesion = new Sesion();
$sesion->sesionActiva();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Login</title>
        <link href="css/css_plantilla.css" rel="stylesheet" type="text/css" />
        <link href="css/css_plantilla_v3.css" rel="stylesheet" type="text/css" />
        <link href="css/css_login.css" type="text/css" rel="stylesheet"  />
        <script type="text/javascript" language="javascript" src="js/js_index.js" ></script>
    </head>
    <body>    
        <div class="banner">
            <div class="encabezado" id="encabezado">
                <div class="mini_perfil">
                    <div class="slogan"><a href="index.php">Bienvenido</a></div>
                    <div class="clearboth"></div>        
                </div>         
            </div>
        </div>
        <div class="contenido">
            <div class="marco">            
                <div class="form_login">
                    <h1>Iniciar Sesi&oacute;n</h1>
                    <?php
                    echo $sesion->iniciarSesion();
                    ?>
                    <!--                    include_php/_gestion_login.php-->
                    <form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                        <table>
                            <tr>
                                <td><label for="usuario">Usuario :<span>(Matr&iacute;cula)</span></label></td>                          	
                            </tr>
                            <tr>
                                <td><input type="text" id="usuario" name="matricula"/></td>
                            </tr>
                            <tr>
                                <td><label for="password">Contrase&ntilde;a : </label></td>                          	
                            </tr>
                            <tr>
                                <td><input type="password" id="password" name="contrasena" /></td>
                            </tr>
                            <tr>
                                <td></td>                            
                            </tr>
                            <tr>
                                <input type="hidden" name="login" value="login"/>
                                <td ><input type="submit" class="boton"  id="acceder" value="Iniciar sesi&oacute;n" name="btn_sesion"/></td>
                            </tr>                    
                        </table>
                    </form>
                </div>
            </div>
            <div  class="marco">                
                <h2>¿Nuevo Profesor?</h2>
                <span id="span_registro"><a href="RegistroProfesor.php">Registrate aqui!</a></span>
            </div>
        </div>
    </body>
</html>
