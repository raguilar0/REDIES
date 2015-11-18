<!DOCTYPE html>
<html lang="es">
<head>
  <?php virtual ("admin_header.php");?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Agregar usuario</title>

    <meta name="description" content="admin_agregar_usuarip">
    <meta name="author" content="Luis Mata, José Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">

</head>

<body ng-app="formApp">
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <div class="container-fluid">
    <!-- fila -->
    <div class="row">

      <!-- columna 1 -->

          <div class="col-md-1"> </div>

      <!-- columna 1 // -->

      <!-- columna 2 -->

      <div class="col-md-11">
            <H3>
                Agregar usuario
            </H3>

            <Form name="agregar_Usuario" role="form" ng-controller="MainCtrl">
                <div class="form-group">
                    <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Nombre</div>
                        <input type="text" name="agregar_usuario_nombre" class="form-control">

                        <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Escriba aquí el nombre del nuevo usuario"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Correo</div>
                        <input type="text" name="agregar_usuario_correo" class="form-control">

                        <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Esciba el correo"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Universidad</div>
                        <input type="text" name="agregar_usuario_universidad" class="form-control">

                        <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Escriba la Universidad a la que pertenece"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Teléfono</div>
                        <input type="text" name="agregar_usuario_telefono" class="form-control">

                        <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Teléfono del nuevo usuario"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Contraseña</div>
                        <input type="text" name="agregar_usuario_password" class="form-control">

                        <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Digite la contraseña"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-3 has-success">
                        <div class="input-group-addon">Rol</div>
                        <select name = "admin_agregar_usuario_rol" class="form-control">
                             <option value="administrador">Administrador</option>
                             <option value="representante">Representante</option>
                        </select>
                        <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Seleccione el rol correspondiente al nuevo usuario"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <button type="submit" value="Agregar Usuario" class="btn btn-success btn-block">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        Agregar Usuario
                    </button>
                </div>
               </table>
            </Form>
        </div>
    </div>
    </div>
</body>
<script src="js/app.js"></script>

<footer>
<!--#include file="footer.html" -->
</footer>


</html>