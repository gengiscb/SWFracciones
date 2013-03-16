<?php
include_once 'ServicioUsuario.php';
include_once 'DB/AlumnoDAO.php';
include_once 'DB/ProfesorDAO.php';
include_once 'DB/UsuarioDAO.php';

class ServicioAlumno {
    public function actualizarPerfilAlumno($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasenia, $grupo) {
        $servicioUsuario = new ServicioUsuario();
        $servicioUsuario->actualizarPerfilUsuario($usuarioId, $nombre, $apellidoP, $apellidoM, $contrasenia);
        $alumnoDAO = new AlumnoDAO();
        $alumnoDAO->actualizarInformacionAlumno($grupo, $usuarioId);
    }

    public function eliminarAlumno($usuarioId) {
       
	   /*   Aqui utilice hice una instacia de ProfesorDAO para no repetir el mismo metodo en AlumnoDAO */
	   
	   $alumnoDAO = new  UsuarioDAO();
	   //$alumnoDAO->borrarUsuario($usuarioId);
	   // $alumnoDAO=new ProfesorDAO();
		
        if ($alumnoDAO->borrarUsuario($usuarioId)) {
            return true;
        } else {
            return false;
        }
    }

    public function agregarAlumno($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM, $tipoUsuario, $grupo) {
        $servicioUsuario = new ServicioUsuario();
        $agregado = $servicioUsuario->agregarUsuario($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM, $tipoUsuario);
        if($agregado){
            $usuario = $servicioUsuario->buscarUsuarioPorMatricula($matricula);
            $alumnoDAO = new AlumnoDAO();           
            $alumnoDAO->insertarDatosAlumno($usuario->getIdUsuario(), $grupo);
            return true;
        }
        else{
            return false;
        }
    }

    public function buscarAlumnoPorMatricula($alumnoMatricula) {
        $alumnoDAO = new AlumnoDAO();
        $resultado = $alumnoDAO->seleccionarAlumnoPorMatricula($alumnoMatricula);
		
	   return $resultado;
    }

    public function obtenerTodosAlumnos($grupo){
        $alumnoDAO= new AlumnoDAO();
        return $alumnoDAO->seleccionarTodosAlumnos($grupo);
    }

}

?>