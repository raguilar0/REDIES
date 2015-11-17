<!DOCTYPE html>
<html lang="en">
<head>
  <?php virtual ("usuario_header.php");?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Residuos Sólidos</title>

  <meta name="description" content="Matriz de indicadores - Residuos Sólidos">
  <meta name="author" content="Luis Mata, José Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">


</head>
<body ng-app="formApp">

  <div class="container-fluid">
    <div class="container-fluid">

    <!-- fila -->
    <div class="row">

      <!-- columna 1 -->

          <div class="col-md-1"> </div>

      <!-- columna 1 // -->

      <!-- columna 2 -->

      <div class="col-md-11">
        <h3>
          Residuos Sólidos
        </h3>
        <form name="form" role="form" ng-controller="MainCtrl"  method="post" action="php/formularios/RS.php">
          <div class="form-group">

            <label for="RS_Q1">
              Inventario de generación de residuos sólidos, por tipo y cantidad kg de residuos por año
            </label>

            <div class="form-group has-success"   ng-class="{ 'has-error' : !form.$pristine  && form.cantidadPapel.$error.required || !formData.cantidadPapel }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="cantidadPapel" id="RS_Q1.1" min="0"
                ng-model="formData.cantidadPapel"
                onclick="validacionND(type, 'RS_Q1.1', 'cantidadPapelRadio1')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/>
                <span class="input-group-addon">papel</span>
                <!--<span class="input-group-addon"><input type="checkbox" aria-label="N/A">N/A</span>-->
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de resmas de papel generadas al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="radioCantidadPapel" id="cantidadPapelRadio1"
                  value="N/D" ng-model="formData.cantidadPapel"
                  onclick="validacionND(type, 'RS_Q1.1', 'cantidadPapelRadio1')"> N/D
                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.rOrganicos.$error.required || !formData.rOrganicos }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name ="rOrganicos" id="RS_Q1.2" min="0"
                ng-model="formData.rOrganicos"
                onclick="validacionND(type, 'RS_Q1.2', 'rOrganicosRadio1')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/>
                <span class="input-group-addon">residuos orgánicos</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de residuos orgánicos generados al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio"  name="radioROrganicos" id="rOrganicosRadio1"
                  value="N/D" ng-model="formData.rOrganicos"
                  onclick="validacionND(type, 'RS_Q1.2', 'rOrganicosRadio1')"> N/D
                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.rValorizables.$error.required || !formData.rValorizables }" >
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name ="rValorizables" id="RS_Q1.3" min="0"
                ng-model="formData.rValorizables"
                onclick="validacionND(type, 'RS_Q1.3', 'rValorizablesRadio1')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$" />
                <div class="input-group-addon">residuos valorizables</div>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de residuos valorizables generados por año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio"  name ="radioRValorizables" id="rValorizablesRadio1"
                  value="N/D" ng-model="formData.rValorizables"
                  onclick="validacionND(type, 'RS_Q1.3', 'rValorizablesRadio1')"> N/D

                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.rPeligrosos.$error.required || !formData.rPeligrosos }">
              <div class="input-group col-md-4">
                <input type="text" class="form-control"
                name="rPeligrosos" id="RS_Q1.4" min="0"
                ng-model="formData.rPeligrosos"
                onclick="validacionND(type, 'RS_Q1.4', 'rPeligrososRadio1')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/>
                <div class="input-group-addon">residuos peligrosos</div>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de residuos peligrosos generados por año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="radioRPeligrosos" id="rPeligrososRadio1"
                  value="N/D" ng-model="formData.rPeligrosos"
                  onclick="validacionND(type, 'RS_Q1.4', 'rPeligrososRadio1')"> N/D
                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.rManejoEspecial.$error.required || !formData.rManejoEspecial }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="rManejoEspecial" id="RS_Q1.5" min="0"
                ng-model="formData.rManejoEspecial"
                onclick="validacionND(type, 'RS_Q1.5', 'rManejoEspecialRadio1')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/>
                <div class="input-group-addon">residuos de manejo especial</div>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de residuos de manejo especial generados al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="radioRManejoEspecial" id="rManejoEspecialRadio1"
                  value="N/D" ng-model="formData.rManejoEspecial"
                  onclick="validacionND(type, 'RS_Q1.5', 'rManejoEspecialRadio1')"> N/D
                </label>
              </div>
            </div>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.rNoValorizables.$error.required || !formData.rNoValorizables }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name ="rNoValorizables" id="RS_Q1.6" min="0"
                ng-model="formData.rNoValorizables"
                onclick="validacionND(type, 'RS_Q1.6', 'rNoValorizablesRadio1')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$" />
                <div class="input-group-addon">residuos no valorizables</div>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de residuos no valorizables generados al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="radioRNoValorizables" id="rNoValorizablesRadio1"
                  value="N/D" ng-model="formData.rNoValorizables"
                  onclick="validacionND(type, 'RS_Q1.6', 'rNoValorizablesRadio1')"> N/D
                </label>
              </div>
            </div>
            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.otros.$error.required || !formData.otros }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="otros" id="RS_Q1.7" min="0"
                ng-model="formData.otros"
                onclick="validacionND(type, 'RS_Q1.7', 'otrosRadio1')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/>
                <div class="input-group-addon">otros</div>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de otros residuos al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4 has-success">
                <label class="radio-inline">
                  <input  type="radio" name="radioOtros" id="otrosRadio1"
                  value="N/D" ng-model="formData.otros"
                  onclick="validacionND(type, 'RS_Q1.7', 'otrosRadio1')"> N/D
                </label>
              </div>
            </div>

          </div>
          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.rSolidosPC.$error.required || !formData.rSolidosPC }">

            <label for="RS_Q2">
              Generación de residuos sólidos per cápita
            </label>
            <div class="input-group col-md-4 has-success">
              <input  type="text" class="form-control"
              name ="rSolidosPC" id="RS_Q2" min="0"
              ng-model="formData.rSolidosPC"
              onclick="validacionND(type, 'RS_Q2', 'rSolidosPCRadio1')"
              required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/>
              <div class="input-group-addon">Kg/persona</div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de residuos sólidos per-cápita al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>
            <div class="input-group col-md-4 has-success">
              <label class="radio-inline">
                <input  type="radio" name="radioRSolidosPC" id="rSolidosPCRadio1"
                value="N/D" ng-model="formData.rSolidosPC"
                onclick="validacionND(type, 'RS_Q2', 'rSolidosPCRadio1')"> N/D
              </label>
            </div>
          </div>
          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.recuperacionRS.$error.required || !formData.recuperacionRS }">
            <label for="RS_Q3">
              Indicadores de recuperación de residuos sólidos
            </label>
            <div class="input-group col-md-4 has-success">
              <input  type="text" class="form-control"
              name="recuperacionRS" id="RS_Q3" min="0"
              ng-model="formData.recuperacionRS"
              onclick="validacionND(type, 'RS_Q3', 'recuperacionRSRadio1')"
              required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/>
              <div class="input-group-addon">Kg valorizables/Persona</div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el indicador de recuperacion de residuos solidos por persona al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>
            <div class="input-group col-md-4 has-success">
              <label class="radio-inline">
                <input  type="radio" name="radioRecuperacionRS" id="recuperacionRSRadio1"
                value="N/D" ng-model="formData.recuperacionRS"
                onclick="validacionND(type, 'RS_Q3', 'recuperacionRSRadio1')"> N/D
              </label>
            </div>
          </div>
          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.tazaReciclaje.$error.required || !formData.tazaReciclaje }">
            <label for="RS_Q4">
              Tasa anual de reciclaje
            </label>
            <div class="input-group col-md-4 has-success">
              <input  type="text" class="form-control"
              name="tazaReciclaje" id="RS_Q4" min="0"
              ng-model="formData.tazaReciclaje"
              onclick="validacionND(type, 'RS_Q4', 'tazaReciclajeRadio1')"
              required pattern="([1-9]?[0-9](,[0-9][0-9]?)?$|100$)|^N\/D$"/> <!--REGEX para porcentajes-->

              <div class="input-group-addon">%</div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la taza anual de reciclaje"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>
            <div class="input-group col-md-4 has-success">
              <label class="radio-inline">
                <input  type="radio" name="radioTazaReciclaje" id="tazaReciclajeRadio1"
                value="N/D" ng-model="formData.tazaReciclaje"
                onclick="validacionND(type, 'RS_Q4', 'tazaReciclajeRadio1')"> N/D
              </label>
            </div>
          </div>
          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.trazabilidad.$error.required || !formData.trazabilidad }">
            <label for="RS_Q5">
              Trazabilidad de gestores de residuos
            </label>
            <div class="input-group col-md-4 has-success">
              <input type="text" class="form-control"
              name ="trazabilidad" id="RS_Q5" min="0"
              ng-model="formData.trazabilidad"
              onclick="validacionND(type, 'RS_Q5', 'trazabilidadRadio1')"
              required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"/>
              <div class="input-group-addon">Gestores Autorizados</div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de gestores autorizados para la trazabilidad de residuos sólidos"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>
            <div class="input-group col-md-4 has-success">
              <label class="radio-inline">
                <input  type="radio" name="radioTrazabilidad" id="trazabilidadRadio1"
                value="N/D" ng-model="formData.trazabilidad"
                onclick="validacionND(type, 'RS_Q5', 'trazabilidadRadio1')"> N/D
              </label>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.planManejo.$error.required || !formData.planManejo }">
            <label for="CN_Q6">
              ¿Posee plan de manejo de residuos sólidos en ejecución?
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
                  <input type="radio" name="planManejo" value="No" ng-model="formData.planManejo" required>
                  No
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="planManejo" value="N/A" ng-model="formData.planManejo" required >
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
        </form>
      </div>
    </div>
  </div>
</body>
<script src="js/app.js"></script>

<footer>
<!--#include file="footer.html" -->
</footer>
</html>
