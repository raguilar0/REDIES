<!DOCTYPE HTML>
<html lang="en">
<head>
  <?php virtual ("usuario_header.php");?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Perfil de Usuario</title>

    <meta name="description" content="Perfil de Usuario">
    <meta name="author" content="Luis Mata, José Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">


</head>


<body ng-app="formApp">
    <div class="container-fluid">

    <!-- fila -->
    <div class="row">

      <!-- columna 1 -->

          <div class="col-md-1"> </div>

      <!-- columna 1 // -->

      <!-- columna 2 -->

      <div class="col-md-11">

        <H3> Perfil de usuario</H3>

        <form name="formulario_UP" role="form" ng-controller="MainCtrl">

        <div class="form-group">
            <label>
                Información
                <a href="#" data-toggle="tooltip" data-placement="top" title="Digíte la información del usuario"><img src="images/question_icon.png" style="width:20px;height:20px;"></a>
            </label>

            <div class="input-group col-md-4 has-success" ng-class="{ 'has-error': !formulario_UP.$pristine && formulario_UP.nombre.$error.required}">
                    <div class="input-group-addon">
                    Nombre </div>

                    <input  type="text" class="form-control"
                            name="nombre"
                            ng-model="formData.nombre" required>
            </div>

            <span ng-show="!formulario_UP.$pristine && formulario_UP.nombre.$error.required" class="help-block">Ingrese su nombre</span>
        </div>

        <div class="form-group">
            <div class="input-group col-md-4 has-success" ng-class="{ 'has-error': !formulario_UP.$pristine && formulario_UP.correo.$error.required}">
                    <div class="input-group-addon">Correo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <input type="text" class="form-control"
                    name="correo"
                    ng-model="formData.correo" required>
            </div>
            <span ng-show="!formulario_UP.$pristine && formulario_UP.correo.$error.required" class="help-block">Ingrese su correo</span>
            <span ng-show="!formulario_UP.$pristine && formulario_UP.correo.$error.email" class="help-block">Ingrese su correo correctamente</span>
        </div>

        <div class="form-group">
            <div class="input-group col-md-4 has-success" ng-class="{ 'has-error': !formulario_UP.$pristine && formulario_UP.universidad.$error.required }">

                    <div class="input-group-addon">Universidad</div>
                    <input  type="text" class="form-control" name="universidad" ng-model="formData.universidad" required>
            </div>

            <span ng-show="!formulario_UP.$pristine && formulario_UP.universidad.$error.required" class="help-block">Ingrese la universidad</span>

        </div>

        <div class="form-group">

        <div class="casilla">
            <div class="input-group col-md-4 col-sm-12 col-xs-12 has-success">
                    <div class="input-group-addon">Profesión</div>
                    <input type="text" class="form-control" name="profesion" ng-model="formData.profesion" >
            </div>
        </div>

        </div>

        <div class="form-group">

        <div class="casilla">
            <div class="input-group col-md-4 col-sm-12 col-xs-12 has-success">
                    <div class="input-group-addon">Puesto </div>
                    <input type="text" class="form-control" name="puesto" ng-model="formData.puesto">
            </div>
        </div>

        </div>

        <div class="form-group">

            <div class="input-group col-md-4 has-success" ng-class="{ 'has-error': !formulario_UP.$pristine && formulario_UP.telefono.$error.required }">
                    <div class="input-group-addon">Teléfono &nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <input  type="tel" class="form-control"
                            name="telefono" ng-model="formData.telefono" required>
            </div>
              <span ng-show="!formulario_UP.$pristine && formulario_UP.telefono.$error.required" class="help-block">Ingrese su número de teléfono</span>

        </div>

        <div class="form-group">
            <div class="input-group col-md-4 has-success">
                    <!--<a href="javascript:abrir('cambiar_password.html')">Cambiar Contraseña</a>-->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCambiarContraseña">Cambiar Contraseña
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                		</button>
            </div>
        </div>

        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success btn-block" ng-click="submitForm(formData)" ng-disabled="formulario_UP.$invalid">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                Guardar Cambios
            </button>
        </div>

        </Form>
        <!--<br>
        Form content:
        {{formData}}
      </br>-->
        </div>
    </div>
    </div>
    <!-- Modal cambiar contraseña -->
    <div class="modal fade" id="modalCambiarContraseña" tabindex="-1" role="dialog" aria-labelledby="modalCambiarContraseñaLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalCambiarContraseñaLabel">Cambiar Contraseña</h4>
        </div>
        <div class="modal-body">
          <Form name="CambiarContrasena" role="form" ng-controller="MainCtrl">

          <div class="form-group">
              <div class="input-group col-md-4 has-success">
                      <div class="input-group-addon">Contraseña actual &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                      <input type="password" name="cambiar_pass_actual">
              </div>
          </div>

          <div class="form-group">
              <div class="input-group col-md-4 has-success">
                      <div class="input-group-addon">Contraseña nueva &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                      <input type="password" name="cambiar_pass_nueva">
              </div>
          </div>

          <div class="form-group">
              <div class="input-group col-md-4 has-success">
                      <div class="input-group-addon">Repetir nueva contraseña</div>
                      <input type="password" name="cambiar_pass_confirmacion">
              </div>
          </div>

          </Form>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success">Cambiar
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </button>
        </div>
      </div>
      </div>
    </div>

</body>
<script src="js/app.js"></script>
<script>
function abrir(url) {
open(url,'','top=300,left=300,width=426,height=266') ;
}
</script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<footer>
<!--#include file="footer.html" -->
</footer>
</html>