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
  <!-- forma de hacer ssi en php -->
  <?php virtual ("admin_header.php");?>

  <title>Administración de universidades</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<form>
<div class="container">
  <h2>Administración de universidades</h2>
  <p>Para eliminar o modificar presione el botón correspondiente</p>


  <table class="table">
    <thead>
      <tr>
        <th>Sigla</th>
        <th>Nombre</th>
		    <th>Teléfono</th>
        <th>Acciones</th>
	</tr>
    </thead>
    <tbody>
	<!--una fila con el collapse-->
      <tr class="success" colspan="8">
        <td >UCR</td>
        <td>Universidad de Costa Rica</td>
		<td>2511-4000</td>
        <td>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalModificar" >Modificar
			<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			</button>
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalBloquear">Bloquear
			<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
			</button>
        </td>
      </tr>
    </tbody>
  </table>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregar">Agregar Universidad
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	</button>

  <!-- Modal -->
	<div class="modal fade" id="modalBloquear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Bloquear Universidad</h4>
		  </div>
		  <div class="modal-body">
			¿Está seguro que desea bloquear esta universidad del sistema?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-danger">Bloquear
			<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
			</button>
		  </div>
		</div>
	  </div>
</div>

</form>

<form>
<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="modalModificarLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalModificarLabel">Modificar universidad</h4>
        </div>
        <div class="modal-body">
          <Form name="modificar_universidad" role="form" ng-controller="MainCtrl">

          <div class="form-group">
              <div class="input-group col-md-4 has-success">
                      <div class="input-group-addon">Siglas&nbsp;&nbsp;&nbsp;&nbsp; </div>
                      <input type="text" name="siglas_modificar">
              </div>
          </div>

          <div class="form-group">
              <div class="input-group col-md-4 has-success">
                      <div class="input-group-addon">Nombre&nbsp;</div>
                      <input type="text" name="nombre_modificar">
              </div>
          </div>

          <div class="form-group">
              <div class="input-group col-md-4 has-success">
                      <div class="input-group-addon">Teléfono</div>
                      <input type="text" name="telefono_modificar">
              </div>
          </div>

          </Form>


        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning">Modificar
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </button>
        </div>
      </div>
      </div>
    </div>
    </form>

    <form action="php/administrador/add_universidades.php" method="post">

    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAgregarLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalModificarLabel">Agregar universidad</h4>
        </div>
        <div class="modal-body">
          <Form name="modificar_universidad" role="form" ng-controller="MainCtrl">

          <div class="form-group">
              <div class="input-group col-md-4 has-success">
                      <div class="input-group-addon">Siglas&nbsp;&nbsp;&nbsp;&nbsp; </div>
                      <input type="text" name="siglas_agregar">
              </div>
          </div>

          <div class="form-group">
              <div class="input-group col-md-4 has-success">
                      <div class="input-group-addon">Nombre&nbsp;</div>
                      <input type="text" name="nombre_agregar">
              </div>
          </div>

          <div class="form-group">
              <div class="input-group col-md-4 has-success">
                      <div class="input-group-addon">Teléfono</div>
                      <input type="text" name="telefono_agregar">
              </div>
          </div>

          </Form>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Agregar
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
        </div>
      </div>
      </div>
    </div>
    </form>
</div>

</body>
<footer>
<?php virtual ("footer.html");?>
</footer>
</html>
