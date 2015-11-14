<?php
	include("../conexion/conexion.php");
	echo "Estoy en consulta representante";

//Esto es global
	$id_universidad = $SESION['id_universidad'];
	$username = $SESION['username'];

//Esto es de la vista
	$tipo_busqueda = $_POST['busqueda_areas'];

	if($tipo_busqueda == "areas"){
		$area_seleccionada = $POST['usuario_consulta_area'];

		switch ($area_seleccionada) {//Si la consulta se hara por areas
			case "CN":
				# code...
				break;
			case "GR":
				#code...
				break;

			case "GRE":
				#code...
				break;
			case "RH_ACH":
				#CODE....
				break;
			case "RH_AR":
				#CODE...
				break;
			case "RS":
				#code...
				break;
			case "all_areas":
				#code
				break;
			case "areas_personalizadas":
				#CODE...
				break;
			default:
				echo "caso default de las areas";
				break;
		}

	}else{// La consulta se hara por tipos
		$tipo_seleccionado = $POST['usuario_consulta_tipo'];
		switch ($tipo_seleccionado) {
			case 'consumo':
				# code...
				break;
			case 'gestion':
				#code...
				break;
			case 'salida':
				#code...
				break;
			case 'all_tipos';
				#code...
				break;
			case 'tipos_personalizados':
				#codd...
				break;			
			default:
				echo "caso default de los tipos";
				break;
		}
	}



?>