<?php 
 
// 
//include_once 'ConexionGeneral.php';
//include_once '/sw/domain/Actividad.php';
// 
//class ActividadDAO extends ConexionGeneral {
// 	public function existeActividadHabilitada($numeroActividad, $grupo) {
// 	$Habilitada = "Habilitada";
//        $conexion = $this->abrirConexion();
//        $existeActividadHabilitada = true;
//        $query = "SELECT * FROM actividades WHERE numeroActividad ='" . mysql_real_escape_string($numeroActividad) . "' AND grupo  = '" . mysql_real_escape_string($grupo). "' AND estadoActividad= '" . mysql_real_escape_string($Habilitada). "'";
//        $lresult = $this->ejecutarConsulta($query, $conexion);
//        if (!$lresult) {
//            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
//            $cerror .= "SQL: $query <br>";
//            $cerror .= "Descripción: " . mysql_error($conexion);
//            die($cerror);
//        } else {
//            if (mysql_num_rows($lresult) === 0)
//                $existeActividadHabilitada = false;
//			else {
//				echo "<script>alert('La actividad ".$numeroActividad." ya ha sido habilitada con anterioridad')</script>";  
//			}
//        }        
//        return $existeActividadHabilitada;
//    }
//	
//	public function actualizarEstadoActividad($numeroActividad, $grupo, $fechaInicio, $fechaFinalizacion){
//	$Habilitada ="Habilitada";
//	$actividadFinalizada = "No";
//	$registroExitoso = false;
//        $conexionDB = $this->abrirConexion();
//	
//        $sql = "INSERT INTO ACTIVIDADES (numeroActividad,estadoActividad,fechaInicio,fechaFinalizacion,grupo,actividadFinalizada) VALUES (\"" . $numeroActividad ."\",\"". $Habilitada ."\", \"" . date("Y-m-d") . "\",\"" . $fechaFinalizacion. "\", \"" . $grupo . "\",\"". $actividadFinalizada ."\");";
//        
//        if ($this->ejecutarConsulta($sql, $conexionDB)) {
//			
//            $registroExitoso = true;
//			echo "<script>alert('Se ha habilitado la actividad')</script>";  
//        }
//        $this->cerrarConexion($conexionDB);
//        return $registroExitoso;
//	
//	}
//	
//	public function listarActividades($grupo){
//	
//		$conexion=$this->abrirConexion();  
//	 	$ccontenido ="";
//	       
//        $sql  = "SELECT idActividad,fechaInicio,fechaFinalizacion,numeroActividad, estadoActividad, grupo FROM actividades WHERE  grupo  = '" . mysql_real_escape_string($grupo). "' AND estadoActividad ='Habilitada' ORDER BY `actividades`.`numeroActividad` ASC";
//		
//		$resultado = $this->ejecutarConsulta($sql, $conexion);
//      	if (!$resultado) {
//            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
//            $cerror .= "SQL: $query <br>";
//            $cerror .= "Descripción: " . mysql_error($conexion);
//            die($cerror);
//        }
//		else
//		{
//	
//			if (mysql_num_rows($resultado) > 0){
//	
//  	 		//Recorre los registros arrojados por la consulta SQL
//	 			while ($adatos = mysql_fetch_array($resultado)){
//      	   
//	   				$ccontenido .= "
//	   				<table>
//                		<tr>
//               	   			<th>Actividad</th>
//				   			<th> ".$adatos["numeroActividad"]."</th>
//                 		<tr>
//               	   			<th >Fecha Inicio</th>
//               	  			<th >".$adatos["fechaInicio"]."</th>
//                 		</tr>
//						<tr>
//               	   			<th >Fecha Finalizacion: </th>
//           	       			<th >".$adatos["fechaFinalizacion"]."</th>
//						</tr>	
//						<tr>
//							<th><a href=\"VerActividadesHabilitadas.php?cid=".$adatos["idActividad"]."&estado=".$adatos["estadoActividad"]."&actividdad=".$adatos["numeroActividad"]."&grupo=".$adatos["grupo"]."\"><img alt=\"Editar\" src=\"img/utileria/eye.gif\"></a>
//							</th>
//							<th><a href=\"Deshabilitar.php?cid=".$adatos["idActividad"]."&estado=".$adatos["estadoActividad"]."&actividdad=".$adatos["numeroActividad"]."&grupo=".$adatos["grupo"]."\"><img alt=\"Editar\" src=\"img/utileria/deshabilitar.gif\"></a>
//							</th>
//						</tr></table>";
//				
//				}
//			}
//		}				
//		mysql_free_result($resultado); 
// 
// 		if ( empty($ccontenido) ){
//   			$ccontenido .= "<tr>";
//   			$ccontenido .= "<td>Actualmente no hay actividades habilitadas</td>";		
//   			$ccontenido .= "</tr>";
// 		}
//  		return $ccontenido; 
// 	} 
//	
//	
//	public function verificarFinalizacion ($idActividad){
//	$conexion = $this->abrirConexion();
//		$query = "SELECT estado FROM actividadesalumno WHERE idActividad = ".$idActividad. "";
//		$resultado = $this->ejecutarConsulta($query, $conexion);
//      	if (!$resultado) {
//            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
//            $cerror .= "SQL: $query <br>";
//            $cerror .= "Descripción: " . mysql_error($conexion);
//            die($cerror);
//        }else{
//			if (mysql_num_rows($resultado) > 0){
//	 			while ($datos = mysql_fetch_array($resultado)){
//	  				$estadoActividad= $datos["estado"];
//				}
//			}
//			mysql_free_result($resultado);
//			return $estadoActividad;	
//		}
//				
//				}
//	
//                
//				
//	public function obteneridAlumno($idUsuario){
//	$conexion = $this->abrirConexion();
//		$query = "SELECT idAlumno FROM alumno WHERE usuarioId = ".$idUsuario. "";
//		$resultado = $this->ejecutarConsulta($query, $conexion);
//      	if (!$resultado) {
//            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
//            $cerror .= "SQL: $query <br>";
//            $cerror .= "Descripción: " . mysql_error($conexion);
//            die($cerror);
//        }else{
//			if (mysql_num_rows($resultado) > 0){
//	 			while ($datos = mysql_fetch_array($resultado)){
//	  				$idAlumno= $datos["idAlumno"];
//				}
//			}
//			mysql_free_result($resultado);
//			return $idAlumno;	
//		}
//				
//				}
//	
////Ricardo
//	public function listarActividadesAlumnos($usuario){
//	 	$conexion=$this->abrirConexion();  
//	 	$ccontenido ="";
//	    $idAlumno = $this ->obteneridAlumno($usuario);
//					   
//		$sql  = "SELECT * FROM alumno al JOIN actividades a ON a.grupo = al.grupo WHERE  al.usuarioid  = '" . mysql_real_escape_string($usuario). "' AND a.estadoActividad = 'Habilitada'";
//		$resultado = $this->ejecutarConsulta($sql, $conexion);
//      	if (!$resultado) {
//            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
//            $cerror .= "SQL: $sql <br>";
//            $cerror .= "Descripción: " . mysql_error($conexion);
//            die($cerror);
//        }
//		else
//		{
//	
//			if (mysql_num_rows($resultado) > 0){
//	 			while ($adatos = mysql_fetch_array($resultado)){
//					
//		 			
//				$idActividad = $adatos["idActividad"];
//		 		$this->asignarActividadAlumno($idActividad, $idAlumno);
//				$estado = $this-> verificarFinalizacion($idActividad);
//				
//				if(/*$estado == 'No iniciada' and*/ $adatos["actividadFinalizada"]=='No' ){
//		 			$estado="";
//	  				$ccontenido .= "
//	  
//	   				<table>
//                		<tr>
//               	   			<th>Actividad</th>
//				   			<th> ".$adatos["numeroActividad"]."</th>
//                 		<tr>
//               	   			<th >Fecha Inicio</th>
//               	   			<th >".$adatos["fechaInicio"]."</th>
//                 		</tr>
//						<tr>
//               	   			<th >Fecha Finalizacion: </th>
//           	       			<th >".$adatos["fechaFinalizacion"]."</th>
//						</tr>	
//						<tr>
//							<th><a href=\"VisualizarActividad.php?idac=".$idActividad."&idal=".$idAlumno."&estado=".$adatos["estadoActividad"]."&actividad=".$adatos["numeroActividad"]."&grupo=".$adatos["grupo"]."\"><img alt=\"Editar\" src=\"img/utileria/eye.gif\"></a>
//							</th>
//							<th>
//							</th>	
//						</tr>
//					</table>";
//	 				}
//	 				else{
//	 					if($adatos["actividadFinalizada"] =='Si'|| $estado == 'Finalizada'){
//	 						$estado="";
//	  						$ccontenido .= "
//	  
//	   						<table>
//                				<tr>
//               	   					<th>Actividad</th>
//				   					<th> ".$adatos["numeroActividad"]."</th>
//                 				<tr>
//               	   					<th >Fecha Inicio</th>
//               	   					<th >".$adatos["fechaInicio"]."</th>
//                 				</tr>
//								<tr>
//               	   					<th >Fecha Finalizacion: </th>
//           	       					<th >".$adatos["fechaFinalizacion"]."</th>
//								</tr>	
//								<tr>
//									<th><img alt=\"Editar\" src=\"img/utileria/eye.gif\"></a>
//									</th>
//									<th>
//									Finalizada
//									</th>	
//								</tr>
//							</table>";
//	 					}	
//					}
//				}
//			}
//		}
//		mysql_free_result($resultado); 
// 
//		if ( empty($ccontenido) ){
//			$ccontenido .= "<tr>";
//			$ccontenido .= "<td>Actualmente no hay actividades habilitadas</td>";		
//			$ccontenido .= "</tr>";
//		}
//		return $ccontenido;
//	}
//	//ricardo
//	public function asignarActividadAlumno($idActividad, $idAlumno){
//		$registroExitoso = false;
//        $conexionDB = $this->abrirConexion();
//	
//        $sql = "INSERT INTO actividadesalumno (idActividad, idAlumno, estado) VALUES (\"" . $idActividad ."\",\"". $idAlumno ."\",\"No iniciada\");";
//        
//        if ($this->ejecutarConsulta($sql, $conexionDB)) {
//			
//            $registroExitoso = true;
//			
//        }
//        $this->cerrarConexion($conexionDB);
//        return $registroExitoso;
//	
//
//	}
//	
//	
//	public function deshabilitarActividad ($id){
//
//		$conexion = $this->abrirConexion();
//
//		$query = "UPDATE actividades SET estadoActividad = 'Deshabilitada' WHERE idActividad =".$id."";
//        
//       	$resultado = $this ->ejecutarConsulta($query, $conexion);
//       	$this ->cerrarConexion($conexion);
//       	header("Location: ListarActividades.php");
//	}
//	
//	//ricardo
//	public function incrementarIntentos($idActividad, $idAlumno){
//		$conexion = $this->abrirConexion();
//		$query = "UPDATE actividadesalumno SET intentos = intentos + 1 WHERE idActividad =".$idActividad." AND idAlumno=".		$idAlumno."";
//        $resultado = $this ->ejecutarConsulta($query, $conexion);
//        $this ->cerrarConexion($conexion);
//	}
//	
//	//ricardo
//	public function incrementarIngresos($idActividad, $idAlumno){
//		$conexion = $this->abrirConexion();
//		$query = "UPDATE actividadesalumno SET ingresos = (ingresos + 1) WHERE idActividad =".$idActividad." AND idAlumno=".$idAlumno."";
//       $resultado = $this ->ejecutarConsulta($query, $conexion);
//       $this ->cerrarConexion($conexion);
//	
//	}
//	
//	//ricardo
//	public function obtenerNumeroIntentos($idActividad, $idAlumno){
//		$conexion = $this->abrirConexion();
//		$query = "SELECT intentos FROM actividadesalumno WHERE idActividad = ".$idActividad. " AND idAlumno=".$idAlumno."";
//		$resultado = $this->ejecutarConsulta($query, $conexion);
//      	if (!$resultado) {
//            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
//            $cerror .= "SQL: $query <br>";
//            $cerror .= "Descripción: " . mysql_error($conexion);
//            die($cerror);
//        }else{
//			if (mysql_num_rows($resultado) > 0){
//	 			while ($datos = mysql_fetch_array($resultado)){
//	  				$intentos = $datos["intentos"];
//				}
//			}
//			mysql_free_result($resultado);
//			return $intentos;	
//		}
//	}
//	
//	//ricardo
//	public function obtenerEstadoActividad($idActividad, $idAlumno){
//		$conexion = $this->abrirConexion();
//		$query = "SELECT estado FROM actividadesalumno WHERE idActividad = ".$idActividad. " AND idAlumno=".$idAlumno."";
//		$resultado = $this->ejecutarConsulta($query, $conexion);
//		if (!$resultado) {
//            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
//            $cerror .= "SQL: $query <br>";
//            $cerror .= "Descripción: " . mysql_error($conexion);
//            die($cerror);
//        }else{
//			if (mysql_num_rows($resultado) > 0){
//	 			while ($datos = mysql_fetch_array($resultado)){
//	  				$estado = $datos["estado"];
//				}
//			}
//			mysql_free_result($resultado);
//			return $estado;
//		}
//	}
//	
//	public function iniciarActividad($idActividad, $idAlumno){
//		$conexion = $this->abrirConexion();
//
//		$query = "UPDATE actividadesalumno SET estado = 'Iniciada' WHERE idActividad =".$idActividad." AND idAlumno=".$idAlumno."";
//
//		$resultado = $this ->ejecutarConsulta($query, $conexion);
//		if (!$resultado) {
//   			$cerror = "No fue posible recuperar la información de la base de datos.<br>";
//   			$cerror .= "SQL: $cquery <br>";
//   			$cerror .= "Descripción: ".mysql_error($conexion);
//   			die($cerror);
//   		} 	
//   		$this ->cerrarConexion($conexion);
//   		//$_SESSION["Finalizada"] = 'Finalizada';
//   		//header("Location: VisualizarActividadesAlumnos.php");
//   }
//	
///***********************************************************************************/	
//	
//	public function finalizarActividad($idActividad, $idAlumno){
//		$conexion = $this->abrirConexion();
//		$query = "UPDATE actividadesalumno SET estado = 'Finalizada' WHERE idActividad =".$idActividad." AND idAlumno=".$idAlumno."";
//		$resultado = $this ->ejecutarConsulta($query, $conexion);
//		if (!$resultado) {
//   			$cerror = "No fue posible recuperar la información de la base de datos.<br>";
//   			$cerror .= "SQL: $cquery <br>";
//   			$cerror .= "Descripción: ".mysql_error($conexion);
//   		die($cerror);
// 		}	 	
//       $this ->cerrarConexion($conexion);
//       $_SESSION["Finalizada"] = 'Finalizada';
//       	header("Location: VisualizarActividadesAlumnos.php");
//	}	
//
//	public function finalizadofecha(){
//
//		$conexion = $this->abrirConexion();
//		$fecha = date("Y-m-d");
//		$query = "UPDATE actividades SET actividadFinalizada = 'Si' WHERE fechaFinalizacion ='".$fecha."'";
//		$resultado = $this ->ejecutarConsulta($query, $conexion);
//		if (!$resultado) {
//   			$cerror = "No fue posible recuperar la información de la base de datos.<br>";
//   			$cerror .= "SQL: $query <br>";
//   			$cerror .= "Descripción: ".mysql_error($conexion);
//   			die($cerror);
//		} 
//       $this ->cerrarConexion($conexion);
//    }
//}
?>