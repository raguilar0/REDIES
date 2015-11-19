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

		echo "Estoy en GRE <br>";
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



	//Defino cada una de las variables

		$comite = $_POST['comite']; //GRE_I_G
		$medidores = $_POST['medidores']; //GRE_II_I_RC
		$consumoElectrico = $_POST['consumoElectrico']; //GRE_II_II_RC
		$meta = $_POST['metac']; //GRE_III_G
		$controlConsumo = $_POST['controlConsumo']; //GRE_IV_G
		$consumoTotal = $_POST['consumoTotal']; //GRE_V_RC
	
	//Normalizar

		$comite = normalizar_si_no($comite); 
		$medidores = normalizar_input($medidores); 
		$consumoElectrico = normalizar_input($consumoElectrico); 
		$meta = normalizar_no_na_nd($meta);
		$controlConsumo = normalizar_input($controlConsumo);
		$consumoTotal = normalizar_input($consumoTotal);

	//Los Muestro(Temporal)
		echo "comite: ".$comite."<br>"; //
		echo "medidores: ".$medidores."<br>"; //
		echo "consumoElectrico: ".$consumoElectrico."<br>"; //
		echo "meta: ".$meta."<br>"; //
		echo "controlConsumo: ".$controlConsumo."<br>"; //
		echo "consumoTotal: ".$consumoTotal."<br>"; //

	//Verificamos si hay que hacer un update o un insert

		$stmt = $conn->prepare('SELECT FORMULARIO_ID 
								FROM gre 
								WHERE FORMULARIO_ID = :id_formulario');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('id_formulario'=>$id_formulario));
		$data = $stmt->fetch();

		if(!$data[0]){ // si no hay hacemos INSERT
			echo "no hay formulario completado anteriormente de gre<br>";
			$stmt = $conn->prepare("INSERT INTO `gre`(`GRE_I_G`, `GRE_II_I_RC`, `GRE_II_II_RC`, `GRE_III_G`, `GRE_IV_G`, `GRE_V_RC`, `FORMULARIO_ID`) 
									VALUES (:comite ,:medidores ,:consumoElectrico ,:meta ,:controlConsumo ,:consumoTotal ,:formulario_id )");//aqui se guardan los datos despues de realizar el execute
			$stmt->execute(array('comite'=>$comite,'medidores'=>$medidores,'consumoElectrico'=>$consumoElectrico,'meta'=>$meta,'controlConsumo'=>$controlConsumo,'consumoTotal'=>$consumoTotal,'formulario_id'=>$id_formulario));

		}
		else{// si ya existe un formulario hacemos un UPDATE

			echo "hay formulario completado anteriormente de gre<br>";
			$stmt = $conn->prepare(
					"UPDATE `gre` 
					SET `GRE_I_G`=:comite,`GRE_II_I_RC`=:medidores,`GRE_II_II_RC`=:consumoElectrico,`GRE_III_G`=:meta,`GRE_IV_G`=:controlConsumo,`GRE_V_RC`=:consumoTotal
					WHERE `FORMULARIO_ID` = :formulario_id"
					);//aqui se guardan los datos despues de realizar el execute
			$stmt->execute(array('comite'=>$comite,'medidores'=>$medidores,'consumoElectrico'=>$consumoElectrico,'meta'=>$meta,'controlConsumo'=>$controlConsumo,'consumoTotal'=>$consumoTotal,'formulario_id'=>$id_formulario));


		}
	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}

?>