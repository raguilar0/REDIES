<?php
	try{		
		$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$email = $_POST['loginemail'];
		$pass = $_POST['loginpassword'];
		
		$stmt = $conn->prepare('SELECT nombre, universidad_id, rol FROM usuarios WHERE correo = :correo AND pass = :pass');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('correo'=>$email, 'pass'=>$pass));
			
		if($stmt){
			if(!isset($_SESSION)){
				session_start();
			}
		}
		
		$data = $stmt->fetch();
		
		if(!$data[0]){
			echo 	'<script languaje = javascript>
					alert("Usuario o Password incorrectos")
					self.location = "../../login.html"
					</script>';
		}else{
			$_SESSION['usuario'] = $data[0];
			$_SESSION['universidad'] = $data[1];
			$_SESSION['rol'] = $data[2];
			$_SESSION['correo'] = $email;
		}
		
		if($_SESSION['rol'] == 'administrador'){
			header("Location: ../../admin_header.html");
		}else{
			if($_SESSION['rol'] == 'representante'){
				header("Location: ../../usuario_header.html");
			}
		}
	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}
	//select nombre, universidad_id, rol from usuarios where correo = 'luis.mata@redies.cr' and pass = '123456'	
?>


