<!DOCTYPE html>
<html lang="es">
<head>
  <?php virtual ("usuario_header.php");?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Carbono neutralidad</title>

  <meta name="description" content="Matriz de indicadores - Carbono Neutralidad">
  <meta name="author" content="Luis Mata, Jose Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">


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
        <h3>
          Carbono neutralidad
        </h3>

        <form role="form" name="form" ng-controller="MainCtrl" action="php/formularios/CN.php" method="post">

          <div class="form-group">

            <label for="CN_Q1">
              ¿Posee plan de reducción de emisiones de gases de efecto invernadero?
            </label>

            <div class="form-group has-success" ng-class="{ 'has-error' : form.cantidadCO2.$invalid}">
              <div class="input-group col-md-4" >
                  <label class="radio-inline">
                    <input  type="radio" name="emisiones" id="emisionesRadio1"
                            value="Sí"
                            ng-model="formData.cantidadCO2"
                            onchange="validacionSINO(type, 'CN_Q1', 'emisionesRadio1', 'emisionesRadio2', 'emisionesRadio3')"
                    > Sí
                  </label>
                  <label class="radio-inline">
                    <input  type="radio" name="emisiones" id="emisionesRadio2"
                            value="No"
                            ng-model="formData.cantidadCO2"
                            onchange="validacionSINO(type, 'CN_Q1', 'emisionesRadio1', 'emisionesRadio2', 'emisionesRadio3')"
                    > No
                  </label>
                  <label class="radio-inline">
                    <input  type="radio" name="emisiones" id="emisionesRadio3"
                            value="N/D"
                            ng-model="formData.cantidadCO2"
                            onchange="validacionSINO(type, 'CN_Q1', 'emisionesRadio1', 'emisionesRadio2', 'emisionesRadio3')"
                    > N/D
                  </label>
                </div>
                <div   class="form-group"><!---->
                <label> Ingrese la cantidad de toneladas de CO<sub>2</sub> por año </label>
                  <div class="input-group col-md-4">
                    <input  type="text" class="form-control"
                            name="cantidadCO2" id="CN_Q1"
                            ng-model="formData.cantidadCO2"
                            onchange="validacionSINO(type, 'CN_Q1', 'emisionesRadio1', 'emisionesRadio2', 'emisionesRadio3')"
                            required pattern="[0-9]+$|[0-9]+,[0-9]+$|^No$|^N\/D$"
                    />
                    <span class="input-group-addon">toneladas de CO<sub>2</sub></span>
                    <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese las toneladas de CO2 emitidas al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                  </div>
                </div>
            </div>
          </div>



          <div class="form-group">
            <label for="CN_Q2">
              Registro y control del consumo de combustibles por fuentes móviles y fijas
            </label>

            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.gasolina.$error.required || !formData.gasolina }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="gasolina" id="CN_Q2.1"
                ng-model="formData.gasolina"
                onclick="validacionNDNA(type, 'CN_Q2.1', 'gasolinaRadio1', 'gasolinaRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/A$|^N\/D$"/>
                <span class="input-group-addon">gasolina</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese los litros de gasolina consumidos al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="gasolinaOP" id="gasolinaRadio1"
                  value="N/A" ng-model="formData.gasolina" > N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="gasolinaOP" id="gasolinaRadio2"
                  value="N/D" ng-model="formData.gasolina" > N/D
                </label>
              </div>
            </div>
            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.diesel.$error.required || !formData.diesel }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="diesel" id="CN_Q2.2" min="0"
                ng-model="formData.diesel"
                onclick="validacionNDNA(type, 'CN_Q2.2', 'dieselRadio1', 'dieselRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/A$|^N\/D$"/>
                <span class="input-group-addon">diesel</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese los litros de diesel consumidos al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-3">
                <label class="radio-inline">
                  <input  type="radio" name="dieselOP" id="dieselRadio1"
                  value="N/A" ng-model="formData.diesel"
                  onclick="validacionNDNA(type, 'CN_Q2.2', 'dieselRadio1', 'dieselRadio2')"> N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="dieselOP" id="dieselRadio2"
                  value="N/D" ng-model="formData.diesel"
                  onclick="validacionNDNA(type, 'CN_Q2.2', 'dieselRadio1', 'dieselRadio2')"> N/D
                </label>
              </div>
            </div>
            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.gas.$error.required || !formData.gas }">
              <div class="input-group col-md-4">
                <input  type="text" class="form-control"
                name="gas" id="CN_Q2.3" min="0" ng-model="formData.gas"
                onclick="validacionNDNA(type, 'CN_Q2.3', 'gasRadio1', 'gasRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/A$|^N\/D$"/>
                <span class="input-group-addon">gas LPG</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese los litros de gas LPG consumidos al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="gasOP" id="gasRadio1"
                  value="N/A" ng-model="formData.gas"
                  onclick="validacionNDNA(type, 'CN_Q2.3', 'gasRadio1', 'gasRadio2')"> N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="gasOP" id="gasRadio2"
                  value="N/D" ng-model="formData.gas"
                  onclick="validacionNDNA(type, 'CN_Q2.3', 'gasRadio1', 'gasRadio2')" > N/D
                </label>
              </div>
            </div>
            <div class="form-group has-success" ng-class="{ 'has-error' : !form.$pristine  && form.otrosCombustibles.$error.required || !formData.otrosCombustibles }">
              <div class="input-group col-md-4" >
                <input  type="text" class="form-control"
                name="otrosCombustibles" id="CN_Q2.4" min="0"
                ng-model="formData.otrosCombustibles"
                onclick="validacionNDNA(type, 'CN_Q2.4', 'otrosRadio1', 'otrosRadio2')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/A$|^N\/D$"/>
                <span class="input-group-addon">otros combustibles</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese los litros de otros combustibles consumidos al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <div class="input-group col-md-4">
                <label class="radio-inline">
                  <input  type="radio" name="otrosCombustiblesOP" id="otrosRadio1"
                  value="N/A" ng-model="formData.otrosCombustibles"
                  onclick="validacionNDNA(type, 'CN_Q2.4', 'otrosRadio1', 'otrosRadio2')"> N/A
                </label>
                <label class="radio-inline">
                  <input  type="radio" name="otrosCombustiblesOP" id="otrosRadio2"
                  value="N/D" ng-model="formData.otrosCombustibles"
                  onclick="validacionNDNA(type, 'CN_Q2.4', 'otrosRadio1', 'otrosRadio2')"> N/D
                </label>
              </div>
            </div>
          </div>

          <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.consumoRef.$error.required || !formData.consumoRef }">
            <label for="CN_Q3">
              Registro y control del consumo de refrigerantes
            </label>
            <div class="input-group col-md-4 has-success">
              <input  type="text" class="form-control"
              name="consumoRef" id="CN_Q3" min="0"
              ng-model="formData.consumoRef"
              onclick="validacionND(type, 'CN_Q3', 'consumoRefRadio1')"
              required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$"
              >
              <div class="input-group-addon">litros/año</div>
              <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de refrigerantes consumidos al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
            </div>
            <div class="input-group col-md-4 has-success">
              <label class="radio-inline">
                <input type="radio" name="consumoRefOP" id="consumoRefRadio1"
                value="N/D" ng-model="formData.consumoRef"
                onclick="validacionND(type, 'CN_Q3', 'consumoRefRadio1')"
                > N/D
              </label>
            </div>
          </div>


          <div class="form-group">

            <label for="CN_Q4">
              ¿Posee plan de reducción de emisiones de gases de efecto invernadero?
            </label>

            <div class="form-group has-success" ng-class="{ 'has-error' : form.planReduccionEmisiones.$invalid}">
              <div class="input-group col-md-4" >
                  <label class="radio-inline">
                    <input  type="radio" name="planReduccionEmisionesRadio" id="planReduccionEmisionesRadio1"
                            value="Sí"
                            ng-model="formData.planReduccionEmisiones"
                            onchange="validacionSINO(type, 'CN_Q4', 'planReduccionEmisionesRadio1', 'planReduccionEmisionesRadio2', 'planReduccionEmisionesRadio3')"
                    > Sí
                  </label>
                  <label class="radio-inline">
                    <input  type="radio" name="planReduccionEmisionesRadio" id="planReduccionEmisionesRadio2"
                            value="No"
                            ng-model="formData.planReduccionEmisiones"
                            onchange="validacionSINO(type, 'CN_Q4', 'planReduccionEmisionesRadio1', 'planReduccionEmisionesRadio2', 'planReduccionEmisionesRadio3')"
                    > No
                  </label>
                  <label class="radio-inline">
                    <input  type="radio" name="planReduccionEmisionesRadio" id="planReduccionEmisionesRadio3"
                            value="N/D"
                            ng-model="formData.planReduccionEmisiones"
                            onchange="validacionSINO(type, 'CN_Q4', 'planReduccionEmisionesRadio1', 'planReduccionEmisionesRadio2', 'planReduccionEmisionesRadio3')"
                    > N/D
                  </label>
                </div>
                <div   class="form-group"><!---->
                <label> Ingrese meta </label>
                  <div class="input-group col-md-4">
                    <input  type="text" class="form-control"
                            name="planReduccionEmisiones" id="CN_Q4"
                            ng-model="formData.planReduccionEmisiones"
                            onclick="validacionSINO(type, 'CN_Q4', 'planReduccionEmisionesRadio1', 'planReduccionEmisionesRadio2', 'planReduccionEmisionesRadio3')"
                            required pattern="^[0-9][0-9]?$|^100$|[0-9]+[0-9]?,[0-9]+$|^No$|^N\/D$"
                    />
                    <span class="input-group-addon">% reducción</span>
                    <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la meta de porcentaje de reducción de emisiones al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
                  </div>
                </div>
            </div>
          </div>


          <div class="form-group" >
            <label for="CN_Q5">
              ¿Posee plan de conservación y reforestación, compra de bonos certificados?
            </label>
            <div class="input-group col-md-4 has-success" ng-class="{ 'has-error' : form.certificados.$invalid || form.arbolesSembrados.$invalid}">
              <label class="radio-inline">
                <input  type="radio" name="planConservacion" id="planConservacionRadio1"
                value="Sí"
                ng-model="formData.planConservacion"
                onchange="validacionSINO2(type, 'CN_Q5.1', 'CN_Q5.2', 'planConservacionRadio1', 'planConservacionRadio2', 'planConservacionRadio3')"
                > Sí
              </label>
              <label class="radio-inline">
                <input  type="radio" name="planConservacion" id="planConservacionRadio2"
                value="No"
                ng-model="formData.planConservacion"
                onchange="validacionSINO2(type, 'CN_Q5.1', 'CN_Q5.2', 'planConservacionRadio1', 'planConservacionRadio2', 'planConservacionRadio3')"                        > No
              </label>
              <label class="radio-inline">
                <input  type="radio" name="planConservacion" id="planConservacionRadio3"
                value="N/D"
                ng-model="formData.planConservacion"
                onchange="validacionSINO2(type, 'CN_Q5.1', 'CN_Q5.2', 'planConservacionRadio1', 'planConservacionRadio2', 'planConservacionRadio3')"
                > N/D
              </label>
            </div>
            <br>
            <div   class="form-group" ><!--ng-show="formData.planConservacion=='Sí'"-->
              <div class="input-group col-md-4 has-success" ng-class="{ 'has-error' : !form.$pristine  && form.arbolesSembrados.$invalid }">
                <input  type="text" class="col-sm-5 form-control"
                name="arbolesSembrados" id="CN_Q5.1"
                ng-model="formData.arbolesSembrados"
                onchange="validacionSINO2(type, 'CN_Q5.1', 'CN_Q5.2', 'planConservacionRadio1', 'planConservacionRadio2', 'planConservacionRadio3')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^No$|^N\/D$"
                />
                <span class="input-group-addon">árboles sembrados/año</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el número de árboles sembrados al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>
              <br>
              <div class="input-group col-md-4 has-success" ng-class="{ 'has-error' : !form.$pristine  && form.certificados.$invalid}">
                <input  type="text" class="col-sm-5 form-control"
                name="certificados" id="CN_Q5.2"
                ng-model="formData.certificados"
                onchange="validacionSINO2(type, 'CN_Q5.1', 'CN_Q5.2', 'planConservacionRadio1', 'planConservacionRadio2', 'planConservacionRadio3')"
                required pattern="[0-9]+$|[0-9]+,[0-9]+$|^No$|^N\/D$"
                />
                <span class="input-group-addon">certificados</span>
                <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el número de certificados comprados al año"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
              </div>

            </div>
          </div>

          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success btn-block" ng-click="submitForm(formData)"ng-disabled="!form.$valid">
              <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
              Enviar Formulario
            </button>
          </div>

        </form>
      </div>
      <!-- columna 2 // -->

    </div>
    <!-- fila // -->

  </div>

  <script src="js/app.js"></script>
</body>

<footer>
<?php virtual ("footer.html");?>
</footer>
</html>
