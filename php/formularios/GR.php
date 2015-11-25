<?php
session_start();
?>
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
<<<<<<< Updated upstream

	if($ComVer == "No")
=======

	if( $ComVer == "Sí")
	{
		$ComVer = $_POST['numeroCarteles'];
	}
	else
	{
		if($ComVer == "No")
>>>>>>> Stashed changes
		{
			$ComVer = 0;
		}
		else if (ComVer == "N/D")
		{
			$ComVer = -1;
		}
<<<<<<< Updated upstream


=======
	}

>>>>>>> Stashed changes
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


		try{

			$id_universidad = $_SESSION['universidad'];
			$username = $_SESSION['correo'];



	$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', 'root');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// año del formulario no se ha cambiado a formato propuesto por Luis

		$qAnio = mysql_query("select YEAR(NOW());") or die("Problemas al realizar la consulta ".mysql_error());
		$SalidoAnio = mysql_fetch_array($qAnio);
		$anio =$SalidoAnio[0]-1;



		//Se consulta para ver la existencia de algun formulario de esa u en este año.
		$stmt = $conn->prepare('SELECT id
								FROM formulario
								WHERE UNIVERSIDAD_ID = :universidad_id
									AND ANHO = :anio');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('universidad_id'=>$id_universidad, 'anio'=>$anio));

		$data = $stmt->fetch();

		if(!$data[0]){ // Si no hay un formulario se crea uno nuevo para dicha u en el para el año del formulario
			echo "no hay formulario<br>";
		$stmt = $conn->prepare('INSERT INTO formulario(USUARIOS_CORREO, UNIVERSIDAD_ID, ANHO)
												VALUES( :correo,:universidad_id,:anio)');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('correo'=>$username ,'universidad_id'=>$id_universidad, 'anio'=>$anio));



		}else{
			echo "Si hay formulario<br>";

		}
		$stmt = $conn->prepare('SELECT id
								FROM formulario
								WHERE UNIVERSIDAD_ID = :universidad_id
									AND ANHO = :anio');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('universidad_id'=>$id_universidad, 'anio'=>$anio));

		$data = $stmt->fetch();

		$id_formulario = $data[0];

		echo "el id del formulario es ".$id_formulario."<br>";


		$stmt = $conn->prepare('SELECT FORMULARIO_ID
								FROM gr
								WHERE FORMULARIO_ID = :id_formulario');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('id_formulario'=>$id_formulario));
		$data = $stmt->fetch();

		if(!$data[0]){ // si no hay hacemos INSERT
			echo "no hay formulario completado anteriormente de rh_ach<br>";
			$stmt = $conn->prepare("INSERT INTO `gr`(`GR_I_G`, `GR_II_G`, `GR_III_G`, `GR_IV_G`, `GR_V_RC`, `GR_VI_G`, `GR_VII_G`, `FORMULARIO_ID`)
											VALUES (:PolGesAmb ,:PlaGesAmb ,:NivPar ,:IniAmb ,:ConPap ,:ComVer ,:ComGesAmb,:formulario_id )");//aqui se guardan los datos despues de realizar el execute
			$stmt->execute(array('PolGesAmb'=>$PolGesAmb,'PlaGesAmb'=>$PlaGesAmb,'NivPar'=>$NivPar,'IniAmb'=>$IniAmb,'ConPap'=>$ConPap,'ComVer'=>$ComVer,'ComGesAmb'=>$ComGesAmb,'formulario_id'=>$id_formulario));


			//$result = mysql_query($query) or die("Problemas al realizar la consulta ".mysql_error());

		}
		else{// si ya existe un formulario hacemos un UPDATE

			echo "hay formulario completado anteriormente de gr<br>";
			$stmt = $conn->prepare("UPDATE `gr`
										SET `GR_I_G`=:PolGesAmb,
										`GR_II_G`=:PlaGesAmb,
										`GR_III_G`=:NivPar,
										`GR_IV_G`=:IniAmb,
										`GR_V_RC`=:ConPap,
										`GR_VI_G`=:ComVer,
										`GR_VII_G`=:ComGesAmb
									WHERE `FORMULARIO_ID` = :formulario_id");//aqui se guardan los datos despues de realizar el execute
			$stmt->execute(array(	'PolGesAmb'=>$PolGesAmb,
									'PlaGesAmb'=>$PlaGesAmb,
									'NivPar'=>$NivPar,
									'IniAmb'=>$IniAmb,
									'ConPap'=>$ConPap,
									'ComVer'=>$ComVer,
									'ComGesAmb'=>$ComGesAmb,
									'formulario_id'=>$id_formulario));

		}
	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}
?>
