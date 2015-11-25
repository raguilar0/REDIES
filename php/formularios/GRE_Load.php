<?php
session_start();
?>


<?php
	try{
		//$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', '');
		$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', 'root');
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

		$query = "SELECT `GRE_I_G`, `GRE_II_I_RC`, `GRE_II_II_RC`, `GRE_III_G`, `GRE_IV_G`, `GRE_V_RC`, `FORMULARIO_ID`
					FROM `gre`
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
