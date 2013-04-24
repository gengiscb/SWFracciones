<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class GestionPlantilla {

    function generarEncabezadoHTML() {
        return '
            <div class="mini_perfil">                
                <ul>
                <li><img src="img/usuarios/usuario.png" alt="Imagen usuario"/></li>
                </ul>
            </div>
            <div class="clearboth"></div>
            ';
    }

    function generarMenu() {
        if ($_SESSION['tipo'] == 2) {
            return $this->generarMenuProfesor();
        } elseif ($_SESSION['tipo'] == 3) {
            return $this->generarMenuAlumno();
        } elseif ($_SESSION['tipo'] == 1) {
            return $this->generarMenuAdmin();
        }
        return "ERROR...!!!!";
    }

    function generarMenuProfesor() {
        return '<div class="menu">
                <ul>
                    <li><a  href="principal_profesor.php">Principal</a></li>
                    <li class="categoria"><a href="ListarActividades.php">Actividades</a></li>                   
                    <li><a href="vistaReportes.php?idProfesor='.$_SESSION['grupo'].'">Reportes</a></li>
                    <li><a href="vistaAlumnos.php?obtener_Alumnos=obtener">Alumnos</a></li>
                    <li class="categoria"><a href="">Mi cuenta</a>
                        <ul>
                            <li><a href="EditarProfesor.php">Modificar</a></li>
                            <li><a href="sw/logout.php">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                    </li>
                   
                </ul>  
                <div class="clearboth"></div>                     
            </div>
'.$this->efectosMenu();
    }

    function generarMenuAlumno() {
                    return '<div class="menu" style="width:360px;">
                <ul>
                    <li><a  href="principal_alumno.php">Principal</a></li>
                    <li><a href="principal_alumno.php">Actividades</a></li>                    
                    <li class="categoria"><a href="">Mi cuenta</a>
                        <ul>
                            <li><a href="sw/logout.php">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                    </li>
                   
                </ul>  
                <div class="clearboth"></div>                     
            </div>
            
'.$this->efectosMenu();        
    }

    function generarMenuAdmin() {
  
        return '<div class="menu" style="width:480px;">
                <ul>
                    <li><a  href="principal.php">Principal</a></li>
                    <li><a href="RegistroProfesor.php">Registrar</a></li>
                    <li><a href="vistaProfesores.php?obtener_profesores=obtener">Profesores</a></li>
                    <li class="categoria"><a href="">Mi cuenta</a>
                        <ul>
                            <li><a href="sw/logout.php">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                    </li>
                   
                </ul>  
                <div class="clearboth"></div>                     
            </div>
'.$this->efectosMenu();
        
    }
	
	function efectosMenu(){
		return ''/*'<script>
            $(document).ready(function(){
    $(\'.menu li\').hover(function(){
            $(this).find(\'ul:first\').css({visibility: "visible",display: "none"}).fadeIn(400); // effect 1
            // $(this).find(\'ul:first\').css({visibility: "visible",display: "none"}).slideDown(400); // effect 2
        },function(){
            $(this).find(\'ul:first\').css({visibility: "hidden"});
        });
});</script>'*/;
	}

    function filtro_login() {
        session_start();
        if (isset($_SESSION['login'])) {
            $logueado = $_SESSION['login'];
            if (!$logueado) {
                header("Location: " . $GLOBALS['raiz_sitio'] . "index.php");
            }
        } else {
            header("Location: " . $GLOBALS['raiz_sitio'] . "index.php");
        }
    }

    function sesionActiva() {
        session_start();
        if (isset($_SESSION['login'])) {
            $logueado = $_SESSION['login'];
            if ($logueado) {
                header("Location: " . $GLOBALS['raiz_sitio'] . "principal.php");
            }
        }
    }

    function filtroLoginAdmin() {
        session_start();
        if (isset($_SESSION['login'])) {
            $logueado = $_SESSION['login'];
            if (!$logueado || $_SESSION['tipo'] == 0) {
                header("Location: " . $GLOBALS['raiz_sitio'] . "principal.php");
            }
        } else {
            header("Location: " . $GLOBALS['raiz_sitio'] . "index.php");
        }
    }

    function agregarCSSkMenuAdmin() {
//        if ($_SESSION['tipo'] == 1) {
            return '<link href="css/css_menu_adm.css" rel="stylesheet" type="text/css" />';
//        } else {
//            return '';
//        }
    }

    function estilo() {
        return'       <script language="JavaScript" src="js/js_estilos.js">
        </script>        
        <script language="JavaScript">
        <!--
//        EscribirEstilo(' . $_SESSION['usuarioId'] . ')
        //-->
        </script>';
    }

}

?>
