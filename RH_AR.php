<!DOCTYPE html>
<html lang="en">
<head>
  <?php virtual ("usuario_header.php");?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Recurso Hídrico: Aguas Residuales</title>

  <meta name="description" content="Matriz de indicadores - Recurso Hídrico, Aguas Residuales">
  <meta name="author" content="Luis Mata, José Slon, Michael Qurós, Ricardo Aguilar, Brandon Sardí">

</head>
<body ng-app="formApp"  onload="llenarAR();">

  <div class="container-fluid">
    <!-- fila -->
    <div class="row">

      <!-- columna 1 -->

      <div class="col-md-1"> </div>

      <!-- columna 1 // -->

      <!-- columna 2 -->

      <div class="col-md-11">
        <h3>
          Recurso Hídrico: Aguas Residuales
        </h3>
        <form name="form" role="form" ng-controller="MainCtrl" method="post" action="php/formularios/RH_AR.php">

          <div class="form-group">

            <label class="input-group col-md-4 has-success" for="RH_AR_Q1">
              Inventario de efluentes de aguas residuales y puntos de descarga
            </label>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.descargasAP.$error.required || !formData.descargasAP }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="descargasAP" id="RH_AR_Q1.1" min="0"
                ng-model="formData.descargasAP"
                onclick="validacionNDNA(type, 'RH_AR_Q1.1', 'descargasAPRadio2', 'descargasAPRadio1')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$|^N\/A$"/>
                <span class="input-group-addon">descargas al alcantarillado público</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de descargas al alcantarillado público anualmente"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="radioDescargasAP" id="descargasAPRadio1"
                  value="N/A" ng-model="formData.descargasAP"
                  onclick="validacionNDNA(type, 'RH_AR_Q1.1', 'descargasAPRadio2', 'descargasAPRadio1')"/> N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="radioDescargasAP" id="descargasAPRadio2"
                  value="N/D" ng-model="formData.descargasAP"
                  onclick="validacionNDNA(type, 'RH_AR_Q1.1', 'descargasAPRadio2', 'descargasAPRadio1')"/> N/D
                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.descargasTS.$error.required || !formData.descargasTS }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="descargasTS" id="RH_AR_Q1.2" min="0"
                ng-model="formData.descargasTS"
                onclick="validacionNDNA(type, 'RH_AR_Q1.2', 'descargasTSRadio1', 'descargasTSRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$|^N\/A$"/>
                <span class="input-group-addon">descargas a tanques sépticos</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de descargas a tanques sépticos anualmente"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="radioDescargasTS" id="descargasTSRadio1"
                  value="N/A" ng-model="formData.descargasTS"
                  onclick="validacionNDNA(type, 'RH_AR_Q1.2', 'descargasTSRadio1', 'descargasTSRadio2')"> N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="radioDescargasTS" id="descargasTSRadio2"
                  value="N/D" ng-model="formData.descargasTS"
                  onclick="validacionNDNA(type, 'RH_AR_Q1.2', 'descargasTSRadio1', 'descargasTSRadio2')"> N/D
                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.descargasST.$error.required || !formData.descargasST }">
              <div class="input-group col-md-4">
                <input type="text" class="form-control"
                name="descargasST" id="RH_AR_Q1.3" min="0"
                ng-model="formData.descargasST"
                onclick="validacionNDNA(type, 'RH_AR_Q1.3', 'descargasSTRadio1', 'descargasSTRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$|^N\/A$"/>
                <span class="input-group-addon">descargas al sistema de tratamiento</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de descargas a sistemas de tratamiento anualmente"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="radioDescargasST" id="descargasSTRadio1"
                  value="N/A" ng-model="formData.descargasST"
                  onclick="validacionNDNA(type, 'RH_AR_Q1.3', 'descargasSTRadio1', 'descargasSTRadio2')"> N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="radioDescargasST" id="descargasSTRadio2"
                  value="N/D" ng-model="formData.descargasST"
                  onclick="validacionNDNA(type, 'RH_AR_Q1.3', 'descargasSTRadio1', 'descargasSTRadio2')"> N/D
                </label>
              </div>
            </div>
          </div>


          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.sistemaTratamientoAR.$error.required || !formData.sistemaTratamientoAR }">
            <label for="RH_AR_Q2" class="input-group col-md-4 has-success">
              ¿Posee sistema de tratamiento de aguas residuales debidamente inscrito y con un diseño adecuado a la naturaleza del agua residual a tratar?
            </label>
            <div class="input-group col-md-4 has-success">
              <div class="radio-inline">
                <label>
                  <input type="radio" name="sistemaTratamientoAR" value="Sí" ng-model="formData.sistemaTratamientoAR" required>
                  Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="sistemaTratamientoAR" value="No" ng-model="formData.sistemaTratamientoAR" >
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="sistemaTratamientoAR" value="N/D" ng-model="formData.sistemaTratamientoAR" >
                  N/D
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="sistemaTratamientoAR" value="N/A" ng-model="formData.sistemaTratamientoAR" >
                  N/A
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="RH_AR_Q3">
              ¿Realiza análisis de aguas residuales?
            </label>
            <div class="input-group col-md-4 has-success" ng-class="{ 'has-error' : !form.$pristine  && form.analisisAR.$error.required || !formData.analisisAR }">
              <div class="radio-inline">
                <label>
                  <input type="radio" name="analisisAR" value="Sí" ng-model="formData.analisisAR" required>
                  Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="analisisAR" value="No" ng-model="formData.analisisAR" >
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="analisisAR" value="N/D" ng-model="formData.analisisAR" >
                  N/D
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="analisisAR" value="N/A" ng-model="formData.analisisAR" >
                  N/A
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.reportesOP.$error.required || !formData.reportesOP }">
            <label for="RH_AR_Q4">
              Reportes Operacionales
            </label>
            <div class="input-group col-md-4 has-success">
              <input  type="text" class="form-control"
              name="reportesOP" id="RH_AR_Q4" min="0"
              ng-model="formData.reportesOP"
              onclick="validacionNDNA(type, 'RH_AR_Q4', 'reportesOPRadio1', 'reportesOPRadio2')"
              required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$|^N\/A$" />
              <div class="input-group-addon">reportes operacionales</div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de reportes operacionales"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>
            <div class="input-group col-md-4">
              <label class="radio-inline">
                <input  type="radio" name="radioReportesOP" id="reportesOPRadio1"
                value="N/A" ng-model="formData.reportesOP"
                onclick="validacionNDNA(type, 'RH_AR_Q4', 'reportesOPRadio1', 'reportesOPRadio2')" > N/A
              </label>
              <label class="radio-inline">
                <input  type="radio" name="radioReportesOP" id="reportesOPRadio2"
                value="N/D" ng-model="formData.reportesOP"
                onclick="validacionNDNA(type, 'RH_AR_Q4', 'reportesOPRadio1', 'reportesOPRadio2')" > N/D
              </label>
            </div>
          </div>

          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success btn-block" ng-click="submitForm(formData)" ng-disabled="!form.$valid">
              <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
              Enviar Formulario
            </button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    function llenarAR(){


    };
    </script>

    <script src="js/app.js"></script>
  </body>

  <footer>
    <?php virtual ("footer.html");?>
  </footer>
  </html>
