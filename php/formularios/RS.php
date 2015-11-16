<?php
session_start();
?>
<?php
	
	function normalizar_input($input){

		if( $input== "N/D"){ 
			return -1;
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
	

	try{
		include("../conexion/conexion.php");

		echo "Estoy en Residuos Solidos <br>";

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

	//Tomar los valores del formulario que fue completado por el representate
		$papel = $_POST['cantidadPapel'];
		$papel= normalizar_input($papel);
		$residuos_organicos = $_POST['rOrganicos'];
		$residuos_organicos = normalizar_input($residuos_organicos);
		$residuos_valorizables = $_POST['rValorizables'];
		$residuos_valorizables = normalizar_input($residuos_valorizables);
		$residuos_peligrosos = $_POST['rPeligrosos'];
		$residuos_peligrosos = normalizar_input($residuos_peligrosos);
		$residuos_MEspecial = $_POST['rManejoEspecial'];
		$residuos_MEspecial = normalizar_input($residuos_MEspecial);
		$residuos_no_valorizables = $_POST['rNoValorizables'];
		$residuos_no_valorizables = normalizar_input($residuos_no_valorizables);
		$otros_residuos = $_POST['otros'];
		$otros_residuos = normalizar_input($otros_residuos);

		$residuos_solidos_PC =$_POST['rSolidosPC']; //per 
		$residuos_solidos_PC = normalizar_input($residuos_solidos_PC);		
		$recuperacion_residuos_solidos = $_POST['recuperacionRS'];
		$recuperacion_residuos_solidos = normalizar_input($recuperacion_residuos_solidos);
		$taza_reciclaje = $_POST['tazaReciclaje'];
		$taza_reciclaje = normalizar_input($taza_reciclaje);
		$trazabilidad = $_POST['trazabilidad'];
		$trazabilidad = normalizar_input($trazabilidad);

		$plan_manejo= $_POST['planManejo']; //Pregunta de si o no
		$plan_manejo = normalizar_si_no($plan_manejo);

		//Verificacion de las variables

		echo "plan de manejo ".$plan_manejo."<br><br>";

		//Verificamos si hay que hacer un update o un insert

		$stmt = $conn->prepare('SELECT FORMULARIO_ID FROM grs WHERE FORMULARIO_ID = :id_formulario');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('id_formulario'=>$id_formulario));
		$data = $stmt->fetch();

		if(!$data[0]){ // si no hay hacemos INSERT
			echo "no hay formulario completado anteriormente de grs<br>";
			$stmt = $conn->prepare('INSERT INTO grs (GRS_I_I_RS,GRS_I_II_RS,GRS_I_III_RS,GRS_I_IV_RS,GRS_I_V_RS,GRS_I_VI_RS,GRS_I_VII_RS,GRS_II_G,GRS_III_RS,GRS_IV_RS,GRS_V_RS,GRS_VI_G,
			GRS_VII_RS) VALUES (:papel ,:residuos_organicos ,:residuos_valorizables ,:residuos_peligrosos ,:residuos_MEspecial ,:residuos_no_valorizables ,:otros_residuos,:plan_manejo ,:residuos_solidos_PC ,:recuperacion_residuos_solidos ,:taza_reciclaje ,:trazabilidad )');//aqui se guardan los datos despues de realizar el execute
			$stmt->execute(array('papel'=>$papel,'residuos_organicos'=>$residuos_organicos,'residuos_valorizables'=>$residuos_valorizables,'residuos_peligrosos'=>$residuos_peligrosos,'residuos_MEspecial'=>$residuos_MEspecial,'residuos_no_valorizables'=>$residuos_no_valorizables,'otros_residuos'=>$otros_residuos,'residuos_solidos_PC'=>$residuos_solidos_PC,'recuperacion_residuos_solidos'=>$recuperacion_residuos_solidos,'taza_reciclaje'=>$taza_reciclaje,'trazabilidad'=>$trazabilidad,'plan_manejo'=>$plan_manejo));
		}
		else{// si ya existe un formulario hacemos un UPDATE

		}
	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}
?>