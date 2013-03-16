<?php
include_once ('sw/DB/UsuarioDAO.php');
include_once ('DB/ProfesorDAO.php');
include_once 'domain/Usuario.php';
class Sesion {
    function iniciarSesion() {
        if (isset($_POST['login'])) {
            if (isset($_POST["matricula"])) {
                $matricula = $_POST["matricula"];
                if (isset($_POST["contrasena"])) {
                    $password = $_POST["contrasena"];
                    $usuarioDAO = new UsuarioDAO();
                    $usuario = $usuarioDAO->seleccionarUsuarioPorMatricula($matricula);                    
                    if ($usuario != null) {
                        if ($matricula == trim($usuario->getMatricula()) && $password == trim($usuario->getContrasena())) {
                            $_SESSION['login'] = true;
                            $_SESSION['usuarioId'] = $usuario->getIdUsuario();
                            $_SESSION['nombre'] = $usuario->getNombre();		                            $_SESSION['tipo'] = $usuario->getTipoUsuario();                            $_SESSION['matricula'] = $usuario->getMatricula();
                            if ($usuario->getTipoUsuario() == 3){
                                header("Location: principal_alumno.php");
                            } else if ($usuario->getTipoUsuario() == 2) {
                                $profesorDAO = new ProfesorDAO();
                                $usuario = $profesorDAO->seleccionarProfesorPorMatricula($matricula);
                                $_SESSION['grupo'] = $usuario->getIdProfesor();
                                echo $usuario->getApellidoM();
                                echo $usuario->getIdProfesor();
                                header("Location: principal_profesor.php");
                            } else if ($usuario->getTipoUsuario() == 1) {
                                header("Location: principal.php");
                            }
                        } else {
                            header("Location: index.php");
                        }
                    }else {
                        $_SESSION['login'] = false;
                        return "<div class='error'>Contrase&ntilde;a incorrecta</div>";
                    }
                } else {
                    return "<div class='error'>Usuario incorrecto</div>";
                }
            }
        }
    }

}

function sesionActiva() {
    session_start();
    if (isset($_SESSION['login'])) {
        $logueado = $_SESSION['login'];
        if ($logueado){
            header("Location: " . $GLOBALS['raiz_sitio']. "principal.php");
        }
    }
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

function filtro_login_Excepcion() {
    session_start();
    if (isset($_SESSION['login'])) {
        $logueado = $_SESSION['login'];
        if (!$logueado) {
//            header("Location: " . $GLOBALS['raiz_sitio'] . "index.php");
        }
    } else {
//        header("Location: " . $GLOBALS['raiz_sitio'] . "index.php");
    }
}



?>
	   