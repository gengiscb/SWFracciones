<?php
include_once 'ControladorActividades.php';
include_once 'sw/Sesion.php';
$finalizarActividad = new ControladorActividad();
$finalizarActividad-> finalizarActividad();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actividades</title>
</head>

<body>
<h1>Estoy viendo </h1>



<form method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

<table id="registro" cellpadding="0" cellspacing="0">
                            <tr>
                                <td> Actividad </td>                          	    
                                <td> <input type="text" name="actividad" disabled="disabled" value="<?php echo $_GET['actividdad']; ?>"/></td>
                            </tr>
                            <tr>
                                <td> Grupo: </td>                          	    
                                <td> <input type="text" name="grupo" disabled="disabled" value="<?php echo $_GET['grupo']; ?>"/></td>
                            </tr>
                            <tr>
                            	<td> Estado: </td>
                                <td> <input type="text" name="estado" disabled="disabled" value="<?php echo $_GET['estado']; ?>"/></td>
                            </tr>
                            
                            <tr>
                                <td> <input  type="button" value="Volver" onclick="location='ListarActividades.php'"/></td>
                            </tr>
                            <tr>
                            
                            
                                                                          
                        </table></form>
</body>
</html>
