<?php
include_once 'ControladorActividades.php';
include_once 'sw/Sesion.php';
$finalizarActividad = new ControladorActividad();
$finalizarActividad->finalizarActividad();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sin t&iacute;tulo</title>
    </head>
    <body>
        <h1>Estoy viendo </h1>

        <?php
        $controladorActividad = new ControladorActividad();
        $idActividad = $_GET['idac'];
        $idAlumno = $_GET['idal'];
        if ($controladorActividad->comprobarIntentos($idActividad, $idAlumno)) {
            if ($controladorActividad->comprobarEstado($idActividad, $idAlumno)) {
                $controladorActividad->incrementarIntentos($idActividad, $idAlumno);
                $controladorActividad->iniciarActividad($idActividad, $idAlumno);
            }
            $controladorActividad->incrementarIngresos($idActividad, $idAlumno);
        } else {
            header("Location: VisualizarActividadesAlumnos.php");
            echo("<script>alert('Se agoto el numero de intentos')</script>");
        }
        ?>
        <form method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

            <table id="registro" cellpadding="0" cellspacing="0">
                <tr>
                    <td> Actividad </td>                          	    
                    <td> <input type="text" name="actividad" disabled="disabled" value="<?php echo $_GET['actividad']; ?>"/></td>
                </tr>
                <tr>
                    <td> Grupo: </td>                          	    
                    <td>
                        <input type="text" name="grupo" disabled="disabled" value="<?php echo $_GET['grupo']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td> Intentos: </td>
                    <td> 
                        <input type="text" name="intento" disabled="disabled" value="<?php echo $_GET['']; ?>"/>
                    </td>
                    </td>

                    <tr>
                        <td>

                            <input type="hidden" name="idActividad" value="<?php echo $_GET['idac']; ?>"/>

                            <input type="hidden" name="idAlumno" value="<?php echo $_GET['idal']; ?>"/>

                            <input type="submit"  name="btn_Finalizar" class="boton"  id="finalizar" value="Finalizar"/></td>
                    </tr>

            </table>
        </form>
    </body>
</html>