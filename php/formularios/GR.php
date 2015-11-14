<?php

include("../conexion/conexion.php");


	$PolGesAmb = $_POST['PoliticaGestionAmbiental'];
	$PlaGesAmb = $_POST['PlanGestionAmbiental'];
	$NivPar    = $_POST['nivelParticipacion'];
	$IniAmb    = $_POST['iniciativaAmbiental'];
	$ConPap    = $_POST['consumoPapel'];
	$ComVer    = $_POST['ComprasVerdes'];
	$ComGesAmb = $_POST['ComisionGestionAmbiental'];
	
	if( $PolGesAmb == "Sí")
	{ 
		$PolGesAmb = 1;
	}
	else
	{
		if($PolGesAmb == "No")
		{
			$PolGesAmb = 0;
		}
		else
		{
			$PolGesAmb = -1;
		}
	}
	
	
	if( $PlaGesAmb == "Sí")
	{ 
		$PlaGesAmb = 1;
	}
	else
	{
		if($PlaGesAmb == "No")
		{
			$PlaGesAmb = 0;
		}
		else
		{
			$PlaGesAmb = -1;
		}
	}
	
	if ($NivPar == "N/D")
	{
		$NivPar = -1;
	}
	
	if( $IniAmb == "Sí")
	{ 
		$IniAmb = 1;
	}
	else
	{
		if($IniAmb == "No")
		{
			$IniAmb = 0;
		}
		else
		{
			$IniAmb = -1;
		}
	}
	
	if($ConPap == "N/D")
	{
		$ConPap = -1;
	}
	
	if( $ComVer == "Sí")
	{ 
		$ComVer = $_POST['numeroCarteles'];
	}
	else
	{
		if($ComVer == "No")
		{
			$ComVer = 0;
		}
		else
		{
			$ComVer = -1;
		}
	}
	
	if( $ComGesAmb == "Sí")
	{ 
		$ComGesAmb = 1;
	}
	else
	{
		if($ComGesAmb == "No")
		{
			$ComGesAmb = 0;
		}
		else
		{
			$ComGesAmb = -1;
		}
	}
	
	

	
	echo "Politica gestion ambiental  ".$PolGesAmb."<br>";
	echo "Plan gestion ambiental ".$PlaGesAmb."<br>";
	echo "nivel participacion ".$NivPar."<br>";
	echo "iniciativa ambiental ".$IniAmb."<br>";
	echo "consumo papel ".$ConPap."<br>";
	echo "compras verdes ".$ComVer."<br>";
	echo "comision gestion ambiental ".$ComGesAmb."<br>";

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