<!DOCTYPE html>
<html lang="es">
<head>
  <?php virtual ("usuario_header.php");?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Recurso Hídrico: Agua para Consumo Humano</title>

  <meta name="description" content="Matriz de indicadores - Recurso Hídrico, Agua para consumo humano">
  <meta name="author" content="Luis Mata, José Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí$">
  <!--<link href="css/form.css" rel="stylesheet">-->

</head>
<body ng-app="formApp" id="form">
  <div class="container-fluid">
    <!-- fila -->
    <div class="row">

      <!-- columna 1 -->

          <div class="col-md-1"> </div>

      <!-- columna 1 // -->

      <!-- columna 2 -->

      <div class="col-md-11">
        <h3>Recurso Hídrico: Agua para Consumo Humano</h3>

        <form name="form" role="form" ng-controller="MainCtrl" method="post" action="php/formularios/RH_ACH.php">
          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.consumoPC.$error.required || !formData.consumoPC }">
            <label for="RH_ACH_Q1">
              Consumo de agua per cápita
            </label>
            <div class="input-group col-md-4 has-success">
              <input  type="text" class="form-control"
              name="consumoPC" id="RH_ACH_Q1" min="0"
              ng-model="formData.consumoPC"
              onclick="validacionND(type, 'RH_ACH_Q1', 'consumoPCRadio1')"
              required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"
              >
              <div class="input-group-addon">m<sup>3</sup>/persona</div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de agua consumida por persona al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>
            <div class="input-group col-md-4 has-success">
              <label class="radio-inline">
                <input type="radio" name="consumoPC" id="consumoPCRadio1"
                value="N/D" ng-model="formData.consumoPC"
                onclick="validacionND(type, 'RH_ACH_Q1', 'consumoPCRadio1')"
              > N/D
              </label>
            </div>
          </div>


          <div class="form-group">

            <label for="RH_ACH_Q2">
              Inventario fuentes de agua
            </label>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.nPozos.$error.required || !formData.nPozos }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="nPozos" id="RH_ACH_Q2.1" min="0"
                ng-model="formData.nPozos"
                onclick="validacionNDNA(type, 'RH_ACH_Q2.1', 'nPozosRadio1', 'nPozosRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/A$|^N\/D$"/>
                <span class="input-group-addon">pozos</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el número de pozos"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="nPozos" id="nPozosRadio1"
                  value="N/A" ng-model="formData.nPozos"
                  onclick="validacionNDNA(type, 'RH_ACH_Q2.1', 'nPozosRadio1', 'nPozosRadio2')" > N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="nPozos" id="nPozosRadio2"
                  value="N/D" ng-model="formData.nPozos"
                  onclick="validacionNDNA(type, 'RH_ACH_Q2.1', 'nPozosRadio1', 'nPozosRadio2')" > N/D
                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.nNacientes.$error.required || !formData.nNacientes }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="nNacientes" id="RH_ACH_Q2.2" min="0"
                ng-model="formData.nNacientes"
                onclick="validacionNDNA(type, 'RH_ACH_Q2.2', 'nNacientesRadio1', 'nNacientesRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/A$|^N\/D$"/>
                <span class="input-group-addon">nacientes</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el número de nacientes"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>

              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="nNacientes" id="nNacientesRadio1"
                  value="N/A" ng-model="formData.nNacientes"
                  onclick="validacionNDNA(type, 'RH_ACH_Q2.2', 'nNacientesRadio1', 'nNacientesRadio2')"> N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="nNacientes" id="nNacientesRadio2"
                  value="N/D" ng-model="formData.nNacientes"
                  onclick="validacionNDNA(type, 'RH_ACH_Q2.2', 'nNacientesRadio1', 'nNacientesRadio2')"> N/D
                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.nRios.$error.required || !formData.nRios }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="nRios" id="RH_ACH_Q2.3" min="0"
                ng-model="formData.nRios"
                onclick="validacionNDNA(type, 'RH_ACH_Q2.3', 'nRiosRadio1', 'nRiosRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/A$|^N\/D$">
                <div class="input-group-addon">ríos</div>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el número de ríos"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name ="nRios" id="nRiosRadio1"
                  value="N/A" ng-model="formData.nRios"
                  onclick="validacionNDNA(type, 'RH_ACH_Q2.3', 'nRiosRadio1', 'nRiosRadio2')"> N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="nRios" id="nRiosRadio2"
                  value="N/D" ng-model="formData.nRios"
                  onclick="validacionNDNA(type, 'RH_ACH_Q2.3', 'nRiosRadio1', 'nRiosRadio2')"> N/D
                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.nHidrometros.$error.required || !formData.nHidrometros }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="nHidrometros" id="RH_ACH_Q2.4" min="0"
                ng-model="formData.nHidrometros"
                onclick="validacionNDNA(type, 'RH_ACH_Q2.4', 'nHidrometrosRadio1', 'nHidrometrosRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/A$|^N\/D$"/>
                <div class="input-group-addon">hidrómetros</div>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el número de hidrómetros"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="nHidrometros" id="nHidrometrosRadio1"
                  value="N/A" ng-model="formData.nHidrometros"
                  onclick="validacionNDNA(type, 'RH_ACH_Q2.4', 'nHidrometrosRadio1', 'nHidrometrosRadio2')"
                  > N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="nHidrometros" id="nHidrometrosRadio2"
                  value="N/D" ng-model="formData.nHidrometros"
                  onclick="validacionNDNA(type, 'RH_ACH_Q2.4', 'nHidrometrosRadio1', 'nHidrometrosRadio2')"
                  > N/D
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.consumoAgua.$error.required || !formData.consumoAgua }">
            <label for="RH_ACH_Q3">
              Registros de consumo de agua
            </label>
            <div class="input-group col-md-4 has-success" >
              <input  type="text" class="form-control"
              name="consumoAgua" id="RH_ACH_Q3" min="0"
              ng-model="formData.consumoAgua"
              onclick="validacionND(type, 'RH_ACH_Q3', 'consumoAguaRadio1')"
              required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/>
              <div class="input-group-addon">m<sup>3</sup></div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de agua consumida al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>
            <div class="input-group col-md-4 has-success">
              <label class="radio-inline">
                <input  type="radio" name="consumoAgua" id="consumoAguaRadio1"
                value="N/D" ng-model="formData.consumoAgua"
                onclick="validacionND(type, 'RH_ACH_Q3', 'consumoAguaRadio1')"> N/D
              </label>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.analisisCalidad.$error.required || !formData.analisisCalidad }">
            <label for="RH_ACH_Q4">
              ¿Se realizan análisis de calidad de agua?
            </label>
            <div class="input-group col-md-4 has-success">
              <div class="radio-inline">
                <label>
                  <input type="radio" name="analisisCalidad" value="Sí" ng-model="formData.analisisCalidad" required>
                  Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="analisisCalidad" value="No" ng-model="formData.analisisCalidad" >
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="analisisCalidad" value="N/A" ng-model="formData.analisisCalidad" >
                  N/D
                </label>
              </div>
            </div>
          </div>
<!--
          <div class="form-group" >

            <label for="RH_ACH_Q5">
              ¿Poseen plan de ahorro de agua?
            </label>

            <div class="form-group has-success" ng-class="{ 'has-error' : form.planAhorro.$invalid }" >
            <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="planAhorroRadio" id="porcentajeReduccionRadio1"
                          value="Sí" ng-model="formData.planAhorro"
                          onchange="validacionSINO(type, 'RH_ACH_Q5', 'porcentajeReduccionRadio1', 'porcentajeReduccionRadio2', 'porcentajeReduccionRadio3')">
                  Sí
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="planAhorroRadio" id="porcentajeReduccionRadio2"
                          value="No" ng-model="formData.planAhorro"
                          onchange="validacionSINO(type, 'RH_ACH_Q5', 'porcentajeReduccionRadio1', 'porcentajeReduccionRadio2', 'porcentajeReduccionRadio3')" >
                  No
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="planAhorroRadio" id="porcentajeReduccionRadio3"
                          value="N/D" ng-model="formData.planAhorro"
                          onchange="validacionSINO(type, 'RH_ACH_Q5', 'porcentajeReduccionRadio1', 'porcentajeReduccionRadio2', 'porcentajeReduccionRadio3')" >
                  N/D
                </label>
            </div>
            <div class="form-group"  ng-show="formData.porcentajeReduccion=='Sí'">
              <label>Ingrese el porcentaje de reducción</label>
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                        name="planAhorro" id="RH_ACH_Q5"
                        ng-model="formData.planAhorro"
                        onchange="validacionSINO(type, 'RH_ACH_Q5', 'porcentajeReduccionRadio1', 'porcentajeReduccionRadio2', 'porcentajeReduccionRadio3')"
                        required pattern="^[0-9][0-9]?$|^100$|[0-9]+[0-9]?,[0-9]+$"
                />
                <span class="input-group-addon">% reducción</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el porcentaje de reducción"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
            </div>
          </div>
        </div>
-->

<div class="form-group">

  <label for="RH_ACH_Q5">
    ¿Poseen plan de ahorro de agua?
  </label>

  <div class="form-group has-success" ng-class="{ 'has-error' : form.planAhorro.$invalid}">
    <div class="input-group col-md-4" >
        <label class="radio-inline">
          <input  type="radio" name="planAhorroRadio" id="planAhorroRadio1"
                  value="Sí"
                  ng-model="formData.planAhorro"
                  onchange="validacionSINO(type, 'RH_ACH_Q5', 'planAhorroRadio1', 'planAhorroRadio3', 'planAhorroRadio3')"
          > Sí
        </label>
        <label class="radio-inline">
          <input  type="radio" name="planAhorroRadio" id="planAhorroRadio2"
                  value="No"
                  ng-model="formData.planAhorro"
                  onchange="validacionSINO(type, 'RH_ACH_Q5', 'planAhorroRadio1', 'planAhorroRadio3', 'planAhorroRadio3')"
          > No
        </label>
        <label class="radio-inline">
          <input  type="radio" name="planAhorroRadio" id="planAhorroRadio3"
                  value="N/D"
                  ng-model="formData.planAhorro"
                  onchange="validacionSINO(type, 'RH_ACH_Q5', 'planAhorroRadio1', 'planAhorroRadio3', 'planAhorroRadio3')"
          > N/D
        </label>
      </div>
      <div   class="form-group"><!---->
      <label> Ingrese meta </label>
        <div class="input-group col-md-4">
          <input  type="text" class="form-control"
                  name="planAhorro" id="RH_ACH_Q5"
                  ng-model="formData.planAhorro"
                  onchange="validacionSINO(type, 'RH_ACH_Q5', 'planAhorroRadio1', 'planAhorroRadio3', 'planAhorroRadio3')"
                  required pattern="^[0-9][0-9]?$|^100$|[0-9]+[0-9]?,[0-9]+$|^No$|^N\/D$"
          />
          <span class="input-group-addon">% reducción</span>
          <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la meta de porcentaje de reducción de emisiones al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
        </div>
      </div>
  </div>
</div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.planManejo.$error.required || !formData.planManejo }">
            <label for="RH_ACH_Q6">
              ¿Poseen plan de manejo de cuerpos de agua?
            </label>
            <div class="input-group col-md-4 has-success">
              <div class="radio-inline">
                <label>
                  <input type="radio" name="planManejo" value="Sí" ng-model="formData.planManejo" required>
                  Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="planManejo" value="No" ng-model="formData.planManejo" >
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="planManejo" value="N/D" ng-model="formData.planManejo" >
                  N/D
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="planManejo" value="N/A" ng-model="formData.planManejo" >
                  N/A
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.permisoExplotacion.$error.required || !formData.permisoExplotacion }">
            <label for="RH_ACH_Q7">
              ¿Poseen permisos de explotación de pozos?
            </label>
            <div class="input-group col-md-4 has-success">
              <div class="radio-inline">
                <label>
                  <input type="radio" name="permisoExplotacion" value="Sí" ng-model="formData.permisoExplotacion" required>
                  Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="permisoExplotacion" value="No" ng-model="formData.permisoExplotacion" >
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="permisoExplotacion" value="N/D" ng-model="formData.permisoExplotacion" >
                  N/D
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="permisoExplotacion" value="N/A" ng-model="formData.permisoExplotacion" >
                  N/A
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.planMantenimiento.$error.required || !formData.planMantenimiento }">
            <label for="RH_ACH_Q8">
              ¿Poseen plan de mantenimiento de sistemas de abastecimiento de agua?
            </label>
            <div class="input-group col-md-4 has-success">
              <div class="radio-inline">
                <label>
                  <input type="radio" name="planMantenimiento" value="Sí" ng-model="formData.planMantenimiento" required>
                  Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="planMantenimiento" value="No" ng-model="formData.planMantenimiento" >
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="planMantenimiento" value="N/D" ng-model="formData.planMantenimiento" >
                  N/D
                </label>
              </div>
              <div class="radio-inline">
              </div>
            </div>
          </div>

          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success btn-block" ng-click="submitForm(formData)" ng-disabled="!form.$valid">
              <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
              Enviar Formulario
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

<?php virtual ("footer.html");?>

</html>


<!--
          VALIDACIÓN DE CAMPOS


          <div class="row">
            <div class="col-xs-3">
              <h3>Validación Formulario</h3>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td ng-class="{ success: form.$valid, danger: form.$invalid }">Valid</td>
                  </tr>
                  <tr>
                    <td ng-class="{ success: form.$pristine, danger: !form.$pristine }">Pristine</td>
                  </tr>
                  <tr>
                    <td ng-class="{ success: form.$dirty }">Dirty</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="row">
              <div class="col-xs-3">
                <h3>Validación de campos</h3>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td ng-class="{ success: form.consumoPC.$valid, danger: form.consumoPC.$invalid}">consumoPC valido</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.consumoPC.error.danger: formData.consumoPC.error.$required}">consumoPC requerido</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.nPozos.$valid, danger: form.nPozos.$invalid}">Pozos</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.nNacientes.$valid, danger: form.nNacientes.$invalid}">Nacientes</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.nRios.$valid, danger: form.nRios.$invalid}">Rios</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.nHidrometros.$valid, danger: form.nHidrometros.$invalid}">Hidrometros</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.consumoAgua.$valid, danger: form.consumoAgua.$invalid}">Consumo Agua</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.analisisCalidad.$valid, danger: form.analisisCalidad.$invalid}">Analisis Calidad</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.planAhorro.$valid, danger: form.planAhorro.$invalid}">Plan Ahorro</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.planManejo.$valid, danger: form.planManejo.$invalid}">Plan Manejo</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.permisoExplotacion.$valid, danger: form.permisoExplotacion.$invalid}">Permiso Explotación</td>
                    </tr>
                    <tr>
                      <td ng-class="{ success: form.planMantenimiento.$valid, danger: form.planMantenimiento.$invalid}">Plan Mantenimiento</td>
                    </tr>
                  </tbody>
                </table>
              </div>
-->
