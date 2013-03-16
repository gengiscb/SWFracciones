<!--
include_once 'sw/ServicioActividad.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ControladorActividad{
    function habilitarActividad() {
        if (isset($_GET["btn_Actividad"]) && $_GET["btn_Actividad"] == "Continuar") {
            $select_dia = $_GET["select_dia"];
            $select_mes = $_GET["select_mes"];
            $anio = $_GET["anio"];
            $num_actividad = $_GET["num_actividad"];
			$fecha = "".$anio."-".$select_mes."-".$select_dia."";
			$grupo = $_SESSION["grupo"];
            $ServicioActividad = new ServicioActividad();            
            return $ServicioActividad->habilitarActividad($num_actividad, date("d-m-Y"), $fecha);
        }
    }
    
    function deshabilitarActividad($id) {
        if (isset($_GET["btn_deshabilitar"]) && $_GET["btn_deshabilitar"] == "Deshabilitar") {
            
            $ServicioActividad = new ServicioActividad();            
            $ServicioActividad->deshabilitarActividad($id);
        }
    }
	
	
    
	
	public function listarActividades(){
	$resultado = "";
	$ServicioActividad = new ServicioActividad(); 
	$resultado = $ServicioActividad->listarActividad();
	return $resultado;
	}
	
	//ricardo
	public function visualizarActividadAlumnos(){
	$resultado = "";
	$ServicioActividad = new ServicioActividad(); 
	$resultado = $ServicioActividad->listarActividadAlumnos();
	return $resultado;
	}
	
	//ricardo
	
	public function comprobarEstado($idActividad, $idAlumno){
		$ServicioActividad = new ServicioActividad(); 
		$estado = $ServicioActividad->obtenerEstadoActAlumno($idActividad, $idAlumno);
		if($estado=='No iniciada' || $estado == 'Finalizada'){
				return true;
		}else{
			return false;
		}
	}
	
	//ricardo
	public function comprobarIntentos($idActividad, $idAlumno){
		$intentos = "";
		$ServicioActividad = new ServicioActividad(); 
		$intentos = $ServicioActividad->obtenerIntentos($idActividad, $idAlumno);
		if($intentos<3){			
			return true;
		}else{
			
			return false;
		}
	}
	
	function finalizarActividad() {
	
        if (isset($_GET["btn_Finalizar"]) && $_GET["btn_Finalizar"] == "Finalizar") {
            $idActividad = $_GET["idActividad"];
            $idAlumno = $_GET["idAlumno"];
            $ServicioActividad = new ServicioActividad();            
            $ServicioActividad->finalizarActividad($idActividad, $idAlumno);
        }
    }
	
	public function incrementarIntentos($idActividad, $idAlumno){
		$ServicioActividad = new ServicioActividad(); 
		$resultado = $ServicioActividad->incrementeIntentos($idActividad, $idAlumno);
		return $resultado;
	}
	
	public function incrementarIngresos($idActividad, $idAlumno){
		$ServicioActividad = new ServicioActividad(); 
		$ingresos = $ServicioActividad->incrementeIngresos($idActividad, $idAlumno);
		return $ingresos;
	}
	
	public function finalizadofecha(){
	$ServicioActividad = new ServicioActividad();
	$ServicioActividad->finalizadofecha();
	}
	
	public function iniciarActividad($idActividad, $idAlumno){
		$ServicioActividad = new ServicioActividad();
		$ServicioActividad->iniciarActividad($idActividad, $idAlumno);
	}
}
-->
