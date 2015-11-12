<?php
	include("../conexion/conexion.php");

	$descargasAP = $_POST['descargasAP'];
	$descargasTS = $_POST['descargasTS'];
	$descargasST = $_POST['descargasST'];
	$sistemaTAR = $_POST['sistemaTratamientoAR'];
	$analisisAgua = $_POST['analisisAR'];
	$reportesOperacionales = $_POST['reportesOP'];

	/*
		Tranformacion de los datos para poder guardarlos
		correctamente en la base de datos
	*/

	//Todos los que son numeros o ND o NA

	if( $descargasAP== "N/D"){ 
		$descargasAP =-1;
	}else{
		if($descargasAP=="N/A"){
			$descargasAP =-2;
		}
	}

	if( $descargasTS== "N/D"){ 
		$descargasTS =-1;
	}else{
		if($descargasTS=="N/A"){
			$descargasTS =-2;
		}
	}

	if( $descargasST== "N/D"){ 
		$descargasST =-1;
	}else{
		if($descargasST=="N/A"){
			$descargasST =-2;
		}
	}

	if( $reportesOperacionales== "N/D"){ 
		$reportesOperacionales =-1;
	}else{
		if($reportesOperacionales=="N/A"){
			$reportesOperacionales =-2;
		}
	}

	//Preguntas si no ND NA

	if($sistemaTAR == "Sí"){
		$sistemaTAR = 1;
	}else{
		if($sistemaTAR == "No"){
			$sistemaTAR = 0;
		}else{
			if($sistemaTAR == "N/D"){
				$sistemaTAR = -1;
			}else{
				$sistemaTAR = -2;
			}
		}
	}

	if($analisisAgua == "Sí"){
		$analisisAgua = 1;
	}else{
		if($analisisAgua == "No"){
			$analisisAgua = 0;
		}else{
			if($analisisAgua == "N/D"){
				$analisisAgua = -1;
			}else{
				$analisisAgua = -2;
			}
		}
	}



	echo "Descargas en AP ".$descargasAP."<br>";
	echo "Descargas en TS ".$descargasTS."<br>";
	echo "Descargas en ST ".$descargasST."<br>";
	echo "Sistema de tratamiento? ".$sistemaTAR."<br>";
	echo "Analisis de agua ".$analisisAgua."<br>";
	echo "Reportes Operacionales ".$reportesOperacionales."<br>";

	//Hacemos la conexion con la base de datos.

	$m_con= mysql_connect($host,$username,$pw) or die ("Problemas al conectar con el servidor");
	mysql_select_db($db,$m_con) or die("Problemas al conectar la base de datos");

	//Año que pertenece el formulario

	$qAnio = mysql_query("select YEAR(NOW());") or die("Problemas al realizar la consulta ".mysql_error());
	$SalidoAnio = mysql_fetch_array($qAnio);
	$anio =$SalidoAnio[0]-1;

	echo $anio;

	//Insertamos los datos en la base de datos.



	//Redireccionamos a la vista de la aplicacion

//	header('Location:../../RH_AR.shtml');

?>