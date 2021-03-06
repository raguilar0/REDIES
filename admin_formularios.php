<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administración de Formularios</title>

        <meta name="description" content="Admin- Administracion de Formularios">
        <meta name="author" content="Luis Mata, José Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">

        <!-- forma de hacer ssi en php -->
        <?php virtual ("admin_header.php");?>

    </head>

<body>
	<script type="text/javascript">
        function mostrarFechaCN(){
            document.getElementById('fechaCN').style.display = 'inline-block';
        };
        function ocultarFechaCN(){
            document.getElementById('fechaCN').style.display = 'none';
        };
        function mostrarFechaGR(){
            document.getElementById('fechaGR').style.display = 'inline-block';
        };
        function ocultarFechaGR(){
            document.getElementById('fechaGR').style.display = 'none';
        };
        function mostrarFechaGRE(){
            document.getElementById('fechaGRE').style.display = 'inline-block';
        };
        function ocultarFechaGRE(){
            document.getElementById('fechaGRE').style.display = 'none';
        };
        function mostrarFechaRHACH(){
            document.getElementById('fechaRHACH').style.display = 'inline-block';
        };
        function ocultarFechaRHACH(){
            document.getElementById('fechaRHACH').style.display = 'none';
        };
        function mostrarFechaRHAR(){
            document.getElementById('fechaRHAR').style.display = 'inline-block';
        };
        function ocultarFechaRHAR(){
            document.getElementById('fechaRHAR').style.display = 'none';
        };
        function mostrarFechaRS(){
            document.getElementById('fechaRS').style.display = 'inline-block';
        };
        function ocultarFechaRS(){
            document.getElementById('fechaRS').style.display = 'none';
        };
      </script>

      <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <div class="container-fluid">
        <div class="row">

            <!-- columna 1 -->

            <div class="col-md-1"> </div>

            <!-- columna 1 // -->

            <!-- columna 2 -->

            <div class="col-md-11">
                <h3>
                    Administración de Formularios
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Seleccione una opción entre Activar o desactivar el formulario. Si lo activa tiene que seleccionar una fecha de inicio y de finalización"><img src="images/question_icon.png" style="width:20px;height:20px;"></a>
                </h3>
            <form name="form" role="form" ng-controller="MainCtrl">
                <div class="form-group">
                    <label for="ADF_I1">
                        Carbono Neutralidad
                    </label>
                    <div class="input-group col-md-3 has-success">
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioCN"  value="Activado" onclick="mostrarFechaCN()">
                            Activar
                          </label>
                        </div>
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioCN"  value="desactivado" onclick="ocultarFechaCN()">
                            Desactivar
                          </label>
                        </div>

                        <div id="fechaCN" name="input_fechaCN" style='display:none;'>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Desde</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                            <br>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Hasta</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ADF_I2">
                        Gestión de Recursos
                    </label>
                    <div class="input-group col-md-3 has-success">
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioGR"  value="Sí" onclick="mostrarFechaGR()">
                            Activar
                          </label>
                        </div>
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioGR"  value="desactivado" onclick="ocultarFechaGR()">
                            Desactivar
                          </label>
                        </div>

                        <div id="fechaGR" name="input_fechaGR" style='display:none;'>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Desde</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                            <br>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Hasta</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ADF_I2">
                        Gestión de Recursos Energéticos
                    </label>
                    <div class="input-group col-md-3 has-success">
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioGRE"  value="Sí" onclick="mostrarFechaGRE()">
                            Activar
                          </label>
                        </div>
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioGRE"  value="desactivado" onclick="ocultarFechaGRE()">
                            Desactivar
                          </label>
                        </div>

                        <div id="fechaGRE" name="input_fechaGRE" style='display:none;'>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Desde</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                            <br>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Hasta</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ADF_I2">
                        Recurso Hídrico: Aguas de Consumo Humano
                    </label>
                    <div class="input-group col-md-3 has-success">
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioRHACH"  value="Sí" onclick="mostrarFechaRHACH()">
                            Activar
                          </label>
                        </div>
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioRHACH"  value="desactivado" onclick="ocultarFechaRHACH()">
                            Desactivar
                          </label>
                        </div>

                        <div id="fechaRHACH" name="input_fechaRHACH" style='display:none;'>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Desde</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                            <br>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Hasta</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ADF_I2">
                        Recurso Hídrico: Aguas Residuales
                    </label>
                    <div class="input-group col-md-3 has-success">
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioRHAR"  value="Sí" onclick="mostrarFechaRHAR()">
                            Activar
                          </label>
                        </div>
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioRHAR"  value="desactivado" onclick="ocultarFechaRHAR()">
                            Desactivar
                          </label>
                        </div>

                        <div id="fechaRHAR" name="input_fechaRHAR" style='display:none;'>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Desde</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                            <br>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Hasta</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ADF_I2">
                        Residuos Sólidos
                    </label>
                    <div class="input-group col-md-3 has-success">
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioRS"  value="Sí" onclick="mostrarFechaRS()">
                            Activar
                          </label>
                        </div>
                        <div class="radio-inline">
                          <label>
                            <input type="radio"  name="radioRS"  value="desactivado" onclick="ocultarFechaRS()">
                            Desactivar
                          </label>
                        </div>

                        <div id="fechaRS" name="input_fechaRS" style='display:none;'>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Desde</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                            <br>
                            <div class="input-group col-md-3 has-success" >
                                <div class="input-group-addon">Hasta</div>
                                <input type="date" min="2016-01-01" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-success btn-block">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        Guardar Cambios
                    </button>
            </div>
            </Form>
        </div>
    </div>
    </div>
</body>
<script src="js/app.js"></script>
<?php virtual ("footer.html");?>
</html>
