<!DOCTYPE HTML>
<html lang="en">
<head>
  <?php virtual ("usuario_header.php");?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cambiar contraseña</title>

    <meta name="description" content="Matriz de indicadores - Gestion del Recurso Energetico">
    <meta name="author" content="Luis Mata, José Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">

</head>


<body ng-app="formApp">
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <H3>
                Cambiar contraseña
            </H3> <!--#42775e-->


            <Form name="CambiarContrasena" role="form" ng-controller="MainCtrl">

            <div class="form-group">
                <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Contraseña actual &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <input type="password" name="cambiar_pass_actual">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Contraseña nueva &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <input type="password" name="cambiar_pass_nueva">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Repetir nueva contraseña</div>
                        <input type="password" name="cambiar_pass_confirmacion">
                </div>
            </div>

            <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-success btn-block">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        Cambiar Contraseña
                    </button>
            </div>
            </Form>
        </div>
    </div>
    </div>
</body>
<script src="js/app.js"></script>
</html>