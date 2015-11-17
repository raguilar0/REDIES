<?php
	include("../conexion/conexion.php");
	echo "estoy en agregar Universidad<br>";

	$m_con= mysql_connect($host,$username,$pw) or die ("Problemas al conectar con el servidor".mysql_error());
	mysql_select_db($db,$m_con) or die("Problemas al conectar la base de datos");

	$siglas = $_POST['siglas_agregar'];
	$nombre = $_POST['nombre_agregar'];
	$telefono = $_POST['telefono_agregar'];


	$query = "INSERT INTO `universidad`( `siglas`,`NOMBRE`, `TELEFONO` ) VALUES ('".$siglas."','".$nombre."','".$telefono."');";

	$result = mysql_query($query) or die("Error al agregar la universidad ".mysql_error());

	echo $query."<br>";

	header('Location:../../admin_universidades.shtml');
?>
