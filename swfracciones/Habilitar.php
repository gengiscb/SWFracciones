<?php
include_once 'config.inc.php';
include_once 'sw/GestionPlantilla.php';
include_once 'sw/Sesion.php';
include_once '_ControladorActividades.php';

$sesion = new Sesion();
$sesion->filtro_login();
$gestorPlantilla = new GestionPlantilla();
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
        <?php
        ?>
        <link href="css/css_principal.css" rel="stylesheet" type="text/css" />            

        <script type="text/javascript" language="javascript" src="js/js_validaciones_eliminar.js"></script>
        <script type="text/javascript" src="js/jquery-1.6.4.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>        
        <script type="text/javascript" src="js/js_Habilitar.js"></script>     
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

            <h1>Actividad</h1>
            <div class="marco">

                <div class="tabla">
                    <form id="hab_form" method="post" action="_ControladorActividades.php">
                        <input type="hidden" name="ajax" value="hab"></input>
                        <table id="registro" cellpadding="0" cellspacing="0">
                            <tr>
                                <td> Actividad </td>                          	    
                                <td> <input type="text" name="actividad" disabled="disabled" value="<?php echo $_GET['cid']; ?>"/></td>
                                <input type="hidden" name="grupo"  value="<?php echo $_SESSION['grupo']; ?>"/>
                            </tr>
                            <tr>
                                <td> Fecha de Inicio: </td>                          	    
                                <td>
                                    <select name="select_dia" id="select_dia">
                                        <?php
                                        for ($i = 1; $i < 32; $i++) {
                                            if ($i == (date('d') - 1)) {
                                                echo '<option selected value="' . $i . '">' . $i . '</option>';
                                            } else {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select name="select_mes" id="select_mes">
                                        <option value="01" <?php if (date('m') == 1) echo "selected" ?> >Enero </option>
                                        <option value="02" <?php if (date('m') == 2) echo "selected" ?>>Febrero </option>
                                        <option value="03" <?php if (date('m') == 3) echo "selected" ?>>Marzo </option>
                                        <option value="04" <?php if (date('m') == 4) echo "selected" ?>>Abril </option>
                                        <option value="05" <?php if (date('m') == 5) echo "selected" ?>>Mayo </option>
                                        <option value="06" <?php if (date('m') == 6) echo "selected" ?>>Junio </option>
                                        <option value="07" <?php if (date('m') == 7) echo "selected" ?>>Julio </option>
                                        <option value="08" <?php if (date('m') == 8) echo "selected" ?>>Agosto </option>
                                        <option value="09" <?php if (date('m') == 9) echo "selected" ?>>Septiembre </option>
                                        <option value="10" <?php if (date('m') == 10) echo "selected" ?>>Octubre </option>
                                        <option value="11" <?php if (date('m') == 11) echo "selected" ?>>Noviembre </option>
                                        <option value="12" <?php if (date('m') == 12) echo "selected" ?>>Diciembre </option>
                                    </select> 
                                    <select name="anio" id="anio">
                                        <?php
                                        for ($i = date('y'); $i < date('y') + 3; $i++) {
                                            if ($i == date('y')) {
                                                echo '<option selected value="' . (2000 + $i) . '">' . (2000 + $i) . '</option>';
                                            } else {
                                                echo '<option value="' . (2000 + $i) . '">' . (2000 + $i) . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>

                                    <select name="hora" id="hora">
                                        <?php
                                        for ($i = 0; $i < 24; $i++) {
                                            if ($i == (date('h'))) {
                                                echo '<option selected value="' . $i . '">' . $i . '</option>';
                                            } else {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        }
                                        ?>

                                    </select>:
                                    <select name="min" id="min">
                                        <option value="00">00</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>


                                    </select></td>
                            </tr>
                            <tr>
                                <td> Fecha de Finalizacion: </td>
                                <td> 
                                    <select name="select_diaFin" id="select_diaFin">
                                        <?php
                                        for ($i = 1; $i < 32; $i++) {
                                            if ($i == (date('d'))) {
                                                echo '<option selected value="' . $i . '">' . $i . '</option>';
                                            } else {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select name="select_mesFin" id="select_mesFin">
                                        <option value="01" <?php if (date('m') == 1) echo "selected" ?> >Enero </option>
                                        <option value="02" <?php if (date('m') == 2) echo "selected" ?>>Febrero </option>
                                        <option value="03" <?php if (date('m') == 3) echo "selected" ?>>Marzo </option>
                                        <option value="04" <?php if (date('m') == 4) echo "selected" ?>>Abril </option>
                                        <option value="05" <?php if (date('m') == 5) echo "selected" ?>>Mayo </option>
                                        <option value="06" <?php if (date('m') == 6) echo "selected" ?>>Junio </option>
                                        <option value="07" <?php if (date('m') == 7) echo "selected" ?>>Julio </option>
                                        <option value="08" <?php if (date('m') == 8) echo "selected" ?>>Agosto </option>
                                        <option value="09" <?php if (date('m') == 9) echo "selected" ?>>Septiembre </option>
                                        <option value="10" <?php if (date('m') == 10) echo "selected" ?>>Octubre </option>
                                        <option value="11" <?php if (date('m') == 11) echo "selected" ?>>Noviembre </option>
                                        <option value="12" <?php if (date('m') == 12) echo "selected" ?>>Diciembre </option>
                                    </select> 
                                    <select name="anioFin" id="anioFin">
                                        <?php
                                        for ($i = date('y'); $i < date('y') + 3; $i++) {
                                            if ($i == date('y')) {
                                                echo '<option selected value="' . (2000 + $i) . '">' . (2000 + $i) . '</option>';
                                            } else {
                                                echo '<option value="' . (2000 + $i) . '">' . (2000 + $i) . '</option>';
                                            }
                                        }
                                        ?>

                                    </select>
                                    <select name="horaFin" id="horaFin">
                                        <?php
                                        for ($i = 0; $i < 24; $i++) {
                                            if ($i == (date('h'))) {
                                                echo '<option selected value="' . ($i) . '">' . ($i) . '</option>';
                                            } else {
                                                echo '<option value="' . ($i) . '">' . ($i) . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>:
                                    <select name="minFin" id="minFin">
                                        <option value="00">00</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>

                                    </select>
                                </td>
                                </td>
                                <tr>
                                    <td>
                                        <input type="hidden" name="actividad" value="<?php echo $_GET['cid']; ?>"/>
                                        <input type="submit"  name="btn_habilitar" class="boton"  id="verde" value="Habilitar"/>
                                    </td>
                                    <td>
                                        <input  type="button" value="Volver" class="boton" id="naranja" onclick="javascript:window.history.go(-1);"/>
                                    </td>
                                </tr>
                        </table>
                    </form>
                </div>
            </div>
    </body>
</html>