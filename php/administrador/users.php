<?php

	session_start();

  	if(!$_SESSION){
    echo' <script languaje = javascript>
		 self.location = "../../login.html"
		 </script>';
	}

	try{
		$conn = new PDO('mysql:host=redies.cr;dbname=redies_indicadores', 'redies', 'Acceso123!');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = 'SELECT u.nombre, u.apellido_I, u.apellido_II, u.correo, d.telefono, d.nombre_u, u.rol FROM usuarios u, universidad d WHERE u.universidad_id = d.id';
		$stmt = $conn->prepare($sql);
		$stmt->execute();

        $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

        $json = json_encode( $result );

        echo $json;
	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}
?>
