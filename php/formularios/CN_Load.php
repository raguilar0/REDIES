<?php
session_start();
?>


<?php
	try{
		$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', '');
		//$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', 'root');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$id_universidad = $_SESSION['universidad'];
		$username = $_SESSION['correo'];
		$stmt = $conn->prepare('SELECT YEAR(NOW());');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute();
		$ranio = $stmt->fetch();

		$anio = $ranio[0]-1;

		$stmt = $conn->prepare('SELECT id FROM formulario WHERE UNIVERSIDAD_ID = :universidad_id AND ANHO = :anio');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('universidad_id'=>$id_universidad, 'anio'=>$anio));
		$id_formulario = $stmt->fetch();
		$id_formulario = $id_formulario [0];
		//echo $id_formulario;

		$query = "SELECT `CN_I_RS`, `CN_II_I_RC`, `CN_II_II_RC`, `CN_II_III_RC`, `CN_II_IV_RC`, `CN_III_G`, `CN_IV_I_G`, `CN_IV_II_G`, `CN_V_RC`, `FORMULARIO_ID`
					FROM `cn`
					WHERE FORMULARIO_ID=".$id_formulario.";";
		$stmt = $conn->prepare($query);
		$stmt->execute();

        $result = $stmt->fetch();

        $json = json_encode( $result );

        echo $json;
	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}

?>
