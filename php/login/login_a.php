<?php
	try{
		$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', 'root');
		//$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', '');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$email = $_POST['loginemail'];
		$pass = $_POST['loginpassword'];
		$data;

		$stmt = $conn->prepare('SELECT nombre, apellido_I, universidad_id, rol FROM usuarios WHERE correo = :correo AND pass = :pass');//aqui se guardan los datos despues de realizar el execute
		$stmt->execute(array('correo'=>$email, 'pass'=>sha1($pass)));

		if($stmt){
			if(!isset($_SESSION)){
				session_start();
			}
			$data = $stmt->fetch();
		}


		if(!$data[0]){
			echo    '<script type="text/javascript">
						self.location = "../../login.html";
						 $( "#usrpwdalert" ).show( "slow" );
					</script>';
		}else{
			$_SESSION['usuario'] = $data[0];
			$_SESSION['apellido'] = $data[1];
			$_SESSION['universidad'] = $data[2];
			$_SESSION['rol'] = $data[3];
			$_SESSION['correo'] = $email;
		}

		if($_SESSION['rol'] == 'administrador'){
			header("Location: ../../admin_index.php");
		}else{
			if($_SESSION['rol'] == 'representante'){
				header("Location: ../../usuario_index.php");
			}
		}
	}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}
?>
