<?php
  
  session_start();

  if(!$_SESSION){
    echo' <script languaje = javascript>
					self.location = "login.html"
					</script>';
  }

?>
<!DOCTYPE html>
<html lang="es" >
<head>
	
	<!-- forma de hacer algo parecido a ssi en php -->
  <?php virtual ("admin_header.php");?>
	
  <title>Administración de Usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/data.js"></script>

</head>

<body  ng-app="myApp" ng-controller="GetUsers">

<div class="container">
  <h2>Administración de usuarios</h2>
  <p>Para eliminar o modificar presione el botón correspondiente</p>

  <!--lo agregué acá porque hacía falta, pero hay que acomodarlo donde corresponde!!! -->
  <!--<a href="/REDIES/agregar_usuario.html">Agregar Usuario</a>-->
  
   <form>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
        <input type="text" class="form-control" placeholder="Buscar usuario" ng-model="searchUser">
      </div>      
    </div>
  </form>
  
  <div class="panel panel-default">
	  <table class="table table-hover table-responsive">
	    <thead>
	      <tr>
	        <th>
	        	<a href="#" ng-click="sortType = 'nombre'; sortReverse = !sortReverse">
	            Nombre
	          <!--<span ng-show="sortType == 'nombre'  && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
	          <span ng-show="sortType == 'nombre'  && sortReverse" class="glyphicon glyphicon-triangle-top"></span>-->
	          </a>
	        </th>
	        <th>
	        	<a href="#" ng-click="sortType = 'apellido_I'; sortReverse = !sortReverse">
	            Apellido 1
	            <!--<span ng-show="sortType == 'apellido_I'  && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
	         		<span ng-show="sortType == 'apellido_I'  && sortReverse" class="glyphicon glyphicon-triangle-top"></span>-->
	          </a>
	        </th>
					<th>Apellido 2</th>
	        <th>Correo electrónico</th>
					<th>Teléfono</th>
					<th>
						<a href="#" ng-click="sortType = 'nombre_u'; sortReverse = !sortReverse">
	            Universidad
	            <!--<span ng-show="sortType == 'nombre_u'  && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
	          	<span ng-show="sortType == 'nombre_u'  && sortReverse" class="glyphicon glyphicon-triangle-top"></span>-->
	          </a>
					</th>
					<th>
						<a href="#" ng-click="sortType = 'rol'; sortReverse = !sortReverse">
	            Rol
	          <!--<span ng-show="sortType == 'rol'  && !sortReverse" class="glyphicon glyphicon-triangle-bottom"></span>
	          <span ng-show="sortType == 'rol'  && sortReverse" class="glyphicon glyphicon-triangle-top"></span>-->
	          </a>
					</th>
	        <th>Acciones</th>
				</tr>
	    </thead>
    <tbody>
	<!--una fila con el collapse-->
      <tr class="success" ng-repeat="user in users | orderBy:sortType:sortReverse | filter:searchUser">
        <td>{{user.nombre}}</td>
        <td>{{user.apellido_I}}</td>
				<td>{{user.apellido_II}}</td>
				<td>{{user.correo}}</td>
				<td>{{user.telefono}}</td>
				<td>{{user.nombre_u}}</td>
				<td>{{user.rol}}</td>
        <td>
            	<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#modificar1" class="accordion-toggle">
            	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            	Modificar
							</button>

							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							Eliminar
							</button>
        </td>
      </tr>
	  <!--<tr >
            <td colspan="8" class="hiddenRow">
				<div class="accordian-body collapse" id="modificar1">
					<div class="col-md-4">
						<div class="input-group">
							<div class="input-group-addon">Nombre</div>
							<input type="text" class="form-control" name="nombre">
						</div>
						<div class="input-group">
							<div class="input-group-addon">Apellidos</div>
							<input type="text" class="form-control" name="apellidos">
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<div class="input-group-addon">@</div>
							<input type="text" class="form-control" name="correo">
						</div>
						<div class="input-group">
							<div class="input-group-addon">Teléfono</div>
							<input type="text" class="form-control" name="telefono">
						</div>
						<!--<button type="button" class="btn btn-success btn-block">Guardar Cambios
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						</button>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<div class="input-group-addon">Universidad</div>
							<input type="text" class="form-control" name="telefono">
						</div>
						<div class="input-group">
							<div class="input-group-addon">Rol</div>
							<input type="text" class="form-control" name="telefono">
						</div>
						<!--<button type="button" class="btn btn-success btn-block">Reestablecer Contraseña
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						</button>
					</div>
				</div>
			</td>
      </tr>-->
	<!-- termina la fila -->
    </tbody>
  </table>
  </div>
  
  <!-- boton agregar usuarios -->
  <button type="button" class="btn btn-primary btn-md" name="btn_addUser" name="btn_addUser" data-toggle="modal" data-target="#addUser">
 	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;
 	Agregar usuario
  </button>
  <!-- termina boton -->
  
  <!-- Modal de eliminar usuarios -->
	<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Eliminar Usuario</h4>
		  </div>
		  <div class="modal-body">
			¿Está seguro que desea eliminar este usuario del sistema?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-danger">Eliminar
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Modal de agregar usuarios -->
	<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
		  </div>
		  <div class="modal-body">
			 	<div class="panel panel-success">
				 	<div class="panel-heading">Datos Personales</div>
				 	<div class="panel-body">
						<form>
							<div class="form-group row">
						    <label for="add_nombre" class="col-sm-2 form-control-label">Nombre</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="add_nombre" placeholder="Nombre">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="add_apellido1" class="col-sm-2 form-control-label">Apellido 1</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="add_apellido1" placeholder="Apellido 1">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="add_apellido2" class="col-sm-4 form-control-label">Apellido 2</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="add_apellido2" placeholder="Apellido 2">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" id="inputEmail3" placeholder="usuario@redies.cr">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="add_pass1" class="col-sm-2 form-control-label">Contraseña</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" id="add_pass1" placeholder="contraseña">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="add_pass2" class="col-sm-2 form-control-label">Repetir contraseña</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" id="add_pass2" placeholder="repetir contraseña">
						    </div>
						  </div>
						</form>
					</div>
				</div>
		 </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-primary">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			Agregar
			</button>
		  </div>
		</div>
	  </div>
	</div>
</div>

</body>

<footer>
<!--#include file="footer.html" -->
 <?php virtual ("footer.html");?>
</footer>
	
</html>
