
<?php
session_start();
?>
<?php

	try{
		include("../conexion/conexion.php");

	//	echo "consultas de usuario";
		$m_con= mysql_connect($host,$username,$pw) or die ("Problemas al conectar con el servidor");
		mysql_select_db($db,$m_con) or die("Problemas al conectar la base de datos");

		$id_universidad = $_SESSION['universidad'];
		$username = $_SESSION['correo'];

//$_POST['anio_inicio'] no está funcionando*************************************




    /*echo "<br>Ano inicio: ".$anio_inicio;
    echo "<br>Ano fin: ".$anio_fin;


		echo "Id de la universidad ".$id_universidad."<br>";
		echo "Correo del usuario ".$username."<br>";
*/
		//Conexion con la base de datos
		$conn = new PDO('mysql:host=localhost;dbname=redies_indicadores', 'root', 'root');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$anio_inicio = 2014;
		$anio_fin = 2014;

		$query = "SELECT *
							FROM cn
							WHERE FORMULARIO_ID
							IN( SELECT ID
									FROM formulario
									WHERE ANHO >= :anio_inicio AND ANHO <= :anio_fin AND UNIVERSIDAD_ID = :universidad_id)";

	 $stmt = $conn->prepare($query);
	 $stmt->execute(array('universidad_id'=>$id_universidad, 'anio_inicio'=>$anio_inicio, 'anio_fin'=>$anio_fin));
	 $row = $stmt->fetchAll( PDO::FETCH_ASSOC );

	 $json = json_encode($row);

	 echo $json;


		/*if ($_POST['busqueda_areas'] == 'areas')	{
      echo "Seleccione areas<br>";
      $area_seleccionada = $_POST['usuario_consulta_area'];
      $anio_inicio = $_POST["anio_inicio"];
      $anio_fin = $_POST["anio_fin"];
      echo $area_seleccionada."<br>";
      switch ($area_seleccionada) {//Si la consulta se hara por areas
        case "CN":
                  echo "entré a CN<br>";
                  $query = "SELECT *
                            FROM cn
                            WHERE FORMULARIO_ID
                            IN( SELECT ID
                                FROM formulario
                                WHERE ANHO >= :anio_inicio AND ANHO <= :anio_fin AND UNIVERSIDAD_ID = :universidad_id)";

                 $stmt = $conn->prepare($query);
                 $stmt->execute(array('universidad_id'=>$id_universidad, 'anio_inicio'=>$anio_inicio, 'anio_fin'=>$anio_fin));
                 $row = $stmt->fetchAll( PDO::FETCH_ASSOC );

								 $json = json_encode($row);

								 echo $json;



        break;
        case "GR":
                  echo "entré a GR<br>";
                  $query = "SELECT *
                            FROM gr
                            WHERE FORMULARIO_ID
                            IN( SELECT ID
                                FROM formulario
                                WHERE ANHO >= :anio_inicio AND ANHO <= :anio_fin AND UNIVERSIDAD_ID = :universidad_id)";

                 $stmt = $conn->prepare($query);
                 $stmt->execute(array('universidad_id'=>$id_universidad, 'anio_inicio'=>$anio_inicio, 'anio_fin'=>$anio_fin));
                 $row = $stmt->fetch();
                 echo json_encode($row);

                 echo $row[0]."<br>";
        #code...
        break;
        case "GRE":
                    echo "entré a GRE<br>";
                    $query = "SELECT *
                              FROM gre
                              WHERE FORMULARIO_ID
                              IN( SELECT ID
                                  FROM formulario
                                  WHERE ANHO >= :anio_inicio AND ANHO <= :anio_fin AND UNIVERSIDAD_ID = :universidad_id)";

                   $stmt = $conn->prepare($query);
                   $stmt->execute(array('universidad_id'=>$id_universidad, 'anio_inicio'=>$anio_inicio, 'anio_fin'=>$anio_fin));
                   $row = $stmt->fetch();
                   echo json_encode($row);

                   echo $row[0]."<br>";
        #code...
        break;
        case "RHACH":
                      echo "entré a RH_ACH<br>";
                      $query = "SELECT *
                                FROM rh_ach
                                WHERE FORMULARIO_ID
                                IN( SELECT ID
                                    FROM formulario
                                    WHERE ANHO >= :anio_inicio AND ANHO <= :anio_fin AND UNIVERSIDAD_ID = :universidad_id)";

                     $stmt = $conn->prepare($query);
                     $stmt->execute(array('universidad_id'=>$id_universidad, 'anio_inicio'=>$anio_inicio, 'anio_fin'=>$anio_fin));
                     $row = $stmt->fetch();
                     echo json_encode($row);

                     echo $row[0]."<br>";

        break;
        case "RHAR":
                    echo "entré a RH_AR<br>";
                    $query = "SELECT *
                              FROM rh_ar
                              WHERE FORMULARIO_ID
                              IN( SELECT ID
                                  FROM formulario
                                  WHERE ANHO >= :anio_inicio AND ANHO <= :anio_fin AND UNIVERSIDAD_ID = :universidad_id)";

                   $stmt = $conn->prepare($query);
                   $stmt->execute(array('universidad_id'=>$id_universidad, 'anio_inicio'=>$anio_inicio, 'anio_fin'=>$anio_fin));
                   $row = $stmt->fetch();
                   echo json_encode($row);

                   echo $row[0]."<br>";
        break;
        case "RS":
                  echo "entré a RS<br>";
                  $query = "SELECT *
                            FROM grs
                            WHERE FORMULARIO_ID
                            IN( SELECT ID
                                FROM formulario
                                WHERE ANHO >= :anio_inicio AND ANHO <= :anio_fin AND UNIVERSIDAD_ID = :universidad_id)";

                 $stmt = $conn->prepare($query);
                 $stmt->execute(array('universidad_id'=>$id_universidad, 'anio_inicio'=>$anio_inicio, 'anio_fin'=>$anio_fin));
                 $row = $stmt->fetch();
                 echo json_encode($row);

                 echo $row[0]."<br>";
        break;
        case "all_areas":
        #code
        break;
        case "areas_personalizadas":
        #CODE...
        break;
        default:
        echo "caso default de las areas";
        break;
      }


    }

    else{
      if($_POST['busqueda_areas'] == 'tipos'){
        echo "Seleccioné tipos";

      }

    }
		*/
  }
  catch(PDOException $excp){
    echo 'error: ' . $excp->getMessage();
  }

?>
