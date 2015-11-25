<!DOCTYPE HTML>
<html lang="es">
<head>
  <?php virtual ("usuario_header.php");?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gestión de Recursos</title>

  <meta name="description" content="Formulario Gestion de Recurso">
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
        <H3>
          Gestión de Recursos
        </H3>
        <Form name="form" role="form" ng-controller="MainCtrl" method="post" action="php/formularios/GR.php">
          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.PoliticaGestionAmbiental.$error.required || !formData.PoliticaGestionAmbiental }">
            <label for="GR_Q1">
              ¿Poseen política de gestión ambiental?
              <a href="#" data-toggle="tooltip" data-placement="top" title="Seleccione una opción entre sí, no, o N/D (No definido)"><img src="images/question_icon.png" style="width:20px;height:20px;"></a>
            </label>
            <div class="input-group col-md-4 has-success" >
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="PoliticaGestionAmbiental"
                  id="GR_Q1"
                  value="Sí"
                  ng-model="formData.PoliticaGestionAmbiental" required>
                  Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="PoliticaGestionAmbiental"
                  value="No"
                  ng-model="formData.PoliticaGestionAmbiental" >
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="PoliticaGestionAmbiental"
                  value="N/D"
                  ng-model="formData.PoliticaGestionAmbiental" >
                  N/D
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.PlanGestionAmbiental.$error.required || !formData.PlanGestionAmbiental }">
            <label for="GR_Q2">
              ¿Poseen plan de gestión ambiental institucional?
              <a href="#" data-toggle="tooltip" data-placement="top" title="Seleccione una opción entre sí, no, o N/D (No definido)"><img src="images/question_icon.png" style="width:20px;height:20px;"></a>
            </label>
            <div class="input-group col-md-4 has-success">
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="PlanGestionAmbiental"
                  id="GR_Q2"
                  value="Sí"
                  ng-model="formData.PlanGestionAmbiental" required>
                  Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="PlanGestionAmbiental"
                  value="No"
                  ng-model="formData.PlanGestionAmbiental" >
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="PlanGestionAmbiental"
                  value="N/D"
                  ng-model="formData.PlanGestionAmbiental" >
                  N/D
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.nivelParticipacion.$error.required || !formData.nivelParticipacion }">
            <label for="GR_Q3">
              Nivel de participación en actividades de educación ambiental
            </label>
            <div class="input-group col-md-4 has-success">
              <input 	type="text"
              class="form-control"
              name="nivelParticipacion"
              id="GR_Q3.1"
              min="0"
              ng-model="formData.nivelParticipacion"
              onclick="validacionND(type, 'GR_Q3.1', 'nivelParticipacionRadio1')"
              required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/><!--GRE_IV_G  DOUBLE-->
              <div class="input-group-addon">Personas por año</div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de personas por año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>

            <div class="input-group col-md-4 has-success">
              <label class="radio-inline">
                <input  type="radio"
                name="nivelParticipacion"
                id="nivelParticipacionRadio1"
                value ="N/D"
                ng-model="formData.nivelParticipacion"
                onclick="validacionND(type, 'GR_Q3.1', 'nivelParticipacionRadio1')"> N/D
              </label>
            </div>
          </div>

          <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.iniciativaAmbiental.$error.required || !formData.iniciativaAmbiental }">
            <label for="GR_Q4">
              ¿Existen iniciativas de proyección ambiental hacia la comunidad?
              <a href="#" data-toggle="tooltip" data-placement="top" title="Seleccione una opción entre sí, no, o N/D (No definido)"><img src="images/question_icon.png" style="width:20px;height:20px;"></a>
            </label>
            <div class="input-group col-md-4 has-success">
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="iniciativaAmbiental"
                  value="Sí"
                  ng-model="formData.iniciativaAmbiental" required>Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="iniciativaAmbiental"
                  value="No"
                  ng-model="formData.iniciativaAmbiental" >No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="iniciativaAmbiental"
                  value="N/D"
                  ng-model="formData.iniciativaAmbiental" >N/D
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.consumoPapel.$error.required || !formData.consumoPapel }">
            <label for="GR_Q5">
              Consumo de papel al año
            </label>
            <div class="input-group col-md-4 has-success">
              <input  type="text" class="form-control"
              name="consumoPapel" id="GR_Q5" min="0"
              ng-model="formData.consumoPapel"
              onclick="validacionND(type, 'GR_Q5', 'consumoPapelRadio1')"
              required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"
              >
              <div class="input-group-addon">resmas/año</div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de resmas de papel consumidas al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>
            <div class="input-group col-md-4 has-success">
              <label class="radio-inline">
                <input  type="radio" name="consumoPapel" id="consumoPapelRadio1"
                value="N/D" ng-model="formData.consumoPapel"
                onclick="validacionND(type, 'GR_Q5', 'consumoPapelRadio1')"
                > N/D
              </label>
            </div>
          </div>







		            <div class="form-group">

            <label for="GR_Q6">
              ¿Existen programas de compras verdes?
            </label>

            <div class="form-group has-success" ng-class="{ 'has-error' : form.ComprasVerdes.$invalid}">
              <div class="input-group col-md-4" >
                  <label class="radio-inline">
                    <input  type="radio" name="ComprasVerdes" id="emisionesRadio1"
                            value="Sí"
                            ng-model="formData.ComprasVerdes"
                            onchange="validacionSINO(type, 'GR_Q6', 'emisionesRadio1', 'emisionesRadio2', 'emisionesRadio3')"
                    > Sí
                  </label>
                  <label class="radio-inline">
                    <input  type="radio" name="ComprasVerdes" id="emisionesRadio2"
                            value="No"
                            ng-model="formData.ComprasVerdes"
                            onchange="validacionSINO(type, 'GR_Q6', 'emisionesRadio1', 'emisionesRadio2', 'emisionesRadio3')"
                    > No
                  </label>
                  <label class="radio-inline">
                    <input  type="radio" name="ComprasVerdes" id="emisionesRadio3"
                            value="N/D"
                            ng-model="formData.ComprasVerdes"
                            onchange="validacionSINO(type, 'GR_Q6', 'emisionesRadio1', 'emisionesRadio2', 'emisionesRadio3')"
                    > N/D
                  </label>
                </div>
                <div   class="form-group"><!---->
                <label> Ingrese la cantidad de toneladas de CO<sub>2</sub> por año </label>
                  <div class="input-group col-md-4">
                    <input  type="text" class="form-control"
                            name="ComprasVerdes" id="GR_Q6"
                            ng-model="formData.ComprasVerdes"
                            onchange="validacionSINO(type, 'GR_Q6', 'emisionesRadio1', 'emisionesRadio2', 'emisionesRadio3')"
                            required pattern="[0-9]+$|[0-9]+,[0-9]+$|^No$|^N\/D$"
                    />
                    <span class="input-group-addon">toneladas de CO<sub>2</sub></span>
                    <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese las toneladas de CO2 emitidas al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                  </div>
                </div>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.ComisionGestionAmbiental.$error.required || !formData.ComisionGestionAmbiental }">
            <label for="GR_Q7">
              ¿Existe comision de gestión ambiental?
              <a href="#" data-toggle="tooltip" data-placement="top" title="Seleccione una opción entre sí, no, o N/D (No definido)"><img src="images/question_icon.png" style="width:20px;height:20px;"></a>
            </label>
            <div class="input-group col-md-4 has-success">
              <div class="radio-inline">
                <label>
                  <input  type="radio"
                  name="ComisionGestionAmbiental"
                  value="Sí"
                  ng-model="formData.ComisionGestionAmbiental" required>
                  Sí
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="ComisionGestionAmbiental"
                  value="No"
                  ng-model="formData.ComisionGestionAmbiental" >
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input 	type="radio"
                  name="ComisionGestionAmbiental"
                  value="N/D"
                  ng-model="formData.ComisionGestionAmbiental" >
                  N/D
                </label>
              </div>
            </div>
          </div>

          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success btn-block" ng-click="submitForm(formData)" ng-disabled="!form.$valid">
              <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
              Enviar Formulario
            </button>
          </div>

        </Form>
      </div>
    </div>
  </div>
  <script src="js/app.js"></script>

    </body>

    <footer>
      <!--#include file="footer.html" -->
    </footer>

    </html>
