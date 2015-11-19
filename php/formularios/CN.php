<?php
session_start();
?>

<?php

function normalizar_input($input){

		if( $input== "N/D"){ 
			return -1;
		}
		else{
			return $input;
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
		}
	}
}

function  normalizar_no_na_nd($radio){
	if($radio == "No"){
		return  0;
	}else{
		if($radio == "N/D"){
			return -1;
		}else{
			if($radio == "N/A"){
				return -2;
			}else{
				return $radio;
			}	
		}
	}
}

try{
		include("../conexion/conexion.php");

		echo "Estoy en CN <br>";
		$m_con= mysql_connect($host,$username,$pw) or die ("Problemas al conectar con el servidor");
		mysql_select_db($db,$m_con) or die("Problemas al conectar la base de datos");

		$id_universidad = $_SESSION['universidad'];
		$username = $_SESSION['correo'];


		echo "Id de la universidad ".$id_universidad."<br>";
		echo "Correo del usuario ".$username."<br>";

		// CODE...
		//Conexion con la base de datos
		$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// año del formulario no se ha cambiado a formato propuesto por Luis

		$qAnio = mysql_query("select YEAR(NOW());") or die("Problemas al realizar la consulta ".mysql_error());
		$SalidoAnio = mysql_fetch_array($qAnio);
		$anio =$SalidoAnio[0]-1;



		//Se consulta para ver la existencia de algun formulario de esa u en este año.
		$stmt = $conn->prepare('SELECT id 
								FROM formulario 
								WHERE UNIVERSIDAD_ID = :universidad_id AND ANHO = :anio');//aqui se guardan los datos despues de realizar el execute
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
								WHERE UNIVERSIDAD_ID = :universidad_id AND ANHO = :anio');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('universidad_id'=>$id_universidad, 'anio'=>$anio));

		$data = $stmt->fetch();

		$id_formulario = $data[0];

		echo "el id del formulario es ".$id_formulario."<br>";

	//Defino las variables
		$cantidadCO2 = $_POST['cantidadCO2']; //CN_I_RS//
		$gasolina = $_POST['gasolina']; //CN_II_I_RC//
		$diesel = $_POST['diesel']; //CN_II_II_RC//
		$gas = $_POST['gas']; //CN_II_III_RC//
		$otrosCombustibles = $_POST['otrosCombustibles']; //CN_II_IV_RC//
		$consumoRef = $_POST['consumoRef']; //CN_V_RC//
		$planReduccionEmisiones = $_POST['planReduccionEmisiones']; //CN_III_G//
		$arbolesSembrados = $_POST['arbolesSembrados']; //CN_IV_I_G//
		$certificados = $_POST['certificados']; //CN_IV_II_G//

	//Normalizar
		$cantidadCO2 = normalizar_no_na_nd($cantidadCO2); 
		$gasolina = normalizar_no_na_nd($gasolina);
		$diesel = normalizar_no_na_nd($diesel);
		$gas = normalizar_no_na_nd($gas);
		$otrosCombustibles = normalizar_no_na_nd($otrosCombustibles);
		$consumoRef = normalizar_input($consumoRef);
		$planReduccionEmisiones = normalizar_no_na_nd($planReduccionEmisiones);
		$arbolesSembrados = normalizar_no_na_nd($arbolesSembrados);
		$certificados = normalizar_no_na_nd($certificados);

	//Los Muestro(Temporal)
		echo "cantidadCO2: ".$cantidadCO2."<br>"; //
		echo "gasolina: ".$gasolina."<br>"; //
		echo "diesel: ".$diesel."<br>"; //
		echo "gas: ".$gas."<br>";
		echo "otrosCombustibles: ".$otrosCombustibles."<br>"; //
		echo "consumoRef: ".$consumoRef."<br>"; //
		echo "planReduccionEmisiones: ".$planReduccionEmisiones."<br>"; //
		echo "arbolesSembrados: ".$arbolesSembrados."<br>"; //
		echo "certificados: ".$certificados."<br>"; //

	//Verificamos si hay que hacer un update o un insert

		$stmt = $conn->prepare('SELECT FORMULARIO_ID 
								FROM cn 
								WHERE FORMULARIO_ID = :id_formulario');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('id_formulario'=>$id_formulario));
		$data = $stmt->fetch();

		if(!$data[0]){ // si no hay hacemos INSERT
			echo "no hay formulario completado anteriormente de cn<br>";
			$stmt = $conn->prepare("INSERT INTO `cn`(`CN_I_RS`, `CN_II_I_RC`, `CN_II_II_RC`, `CN_II_III_RC`, `CN_II_IV_RC`, `CN_III_G`, `CN_IV_I_G`, `CN_IV_II_G`, `CN_V_RC`, `FORMULARIO_ID`) 
									VALUES (:cantidadCO2 ,:gasolina ,:diesel ,:gas ,:otrosCombustibles ,:planReduccionEmisiones ,:arbolesSembrados ,:certificados ,:consumoRef ,:formulario_id )");//aqui se guardan los datos despues de realizar el execute
			$stmt->execute(array('cantidadCO2'=>$cantidadCO2,'gasolina'=>$gasolina,'diesel'=>$diesel,'gas'=>$gas,'otrosCombustibles'=>$otrosCombustibles,'planReduccionEmisiones'=>$planReduccionEmisiones, 'arbolesSembrados'=>$arbolesSembrados, 'certificados'=>$certificados, 'consumoRef'=>$consumoRef, 'formulario_id'=>$id_formulario));

		}
		else{// si ya existe un formulario hacemos un UPDATE

			echo "hay formulario completado anteriormente de cn<br>";
			$stmt = $conn->prepare(
					"UPDATE `cn` 
					SET `CN_I_RS`=:cantidadCO2,
						`CN_II_I_RC`=:gasolina,
						`CN_II_II_RC`=:diesel,
						`CN_II_III_RC`=:gas,
						`CN_II_IV_RC`=:otrosCombustibles,
						`CN_III_G`=:planReduccionEmisiones, 
						`CN_IV_I_G`=:arbolesSembrados, 
						`CN_IV_II_G`=:certificados, 
						`CN_V_RC`=:consumoRef
					WHERE `FORMULARIO_ID` = :formulario_id"
					);//aqui se guardan los datos despues de realizar el execute
			$stmt->execute(array('cantidadCO2'=>$cantidadCO2,'gasolina'=>$gasolina,'diesel'=>$diesel,'gas'=>$gas,'otrosCombustibles'=>$otrosCombustibles,'planReduccionEmisiones'=>$planReduccionEmisiones, 'arbolesSembrados'=>$arbolesSembrados, 'certificados'=>$certificados, 'consumoRef'=>$consumoRef, 'formulario_id'=>$id_formulario));

		}

	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}


?>