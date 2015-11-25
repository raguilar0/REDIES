<?php
session_start();
?>
<?php

include("../conexion/conexion.php");


	$nom = $_POST['nombre'];
	$cor = $_POST['correo'];
	$uni = $_POST['universidad'];
	$pro = $_POST['profesion'];
	$pue = $_POST['puesto'];
	$tel = $_POST['telefono'];

	
	
	echo "nombre  ".$nom."<br>";
	echo "apellido 1 ".$ap1."<br>";
	echo "apellido 2 ".$ap2."<br>";
	echo "telefono ".$tel."<br>";
	echo "celular ".$cel."<br>";


	//Hacemos la conexion con la base de datos.

	
		try{
			
			$id_universidad = $_SESSION['universidad'];
			$username = $_SESSION['correo'];
	
	
	
			$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', '');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $conn->prepare("UPDATE `usuarios` 
									SET `NOMBRE`=:nom,
										`APELLIDO_I`=:ap1,
										`APELLIDO_II`=:ap2,
										`tel`=tel,
										`cel`=cel
									WHERE `CORREO` = :cor");//aqui se guardan los datos despues de realizar el execute
									
									
			$stmt->execute(array(	'nom'=>$nom,
									'ap1'=>$ap1,
									'ap2'=>$ap2,
									'tel'=>$tel,
									'cel'=>$cel,
									'cor'=>$username,));

		}
	catch(PDOException $excp){
		echo 'error: ' . $excp->getMessage();
	}
?>	