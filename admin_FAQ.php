<!DOCTYPE html>
<html lang="es">
<!--Esta parte se tiene que hacer con shtml para no tener que copiarla en todo lado-->
  <head>

    <?php virtual ("admin_header.php");?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FAQ</title>

    <meta name="description" content="Página Inicio Usuarios">
    <meta name="author" content="Luis Mata, Jose Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">

  </head>
<!--Aqui termina la parte del header de usuarios-->
  <body>

	<div class="container">
		<h2>Preguntas Frecuentes</h2>
		<p>En esta sección se encuentran algunas preguntas normalmente formuladas por los usuarios</p>
		  <div class="panel-group" id="accordion">
			<div class="panel panel-success">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">¿Dónde ingreso mi clave de acceso?</a>
				</h4>
			  </div>
			  <div id="collapse1" class="panel-collapse collapse in">
				<div class="panel-body">En la página principal de acceso a la matriz de indicadores, se presenta la opción para ingresar el usuario, que es el correo electrónico del dominio redies.cr. Seguidamente se presenta un espacio para ingresar la clave.</div>
			  </div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Olvidé mi contraseña: ¿Cómo puedo reestablecerla?</a>
				</h4>
			  </div>
			  <div id="collapse2" class="panel-collapse collapse">
				<div class="panel-body">En la página principal de acceso existe la opción de reestablecer la contraseña, la cual solicita el correo electrónico del usuario, con el fin de enviarle la nueva clave de acceso.</div>
			  </div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">¿Cómo puedo cambiar mi contraseña?</a>
				</h4>
			  </div>
			  <div id="collapse3" class="panel-collapse collapse">
				<div class="panel-body">En caso de que desee cambiar su contraseña por razones de seguridad, visite su perfil de usuario. En esa sección encontrará la opción de reestablecer su clave de seguridad, de forma inmediata.</div>
			  </div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">
				<h4 class="panel-title ">
				  <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">¿Cómo puedo editar la información de mi perfil de usuario?</a>
				</h4>
			  </div>
			  <div id="collapse4" class="panel-collapse collapse">
				<div class="panel-body">La opción de usuario muestra la información de contacto del usuario, en esta pantalla se muestra la opción de “actualizar perfil”, la cual permite cambiar la información del perfil cuando sea requerido. Esta información es importante para lograr contactar los representantes de REDIES, así como para enviar recordatorios cuando sea necesario ingresar datos a la matriz Web.</div>
			  </div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">
				<h4 class="panel-title ">
				  <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">¿Cómo puedo completar los indicadores de mi universidad?</a>
				</h4>
			  </div>
			  <div id="collapse5" class="panel-collapse collapse">
				<div class="panel-body">Al ingresar a la aplicación Web, encontrará la opción para completar los indicadores. En este apartado, se mostrarán las diferentes áreas de la matriz, algunas de ellas  pueden estar activas o inactivas, según los requerimientos del administrador. Una vez elegida el área de la matriz que se desea ingresar, la aplicación Web mostrará cada una de las preguntas que se deben responder. También se encuentra disponible el ícono de ayuda, para obtener una breve explicación del dato requerido.</div>
			  </div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">
				<h4 class="panel-title ">
				  <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">¿Cómo puedo cerrar sesión?</a>
				</h4>
			  </div>
			  <div id="collapse6" class="panel-collapse collapse">
				<div class="panel-body">Al ingresar a la aplicación Web, encontrará la opción para completar los indicadores. En este La aplicación Web brinda la opción de cerrar sesión por medio de un botón de “salir”, ubicado en la página principal de la aplicación.</div>
			  </div>
			</div>
		  </div>
		</div>

  </body>

<footer>
<?php virtual ("footer.html");?>
</footer>
</html>
