<?php
//
//include_once 'DB/ActividadDAO.php';
//include_once 'sw/Sesion.php';
//
//
//class ServicioActividad {
//
//
//    public function habilitarActividad($numeroActividad, $fechaInicio, $fechaFinalizacion) {
//        $ActividadDAO = new _ActividadDAO();
//        $ActividadDAO->actualizarEstadoActividad($numeroActividad,  $_SESSION['grupo'], $fechaInicio, $fechaFinalizacion);
//            
//    }
//	
//	  public function deshabilitarActividad($id) {
//        $ActividadDAO = new ActividadDAO();
//        $ActividadDAO->deshabilitarActividad($id);
//            
//        
//    }
//	 public function listarActividad() {
//	 	$resultado ="";
//        $ActividadDAO = new ActividadDAO();
//		$resultado = $ActividadDAO -> listarActividades($_SESSION['grupo']);
//		return $resultado;
//        
//    }
//public function listarActividadAlumnos()	{
//        $ActividadDAO = new ActividadDAO();
//		$resultado = $ActividadDAO -> listarActividadesAlumnos($_SESSION['usuarioId']);
//		return $resultado;
//}
//	//ricardo
//	public function obtenerIntentos($idActividad, $idAlumno){
//		$ActividadDAO = new ActividadDAO();
//		$intentos = $ActividadDAO->obtenerNumeroIntentos($idActividad, $idAlumno);
//		return $intentos;
//	}
//	//ricardo
//	public function incrementeIntentos($idActividad, $idAlumno){
//		$ActividadDAO = new ActividadDAO();
//		$resultado = $ActividadDAO -> incrementarIntentos($idActividad, $idAlumno);
//		return $resultado;
//	}
//	//ricardo
//	public function incrementeIngresos($idActividad, $idAlumno){
//		$ActividadDAO = new ActividadDAO();
//		$resultado = $ActividadDAO -> incrementarIngresos($idActividad, $idAlumno);
//		return $resultado;
//	}
//	//ricardo
//	public function obtenerEstadoActAlumno($idActividad, $idAlumno){
//		$ActividadDAO = new ActividadDAO();
//		$estado = $ActividadDAO -> obtenerEstadoActividad($idActividad, $idAlumno);
//		return $estado;
//	}
//	 public function finalizarActividad($idActividad, $idAlumno) {
//        $ActividadDAO = new ActividadDAO();
//        $ActividadDAO->finalizarActividad($idActividad, $idAlumno);
//            
//        
//    }
//	
//	public function iniciarActividad($idActividad, $idAlumno){
//		$ActividadDAO = new ActividadDAO();
//		$ActividadDAO -> iniciarActividad($idActividad, $idAlumno);
//	}
//	
//	public function finalizadofecha(){
//	$ActividadDAO = new ActividadDAO();
//	$ActividadDAO->finalizadofecha();
//	}
//	
//}
//    
?>