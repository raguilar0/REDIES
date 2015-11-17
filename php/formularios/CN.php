<?php
	include("../conexion/conexion.php");

	$inventarioEG = $_POST['emisiones'];
	$cantidadCO2 = $_POST['cantidadCO2'];
	$gasolina = $_POST['gasolina'];
	$diesel = $_POST['diesel'];
	$gas = $_POST['gas'];
	$otrosCombustibles = $_POST['otrosCombustibles'];
	$consumoRef = $_POST['consumoRef'];
	$planReduccionEmisiones = $_POST['planReduccionEmisiones'];
	$porcentajeReduccion = $_POST['porcentajeReduccion'];
	$planConservacion = $_POST['planConservacion'];
	$arbolesSembrados = $_POST['arbolesSembrados'];
	$certificados = $_POST['certificados'];
	
	

	/*
		Tranformacion de los datos para poder guardarlos
		correctamente en la base de datos
	*/

//inventarioEmisionGases

	if($inventarioEG == "Sí"){
		$inventarioEG = 1;
	}else{
		if($inventarioEG == "No"){
			$inventarioEG = 0;
		}else{
			if($inventarioEG == "N/D"){
				$inventarioEG = -1;
			}
		}
	}

//CantidadCO2 queda igual

//Gasolina
	if( $gasolina == "N/D"){ 
		$gasolina = -1;
	}else{
		if($gasolina == "N/A"){
			$gasolina = -2;
		}
	}

//diesel
	if( $diesel == "N/D"){ 
		$diesel = -1;
	}else{
		if($diesel == "N/A"){
			$diesel = -2;
		}
	}

//gas
	if( $gas == "N/D"){ 
		$gas = -1;
	}else{
		if($gas == "N/A"){
			$gas = -2;
		}
	}

//otrosCombustiblesGasolina
	if( $otrosCombustibles == "N/D"){ 
		$otrosCombustibles = -1;
	}else{
		if($otrosCombustibles == "N/A"){
			$otrosCombustibles = -2;
		}
	}

//Consumo REF
	if( $consumoRef == "N/D"){ 
		$consumoRef = -1;
	}

//planReduccionEmisiones
	if($planReduccionEmisiones == "Sí"){
		$planReduccionEmisiones = 1;
	}else{
		if($planReduccionEmisiones == "No"){
			$planReduccionEmisiones = 0;
		}else{
			if($planReduccionEmisiones == "N/D"){
				$planReduccionEmisiones = -1;
			}
		}
	}

//porcentajeReduccion queda igual


//PlanConservacion
	if($planConservacion == "Sí"){
		$planConservacion = 1;
	}else{
		if($planConservacion == "No"){
			$planConservacion = 0;
		}else{
			if($planConservacion == "N/D"){
				$planConservacion = -1;
			}
		}
	}

//arbolesSembrados queda igual
//certificados queda igual


	echo "inventarioEG: ".$inventarioEG."<br>";
	echo "cantidadCO2: ".$cantidadCO2."<br>";
	echo "gasolina: ".$gasolina."<br>";
	echo "diesel: ".$diesel."<br>";
	echo "gas: ".$gas."<br>";
	echo "otrosCombustibles: ".$otrosCombustibles."<br>";
	echo "consumoRef: ".$consumoRef."<br>";
	echo "planReduccionEmisiones: ".$planReduccionEmisiones."<br>";
	echo "porcentajeReduccion: ".$porcentajeReduccion."<br>";
	echo "planConservacion: ".$planConservacion."<br>";
	echo "arbolesSembrados: ".$arbolesSembrados."<br>";
	echo "certificados: ".$certificados."<br>";

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

	//header('Location:../../CN.shtml');

?>