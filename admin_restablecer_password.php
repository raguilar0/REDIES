<!DOCTYPE HTML>
<html lang="en">
<head>
  <?php virtual ("admin_header.php");?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Restablecer contraseña</title>

    <meta name="description" content="Admin Restablecer Password">
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
                Restablecer contraseña
            </H3>
            <Form name="admin_restablecer_password" role="form" ng-controller="MainCtrl">
                <div class="form-group">
                    <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Contraseña nueva</div>
                        <input type="password" name="admin_restablecer_pass_confirmacion" class="form-control">

                        <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Escriba aquí la contraseña nueva"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Repetir contraseña nueva</div>
                        <input type="password" name="admin_restablecer_pass_confirmacion" class="form-control">

                        <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Vuelva a escribir la contraseña nueva"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <button type="submit" value="Restablecer Contraseña" name="admin_usuario_boton_restablecer_pass" class="btn btn-success btn-block">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        Restablecer Contraseña
                    </button>
                </div>

            </Form>
        </div>
    </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>

</html>