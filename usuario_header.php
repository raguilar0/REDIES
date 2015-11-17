
<?php
  session_start();

  if(!$_SESSION){
    echo  '<script languaje = "javascript">
					self.location = "login.html"
					</script>';
  }
?>

<!DOCTYPE html>
<html lang="es">
<!--Esta parte se tiene que hacer con shtml para no tener que copiarla en todo lado-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Matriz de Indicadores</title>

    <meta name="description" content="Página Inicio Usuarios">
    <meta name="author" content="Luis Mata, Jose Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

	<div class="container-fluid">

	<style type="text/css">

		.main_logo
		{
			padding-left: 20px;
			padding-bottom: 10px;
		}

	</style>

	<!-- logo -->
	<div class="row">

		<div class="col-md-12">

	        <div class="main_logo">
	          <a href="usuario_header.html">
	            <img src="images/layouts/main_logo.jpg" alt="Red Costarricense de Instituciones Educativas Sostenibles">
	          </a>

	        </div>

        </div>

    </div>
    <!-- logo // -->

<!-- menu nuevo -->

<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- espacio de nommbre de empresa en el menu-->
      <span class="navbar-brand">REDIES</span>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Indicadores <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/REDIES/RH_ACH.php">Recursos Hídricos: Agua para consumo Humano</a></li>
            <li><a href="/REDIES/RH_AR.php">Recursos Hídricos: Aguas Residuales</a></li>
            <li><a href="/REDIES/GRE.php"> Gestión del Recurso Energético</a></li>
            <li>
				<a href="/REDIES/CN.php">Carbono Neutralidad</a>
			</li>
			<li>
				<a href="/REDIES/RS.php">Residuos Sólidos</a>
			</li>
			<li>
				<a href="/REDIES/GR.php">Gestión de Recursos</a>
			</li>
          </ul>
        </li>

        <li>
			<a href="/REDIES/usuario_consultas.php">Consultar Datos</a>
		</li>

      </ul>

      <ul class="nav navbar-nav navbar-right">

       <li>
			<a href="/REDIES/usuario_perfil.php">Perfil</a>
		</li>
		<li>
			<a href="/REDIES/FAQ.php">Preguntas Frecuentes</a>
		</li>
		<li>
			<a href="/REDIES/login.html"><strong>Salir</strong></a>
		</li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- menu nuevo // -->




	<!-- menu respaldo

	<div class="row">

	<div class="col-md-12">

		<nav class="navbar navbar-custom" >

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Indicadores<strong class="caret"></strong></a>

								<ul class="dropdown-menu">
									<li>
										<a href="/REDIES/RH_ACH.shtml">Recursos Hídricos: Agua para consumo Humano</a>
									</li>
									<li>
										<a href="/REDIES/RH_AR.shtml">Recursos Hídricos: Aguas Residuales</a>
									</li>
									<li>
										<a href="/REDIES/GRE.shtml"> Gestión del Recurso Energético </a>
									</li>
									<li>
										<a href="/REDIES/CN.shtml">Carbono Neutralidad</a>
									</li>
									<li>
										<a href="/REDIES/RS.shtml">Residuos Sólidos</a>
									</li>
									<li>
										<a href="/REDIES/GR.shtml">Gestión de Recursos</a>
									</li>
								</ul>
						</li>
						<li>
							<a href="/REDIES/usuario_consultas.shtml">Consultar Datos</a>
						</li>

					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="/REDIES/usuario_perfil.shtml">Perfil</a>
						</li>
						<li>
							<a href="/REDIES/FAQ.shtml">Preguntas Frecuentes</a>
						</li>
						<li>
							<a href="/REDIES/login.html"><strong>Salir</strong></a>
						</li>

						(((<li>
							<p class="navbar-btn">
								<a href="#" class="btn btn-success ">Salir</a>
							</p>
						</li>)))

					</ul>
				</div>
			</nav>
		</div>

		</div>
	-->


  </head>
<!--Aqui termina la parte del header de usuarios-->
  <body>

    <!--Footer
    <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation" id="footer">
      <div class="container">
        <div class="navbar-text pull-left">
          <span>Universidad de Costa Rica •</span>
          <span> Escuela de las Ciencias de la Computación y la Informática •</span>
          <span> 2015 <span>
        </div>
      </div>
    </div>
-->

  </body>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>
</html>
