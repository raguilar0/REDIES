<?php
	include("../conexion/conexion.php");

	$comite = $_POST['comite'];
	$medidores = $_POST['medidores'];
	$consumoElectrico = $_POST['consumoElectrico'];
	$planReduccionConsumo = $_POST['planReduccionConsumo'];
	$meta = $_POST['meta'];
	$controlConsumo = $_POST['controlConsumo'];
	$consumoTotal = $_POST['consumoTotal'];
	

	/*
		Tranformacion de los datos para poder guardarlos
		correctamente en la base de datos
	*/

//Comite

	if($comite == "Sí"){
		$comite = 1;
	}else{
		if($comite == "No"){
			$comite = 0;
		}else{
			if($comite == "N/D"){
				$comite = -1;
			}
		}
	}

//Medidores
	if( $medidores == "N/D"){ 
		$medidores =-1;
	}

//ConsumoElectrico
	if( $consumoElectrico == "N/D"){ 
		$consumoElectrico =-1;
	}

//PlanReduccionConsumo
	if($planReduccionConsumo == "Sí"){
		$planReduccionConsumo = 1;
	}else{
		if($planReduccionConsumo == "No"){
			$planReduccionConsumo = 0;
		}else{
			if($planReduccionConsumo == "N/D"){
				$planReduccionConsumo = -1;
			}
		}
	}

//Meta
	// asigno no o nd si el planReduccionConsumo está en esa opción
	if($planReduccionConsumo == "No"){
			$meta = 0;
		}else{
			if($planReduccionConsumo == "N/D"){
				$meta = -1;
			}
		}


//ControlConsumo
	if($controlConsumo == "Sí"){
		$controlConsumo = 1;
	}else{
		if($controlConsumo == "No"){
			$controlConsumo = 0;
		}else{
			if($controlConsumo == "N/D"){
				$controlConsumo = -1;
			}
		}
	}

//ConsumoTotal
	if($consumoTotal == "Sí"){
		$consumoTotal = 1;
	}else{
		if($consumoTotal == "No"){
			$consumoTotal = 0;
		}else{
			if($consumoTotal == "N/D"){
				$consumoTotal = -1;
			}
		}
	}

	echo "comite: ".$comite."<br>";
	echo "medidores: ".$medidores."<br>";
	echo "consumoElectrico: ".$consumoElectrico."<br>";
	echo "planReduccionConsumo: ".$planReduccionConsumo."<br>";
	echo "meta: ".$meta."<br>";
	echo "controlConsumo: ".$controlConsumo."<br>";
	echo "consumoTotal: ".$consumoTotal."<br>";

	//Hacemos la conexion con la base de datos.
/*
	$m_con= mysql_connect($host,$username,$pw) or die ("Problemas al conectar con el servidor");
	mysql_select_db($db,$m_con) or die("Problemas al conectar la base de datos");

	//Año que pertenece el formulario

	$qAnio = mysql_query("select YEAR(NOW());") or die("Problemas al realizar la consulta ".mysql_error());
	$SalidoAnio = mysql_fetch_array($qAnio);
	$anio =$SalidoAnio[0]-1;

	echo $anio;

	//Insertamos los datos en la base de datos.

*/

	//Redireccionamos a la vista de la aplicacion

	//header('Location:../../GRE.shtml');

?>