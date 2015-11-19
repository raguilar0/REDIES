<?php
session_start();
?>
<?php

	try{
		include("../conexion/conexion.php");

		echo "Estoy en Recursos Hídricos: Agua para consumo humano <br>";
		$m_con= mysql_connect($host,$username,$pw) or die ("Problemas al conectar con el servidor");
		mysql_select_db($db,$m_con) or die("Problemas al conectar la base de datos");

		$id_universidad = $_SESSION['universidad'];
		$username = $_SESSION['correo'];


		echo "Id de la universidad ".$id_universidad."<br>";
		echo "Correo del usuario ".$username."<br>";

		// CODE...
		//Conexion con la base de datos
		$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', 'root');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// año del formulario no se ha cambiado a formato propuesto por Luis
//***************************************************************************************************************************
		$qAnio = mysql_query("select YEAR(NOW());") or die("Problemas al realizar la consulta ".mysql_error());
		$SalidoAnio = mysql_fetch_array($qAnio);
		$anio =$SalidoAnio[0]-1;



		//Se consulta para ver la existencia de algun formulario de esa u en este año.
		$stmt = $conn->prepare('SELECT id FROM formulario WHERE UNIVERSIDAD_ID = :universidad_id AND ANHO = :anio');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('universidad_id'=>$id_universidad, 'anio'=>$anio));

		$data = $stmt->fetch();

		if(!$data[0]){ // Si no hay un formulario se crea uno nuevo para dicha u en el para el año del formulario
			echo "no hay formulario<br>";
			$stmt = $conn->prepare('INSERT INTO formulario(USUARIOS_CORREO, UNIVERSIDAD_ID, ANHO) VALUES( :correo,:universidad_id,:anio)');//aqui se guardan los datos despues de realizar el execute
			$stmt->execute(array('correo'=>$username ,'universidad_id'=>$id_universidad, 'anio'=>$anio));



		}else{
			echo "Si hay formulario<br>";
		}

		$stmt = $conn->prepare('SELECT id FROM formulario WHERE UNIVERSIDAD_ID = :universidad_id AND ANHO = :anio');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('universidad_id'=>$id_universidad, 'anio'=>$anio));

		$data = $stmt->fetch();

		$id_formulario = $data[0];

		echo "el id del formulario es ".$id_formulario."<br>";

	//:papel ,:residuos_organicos ,:residuos_valorizables ,:residuos_peligrosos ,:residuos_MEspecial ,
    //:residuos_no_valorizables ,:otros_residuos,:plan_manejo ,:residuos_solidos_PC ,:recuperacion_residuos_solidos ,:taza_reciclaje ,:trazabilidad
	//Tomar los valores del formulario que fue completado por el representate
		$consumoPC 					= $_POST['consumoPC'];
		$nPozos 						= $_POST['nPozos'];
		$nNacientes 				= $_POST['nNacientes'];
		$nRios 							= $_POST['nRios'];
		$nHidrometros 			= $_POST['nHidrometros'];
		$consumoAgua 				= $_POST['consumoAgua'];
		$analisisCalidad 		= $_POST['analisisCalidad'];
		$planAhorro					= $_POST['planAhorro'];
		//$porcentajeReduccion= $_POST['porcentajeReduccion'];
		$planManejo					= $_POST['planManejo'];
		$permisoExplotacion = $_POST['permisoExplotacion'];
		$planMantenimiento	= $_POST['planMantenimiento'];

		$consumoPC 					= normalizar_input($consumoPC);
		$nPozos 						= normalizar_input($nPozos);
		$nNacientes 				= normalizar_input($nNacientes);
		$nRios 							= normalizar_input($nRios);
		$nHidrometros 			= normalizar_input($nHidrometros);
		$consumoAgua 				= normalizar_input($consumoAgua);

		$analisisCalidad 		= normalizar_si_no($analisisCalidad);
		$planAhorro 				= normalizar_si_no($planAhorro);
		//$porcentajeReduccion= normalizar_si_no($porcentajeReduccion);
		$planManejo 				= normalizar_si_no($planManejo);
		$permisoExplotacion = normalizar_si_no($permisoExplotacion);
		$planMantenimiento 	= normalizar_si_no($planMantenimiento);


		//Verificacion de las variables

		echo "ConsumoPC: ".$consumoPC."<br>";
		echo "nPozos: ".$nPozos."<br>";
		echo "nNacientes: ".$nNacientes."<br>";
		echo "nRios: ".$nRios."<br>";
		echo "nHidrometros: ".$nHidrometros."<br>";
		echo "consumoAgua: ".$consumoAgua."<br>";
		echo "analisisCalidad: ".$analisisCalidad."<br>";
		echo "planAhorro: ".$planAhorro."<br>";
		echo "planManejo: ".$planManejo."<br>";
		echo "permisoExplotacion: ".$permisoExplotacion."<br>";
		echo "planMantenimiento: ".$planMantenimiento."<br>";

		//Verificamos si hay que hacer un update o un insert

		$stmt = $conn->prepare('SELECT FORMULARIO_ID FROM rh_ach WHERE FORMULARIO_ID = :id_formulario');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('id_formulario'=>$id_formulario));
		$data = $stmt->fetch();

		if(!$data[0]){ // si no hay hacemos INSERT
			echo "no hay formulario completado anteriormente de rh_ach<br>";
			$stmt = $conn->prepare("INSERT INTO `rh_ach`(`RH_ACH_I_RC`,
																									 `RH_ACH_II_I_G`,
																									 `RH_ACH_II_II_G`,
																									 `RH_ACH_II_III_G`,
																									 `RH_ACH_II_IV_G`,
																									 `RH_ACH_III_RC`,
																									 `RH_ACH_IV_G`,
																									 `RH_ACH_V_G`,
																									 `RH_ACH_VI_G`,
																									 `RH_ACH_VII_G`,
																									 `RH_ACH_VIII_G`,
																									 `FORMULARIO_ID`)
																				VALUES (:consumoPC ,
																								:nPozos ,
																								:nNacientes ,
																								:nRios ,
																								:nHidrometros ,
																								:consumoAgua ,
																								:analisisCalidad,
																								:planAhorro ,
																								:planManejo ,
																								:permisoExplotacion ,
																								:planMantenimiento ,
																								:formulario_id)");//aqui se guardan los datos despues de realizar el execute
			$stmt->execute(array(	'consumoPC'=>$consumoPC,
														'nPozos'=>$nPozos,
														'nNacientes'=>$nNacientes,
														'nRios'=>$nRios,
														'nHidrometros'=>$nHidrometros,
														'consumoAgua'=>$consumoAgua,
														'analisisCalidad'=>$analisisCalidad,
														'planAhorro'=>$planAhorro,
														'planManejo'=>$planManejo,
														'permisoExplotacion'=>$permisoExplotacion,
														'planMantenimiento'=>$planMantenimiento,
														'formulario_id'=>$id_formulario));



			//$result = mysql_query($query) or die("Problemas al realizar la consulta ".mysql_error());

		}
		else{// si ya existe un formulario hacemos un UPDATE
			echo "ya hay formulario completado anteriormente de rh_ach<br>";
			$stmt = $conn->prepare("UPDATE `rh_ach`
															SET 	`RH_ACH_I_RC`= :consumoPC,
																		`RH_ACH_II_I_G`= :nPozos,
																		`RH_ACH_II_II_G`= :nNacientes,
																		`RH_ACH_II_III_G`= :nRios,
																		`RH_ACH_II_IV_G`= :nHidrometros,
																		`RH_ACH_III_RC`= :consumoAgua,
																		`RH_ACH_IV_G`= :analisisCalidad,
																		`RH_ACH_V_G`= :planAhorro,
																		`RH_ACH_VI_G`= :planManejo,
																		`RH_ACH_VII_G`= :permisoExplotacion,
																		`RH_ACH_VIII_G`= :planMantenimiento
															WHERE `FORMULARIO_ID`= :formulario_id");
			$stmt->execute(array(	'consumoPC'=>$consumoPC,
														'nPozos'=>$nPozos,
														'nNacientes'=>$nNacientes,
														'nRios'=>$nRios,
														'nHidrometros'=>$nHidrometros,
														'consumoAgua'=>$consumoAgua,
														'analisisCalidad'=>$analisisCalidad,
														'planAhorro'=>$planAhorro,
														'planManejo'=>$planManejo,
														'permisoExplotacion'=>$permisoExplotacion,
														'planMantenimiento'=>$planMantenimiento,
														'formulario_id' =>$formulario_id));

			if($stmt == true){
				echo "consulta ejecutada correctamente<br>";
			}
			else{
				echo "consulta incorrecta<br>";
				echo $stmt;
			}

		}

	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}


	function normalizar_input($input){

		if( $input== "N/D"){
			return -1;
		}
		else{
			if($input == "N/A"){
				return -2;
			}
			else{
				return $input;
			}
		}
	}

	function  normalizar_si_no($radio){

		if($radio == "Sí"){
			return  1;
		}else{
			if($radio == "No"){
				return  0;
			}else{
				if($radio == "N/D"){
					return -1;
				}
				else{
					return -2;
				}
			}
		}
	}
?>
