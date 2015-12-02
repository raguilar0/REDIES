<?php
  
  session_start();

  if(!$_SESSION){
    echo' <script languaje = javascript>
					self.location = "login.html"
					</script>';
  }

?>
<!DOCTYPE html>
<html lang="es">

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
			<th>Móvil</th>
			<th>
				<a href="#" ng-click="sortType = 'nombre_u'; sortReverse = !sortReverse">
	            Institución
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
      <tr id="{{user.correo}}" class="success" ng-repeat="user in users | orderBy:sortType:sortReverse | filter:searchUser">
        <td>{{user.nombre}}</td>
        <td>{{user.apellido_I}}</td>
		<td>{{user.apellido_II}}</td>
		<td>{{user.correo}}</td>
		<td>{{user.tel_usuario}}</td>
		<td>{{user.tel_movil}}</td>
		<td>{{user.nombre_u}}</td>
		<td>{{user.rol}}</td>
        <td>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modUser" class="accordion-toggle" ng-click="editUsr(user.usr)">
            	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            	Modificar
			</button>
			
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser">
				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				Eliminar
			</button>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
  
  <!-- boton agregar usuarios -->
  <button type="button" class="btn btn-primary btn-md" name="btn_addUser" name="btn_addUser" data-toggle="modal" data-target="#addUser">
 	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;
 	Agregar usuario
  </button>
  <!-- termina boton -->
  
  <!-- Modales -->
  
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
						<form class="form-horizontal"> 
							<div class="form-group row">
						    	<label for="add_nombre" class="col-sm-4 form-control-label">Nombre</label>
						    	<div class="col-sm-8">
						      		<input type="text" class="form-control" id="add_nombre" placeholder ="Nombre">
						    	</div>
						  </div>
						  <div class="form-group row">
						    <label for="add_apellido1" class="col-sm-4 form-control-label">Apellido 1</label>
						    <div class="col-sm-8">
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
						    <label for="add_email" class="col-md-4 form-control-label">Email</label>
						    <div class="col-md-8">
						      <input type="email" class="form-control" id="add_email" placeholder="usuario@redies.cr">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="add_universidad" class="col-md-4 form-control-label">Universidad</label>
						    <div class="col-md-8">
						    	<div class="input-group">
						    	<input type="text" class="form-control" id="add_universidad" placeholder="Universidad">
								<div class="input-group-btn">
              				  		<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    					<span class="caret"></span>
                			  		</button>
			                		<ul id="universidades" class="dropdown-menu dropdown-menu-right">
			                    		<li><a href="#">Universidad de Costa Rica</a></li>
			                    		<li><a href="#">Universidad Nacional</a></li>
			                    		<li><a href="#">Instituto Tecnológico de Costa Rica</a></li>
			                		</ul>
            					</div>
						    </div>
						  	</div>
						  </div>
						  <div class="form-group row">
						    <label for="add_rol" class="col-sm-4 form-control-label">Rol</label>
						    <div class="col-sm-8">
						    	<div class="input-group">
      								<input type="text" class="form-control" aria-label="..." id ="mod_rol">
      								<div class="input-group-btn">
       									<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       										<span class="caret"></span>
        								</button>
        								<ul id = "roles" class="dropdown-menu dropdown-menu-right">
          									<li><a href="#">Administrador</a></li>
          									<li><a href="#">Representante</a></li>
        								</ul>
      								</div><!-- /btn-group -->
    							</div><!-- /input-group -->
						    </div> 
						  </div>
						  <div class="form-group row">
						    <label for="add_pass1" class="col-sm-4 form-control-label">Contraseña</label>
						    <div class="col-sm-8">
						      <input type="password" class="form-control" id="add_pass1" placeholder="contraseña">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="add_pass2" class="col-sm-4 form-control-label">Repetir contraseña</label>
						    <div class="col-sm-8">
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

	<!-- Termina modal de eliminar usuarios-->
	
	<!-- Modal de modificar usuarios -->
	
		<div class="modal fade" id="modUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Modificar Usuario</h4>
		  </div>
		  <div class="modal-body">
			 	<div class="panel panel-warning">
				 	<div class="panel-heading">Datos Personales</div>
				 	<div class="panel-body">
						<form class="form-horizontal"> 
							<div class="form-group row">
						    	<label for="mod_nombre" class="col-sm-4 form-control-label">Nombre</label>
						    	<div class="col-sm-8">
						      		<input ng-model="nombre" type="text" class="form-control" id="mod_nombre" disabled>
						    	</div>
						  	</div>
							  <div class="form-group row">
							    <label for="mod_apellido1" class="col-sm-4 form-control-label">Apellido 1</label>
							    <div class="col-sm-8">
							      <input ng-model="apellido_I" type="text" class="form-control" id="mod_apellido1" disabled>
							    </div>
							  </div>
						  <div class="form-group row">
						    <label for="mod_apellido2" class="col-sm-4 form-control-label">Apellido 2</label>
						    <div class="col-sm-8">
						      <input ng-model="apellido_II" type="text" class="form-control" id="mod_apellido2" disabled>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="mod_email" class="col-md-4 form-control-label">Email</label>
						    <div class="col-md-8">
						      <input ng-model="correo" type="email" class="form-control" id="mod_email" disabled>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="mod_universidad" class="col-md-4 form-control-label">Universidad</label>
						    <div class="col-md-8">
						    	<div class="input-group">
						    		<input ng-model="universidad" type="text" class="form-control" id="mod_universidad">
									<div class="input-group-btn">
              				  			<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    						<span class="caret"></span>
                			  			</button>
			                			<ul id="universidades" class="dropdown-menu dropdown-menu-right">
			                    			<li><a href="#">Universidad de Costa Rica</a></li>
			                    			<li><a href="#">Universidad Nacional</a></li>
			                    			<li><a href="#">Instituto Tecnológico de Costa Rica</a></li>
			                			</ul>
            						</div>
						    	</div>
						  	</div>
						  </div>
						  <div class="form-group row">
						    <label for="mod_rol" class="col-sm-4 form-control-label">Rol</label>
						    <div class="col-sm-8">
						    	<div class="input-group">
      								<input ng-model="rol" type="text" class="form-control" aria-label="..." id ="mod_rol">
      								<div class="input-group-btn">
       									<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       										<span class="caret"></span>
        								</button>
        								<ul id = "roles" class="dropdown-menu dropdown-menu-right">
          									<li><a href="#">Administrador</a></li>
          									<li><a href="#">Representante</a></li>
        								</ul>
      								</div><!-- /btn-group -->
    							</div><!-- /input-group -->
						    </div> 
						  </div>
						</form>
					</div>
				</div>
		 </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-warning">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			Modificar
			</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Termina modal de modificar usuarios-->
	
	<!-- Terminan los modales -->
	
</div>

</body>

<script type="text/javascript">
	$('#universidades li').on('click', function(){
    $('#add_universidad').val($(this).text());
    $('#mod_universidad').val($(this).text());
});
</script>

<script type="text/javascript">
	$('#roles li').on('click', function(){
    $('#mod_rol').val($(this).text());
});
</script>

<footer>
	<!-- forma de hacer algo parecido a ssi en php -->
	<?php virtual ("footer.html");?>
</footer>
	
</html>
