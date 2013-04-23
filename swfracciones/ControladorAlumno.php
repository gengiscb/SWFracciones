<?php

include_once 'sw/ServicioAlumno.php';
/**
 * Clase: ControladorAlumno
 * Descripcion: Esta clase se encarga de gestionar las interacciones entre la parte visual y la parte logia de gestion de alumnos
 * Requisitos relacionados:
 * -RF-AL001
 * -RF-AL002
 */
class ControladorAlumno {

    function agregarAlumnoC() {
        if (isset($_GET["btn_registrar"]) && $_GET["btn_registrar"] == "Registrar") {
            $nombre = $_GET["nombre"];
            $apellidoP = $_GET["apellidoP"];
            $apellidoM = $_GET["apellidoM"];
            $matricula = $_GET["matricula"];
            $grupo = $_GET["grupo"];
            $contrasena = $_GET["contrasena"];
            $servicioAlumno = new ServicioAlumno();
            if ($servicioAlumno->agregarAlumno($matricula, $nombre, $contrasena, $apellidoP, $apellidoM, "3", $grupo)) {
                $msj = "TRUE";
            } else {
                $msj = "FALSE";
            }
            return $msj;
        }
    }

    function obtenerAlumnoC() {
        if (isset($_GET["ver_perfil_alumno"]) && $_GET["ver_perfil_alumno"] == "ver_perfil") {
            $matricula = $_GET["matricula"];
            $servicioAlumno = new ServicioAlumno();
            return $servicioAlumno->buscarAlumnoPorMatricula($matricula);
        }
    }

    function obtenerAlumnosC() {
        if (isset($_GET["obtener_Alumnos"]) && $_GET["obtener_Alumnos"] == "obtener") {
            $servicioAlumno = new ServicioAlumno();
            return $servicioAlumno->obtenerTodosAlumnos($_SESSION["grupo"]);
        }
    }

    function eliminarAlumnoC() {
        if (isset($_GET["eliminar_Alumno"]) && $_GET["eliminar_Alumno"] == "eliminar") {
            $usuarioId = $_GET["idUsuario"];
            $servicioAlumno = new ServicioAlumno();
            return $servicioAlumno->eliminarAlumno($usuarioId);
        }
    }

    function actualizarAlumnoC() {
//        echo '1';
        if (isset($_POST["actualizar_alumno"]) && $_POST["actualizar_alumno"] == "actualizar") {
//            echo '2';
            $nombre = $_POST["nombre"];
            $apellidoP = $_POST["apellidoP"];
            $apellidoM = $_POST["apellidoM"];
            $grupo = $_POST["grupo"];
            $contrasena = $_POST["contrasena"];
            $usuarioId = $_POST["usuarioID"];
            $servicioAlumno = new ServicioAlumno();
            if ($servicioAlumno->actualizarPerfilAlumno($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasena, $grupo)) {
                return "<div class='exito'>Alumno actualizado con exito</div>";
            } else {
                return "<div class='error'>Error en la actualizacion</div>";
            }
        }
    }

    function tablaAlumnos() {
        $alumnos = $this->obtenerAlumnosC();
        $SALTO = "\n";
        $cadena_post = "";
        $index = 1;
        foreach ($alumnos as $alumno) {
            $class = "";
            if ($index % 2 == 0)
                $class = "par";
            $cadena_post .='            <tr>' . $SALTO;
            $cadena_post .='                <td>' . $alumno->getIdAlumno() . '</td>' . $SALTO;
            $cadena_post .='                <td>' . $alumno->getNombre() . '</td>' . $SALTO;
            $cadena_post .='                <td>' . $alumno->getApellidoP() . '</td>' . $SALTO;
            $cadena_post .='                <td>' . $alumno->getApellidoM() . '</td>' . $SALTO;
            $cadena_post .='                <td>' . $alumno->getGrupo() . '</td>' . $SALTO;
            $cadena_post .='                <td class="editar"><a href="EditarAlumno.php?ver_perfil_alumno=ver_perfil&matricula=' . $alumno->getMatricula() . '"><img src="img/utileria/editar.png" alt="Editar"/></a></td>' . $SALTO;
            $cadena_post .='               	<td class="borrar"><a onclick = "confirmarEliminacionUsuario(' . $alumno->getIdUsuario() . ')" href="#"><img src="img/utileria/borrar.png" alt="Borrar"/></a></td>' . $SALTO;
            $cadena_post .='            </tr>' . $SALTO;
            $index++;
        }
        return $cadena_post;
    }
}
$agregarAlumno = new ControladorAlumno();
echo $agregarAlumno->agregarAlumnoC();
?>
