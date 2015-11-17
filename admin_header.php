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
          <a href="admin_header.html">
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
      <span class="navbar-brand" href="#"> <?php echo $_SESSION['usuario'].'&nbsp;'.$_SESSION['apellido'] ?> </span>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="admin_users.php">Usuarios</a>
            </li>
            <li>
              <a href="admin_formularios.php">Formularios</a>
            </li>
            <li>
                  <a href="admin_universidades.php">Universidades</a>
            </li>
          </ul>
        </li>

        <li>
            <a href="/REDIES/admin_consultas.php">Consultar Indicadores</a>
    </li>

      </ul>

      <ul class="nav navbar-nav navbar-right">

       <li>
          <a href="/REDIES/admin_perfil.php">Perfil</a>
        </li>
        <li>
          <a href="/REDIES/FAQ.php">Preguntas Frecuentes</a>
        </li>
        <li>
          <a href="php/login/logout_a.php"><strong>Salir</strong></a>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- menu nuevo // -->

<!-- Menu viejo
			<nav class="navbar navbar-custom" role="navigation">
				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="#">REDIES</a>

				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="/REDIES/admin_users.shtml">Usuarios</a>
                </li>
                <li>
                  <a href="/REDIES/admin_formularios.shtml">Formularios</a>
                </li>
                <li>
                      <a href="/REDIES/admin_universidades.shtml">Universidades</a>
                </li>
              </ul>
            </li>
            <li>
                  <a href="/REDIES/admin_consultas.shtml">Consultar Indicadores</a>
            </li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="/REDIES/admin_perfil.shtml">Perfil</a>
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
	</div>
-->
  </head>
<!--Aqui termina la parte del header de usuarios-->

  <body> </body>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-messages.js"></script>

</html>
