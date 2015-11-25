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
	
		$sql = 'SELECT @row_num := @row_num + 1 as usr, u.nombre, u.apellido_I, u.apellido_II, u.correo, u.tel_usuario, u.tel_movil, d.nombre_u, u.rol FROM usuarios u, universidad d JOIN (SELECT @row_num := 0) r WHERE u.universidad_id = d.id';
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
		// fetch the results into an array
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );
    
    // convert to json
    $json = json_encode( $result );

    // echo the json string
    echo $json;
	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}
?>