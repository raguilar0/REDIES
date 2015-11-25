<?php
session_start();
?>
<?php

include("../conexion/conexion.php");

		try{


			$nom = $_POST['nombre'];
			$cor = $_POST['correo'];
			$uni = $_POST['institucion'];
			$pro = $_POST['profesion'];
			$pue = $_POST['puesto'];
			$tel = $_POST['telefono'];
			$cel = $_POST['celular'];

			$id_universidad = $_SESSION['universidad'];
			$username = $_SESSION['correo'];

			$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', 'root');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->prepare("UPDATE `usuarios`
									SET		`NOMBRE`=:nom,
												`APELLIDO_I`=:ap1,
												`APELLIDO_II`=:ap2,
												`TEL_USUARIO`=:tel,
												`CEL_USUARIO`=:cel
									WHERE `CORREO` = :cor");//aqui se guardan los datos despues de realizar el execute


			$stmt->execute(array(	'nom'=>$nom,
									'ap1'=>$ap1,
									'ap2'=>$ap2,
									'tel'=>$tel,
									'cel'=>$cel,
									'cor'=>$username));

		}

		echo "nombre  ".$nom."<br>";
		echo "apellido 1 ".$ap1."<br>";
		echo "apellido 2 ".$ap2."<br>";
		echo "telefono ".$tel."<br>";
		echo "celular ".$cel."<br>";
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}
?>
