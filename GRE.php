<!DOCTYPE HTML>
<html lang="es">
  <head>
    <?php virtual ("usuario_header.php");?>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <title>Formulario Gestión del Recurso Energético</title>

	  <meta name="description" content="Matriz de indicadores - Gestion del Recurso Energetico">
    <meta name="author" content="Luis Mata, José Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">

  </head>

<script>
      function cargar() {
      	//faltan muchas varas... por ejemplo ver si la consulta devuelve vacio...
          $.ajax({
             type: 'post',
             url: 'php/formularios/GRE_Load.php',
             data: {idq: "", param: ""},

            dataType: 'json',
            success: function(data)  {
				if(data[0]){ //si hay algo procedo a llenar los campos 
					if(data[0] == 1){ //Si
						document.getElementById("GRE_Q1_Si").checked = true;	
					}else{
						if(data[0] == 0){ //No
							document.getElementById("GRE_Q1_No").checked = true;	
						}else{
							if(data[0] == -1){ //ND
								document.getElementById("GRE_Q1_ND").checked = true;	
							}
						}

					}

					if(data[1] == -1){ //seteo el option
						document.getElementById("GRE_Q2.1").value  = "N/D";
						document.getElementById("medidoresRadio1").checked = true;
					}else{
						document.getElementById("GRE_Q2.1").value  = data[1];
					}

					if(data[2] == -1){ //seteo el option
						document.getElementById("GRE_kwhAnioPersona").value  = "N/D";
						document.getElementById("consumoElectricoRadio1").checked = true;
					}else{
						document.getElementById("GRE_kwhAnioPersona").value  = data[2];
					}

					if(data[3] == 0){ //No
						document.getElementById("planReduccionConsumoNo").checked = true;	
					}else{
						if(data[3] == -1){ //ND
							document.getElementById("planReduccionConsumoND").checked = true;	
						}else{ //numero en meta
							document.getElementById("planReduccionConsumoSi").checked = true;
						}
					}
					document.getElementById("GRE_MetaReduccion").value  = data[3];

					
					if(data[4] == -1){ //seteo el option
						document.getElementById("GRE_Q4").value  = "N/D";
						document.getElementById("controlConsumoRadio1").checked = true;
					}else{
						document.getElementById("GRE_Q4").value  = data[4];
					}

					if(data[5] == -1){ //seteo el option
						document.getElementById("GRE_Q5").value  = "N/D";
						document.getElementById("consumoTotalRadio1").checked = true;
					}else{
						document.getElementById("GRE_Q5").value  = data[5];
					}
					//alert(data[0]+data[1]+data[2]);          
	            }
            }

          });
      }
    </script>



  <body ng-app="formApp" onload="cargar()">

	<div class="container-fluid">
	<!-- fila -->
    <div class="row">

      <!-- columna 1 -->

          <div class="col-md-1"> </div>

      <!-- columna 1 // -->

      <!-- columna 2 -->

      <div class="col-md-11">

	    <H3>
	    Gestión del recurso energético
	    </H3>

	    <form name="form" role="form" ng-controller="MainCtrl" action="php/formularios/GRE.php" method="post">
	    	<div class="form-group">
				<label for="GRE_Q1">
					¿Conforman comité para la gestión del recurso energético?
					<a href="#" data-toggle="tooltip" data-placement="top" title="Seleccione una opción entre sí, no, o N/D (No definido)"><img src="images/question_icon.png" style="width:20px;height:20px;"></a>
				</label>
				<div class="input-group col-md-4 has-success" ng-class="{ 'has-error' : !form.$pristine  && form.comite.$error.required || !formData.comite }">
					<div class="radio-inline">
					  <label>
						<input id="GRE_Q1_Si" type="radio" name="comite" value="Sí" ng-model="formData.comite" required>
						Sí
					  </label>
					</div>
					<div class="radio-inline">
					  <label>
						<input id="GRE_Q1_No" type="radio" name="comite" value="No" ng-model="formData.comite" >
						No
					  </label>
					</div>
          <div class="radio-inline">
					  <label>
						<input id="GRE_Q1_ND" type="radio" name="comite" value="N/D" ng-model="formData.comite" >
						N/D
					  </label>
					</div>
				</div>
			</div>

			<div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.medidores.$error.required || !formData.medidores }">
				<label for="GRE_Q2">
					Consumo eléctrico per cápita anual según el alcance
				</label>
				<div class="input-group col-md-4 has-success" >
					<input  type="text" class="form-control"
                  name="medidores" id="GRE_Q2.1" min="0"
                  ng-model="formData.medidores"
                  onclick="validacionND(type, 'GRE_Q2.1', 'medidoresRadio1')"
                  required pattern="[0-9]+$|^N\/D$"/>   <!--GRE_II_I_RC-->
					<div class="input-group-addon"># de medidores</div>
					<span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el número de medidores eléctricos"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
        </div>
          <div class="input-group col-md-4 has-success">
						<label class="radio-inline">
  						<input type="radio" name="medidoresND" id="medidoresRadio1"
               value="N/D" ng-model="formData.medidores"
               onclick="validacionNDEvento(type, 'GRE_Q2.1', 'medidoresRadio1')"> N/D
						</label>
					</div>
        </div>

        <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.consumoElectrico.$error.required || !formData.consumoElectrico }" >
				<div class="input-group col-md-4 has-success">
					<input  type="text" class="form-control"
                  name="consumoElectrico" id="GRE_kwhAnioPersona" min="0"
                  ng-model="formData.consumoElectrico"
                  onclick="validacionND(type, 'GRE_Q2.2', 'consumoElectricoRadio1')"
                  required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$" />  <!--GRE_II_II_RC-->
					<div class="input-group-addon">KW/Año/Persona</div>
					<span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese la cantidad de KW utilizados por persona anualmente"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
				</div>
        <div class="input-group col-md-4 has-success">
          <label class="radio-inline">
            <input  type="radio" name="consumoElectrico" id="consumoElectricoRadio1"
                    value="N/D" ng-model="formData.consumoElectrico"
                    onclick="validacionND(type, 'GRE_Q2.2', 'consumoElectricoRadio1')"> N/D
          </label>
        </div>
      </div>

			<div class="form-group">
				<label for="GRE_Q3"> <!--si responde afirmativo tiene que aparecer un indicar Meta:  con el % reducción (GRE_III_G	DOUBLE)-->
					¿Poseen plan de reducción del consumo en todas las Unidades o Centros?
					<a href="#" data-toggle="tooltip" data-placement="top" title="Seleccione una opción entre sí, no, o N/D (No definido), de indicar sí indicar el % de reducción"><img src="images/question_icon.png" style="width:20px;height:20px;"></a>
				</label>
				<div class="input-group col-md-4 has-success" ng-class="{ 'has-error' : !form.$pristine  && form.planReduccionConsumo.$error.required || !formData.planReduccionConsumo }">
					<div class="radio-inline">
					  <label>
						<input id="planReduccionConsumoSi" type="radio" name="planReduccionConsumo" value="Sí" onclick="mostrar()" ng-model="formData.planReduccionConsumo" required>
						Sí
					  </label>
					</div>
					<div class="radio-inline">
					  <label>
						<input id="planReduccionConsumoNo" type="radio" name="planReduccionConsumo" value="No" onclick="ocultar()" ng-model="formData.planReduccionConsumo" >
						No
					  </label>
					</div>
          <div class="radio-inline">
					  <label>
						<input id="planReduccionConsumoND" type="radio" name="planReduccionConsumo" value="N/D" ng-model="formData.planReduccionConsumo" >
						N/D
					  </label>
					</div>
				</div>
				<div id = "oculto">
					<label>
						Indique la meta
					</label>

					<div class="input-group col-md-4 has-success">
						<input type="number" class="form-control" name= "metac" id="GRE_MetaReduccion" min="0" max="100">
						<div class="input-group-addon">% de Reducción</div>
					</div>
				</div>
			</div>

			<script type="text/javascript">
				function mostrar(){
				document.getElementById('oculto').style.display = 'inline-block';}
			</script>

			<script type="text/javascript">
				function ocultar(){
				document.getElementById('oculto').style.display = 'none';}
			</script>

      <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.controlConsumo.$error.required || !formData.controlConsumo }">
				<label for="GRE_Q4">
					Control y evaluación de consumo según el alcance definido
				</label>
				<div class="input-group col-md-4 has-success" >
					<input type="text" class="form-control" name="controlConsumo" id="GRE_Q4"
          ng-model="formData.controlConsumo"
          onclick="validacionND(type, 'GRE_Q4', 'controlConsumoRadio1')"
          required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$" ><!--GRE_IV_G	DOUBLE-->
					<div class="input-group-addon">% de reducción</div>
					<span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el porcentaje de reducción anual según el alcance definido"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
				</div>
        <div >
          <label class="radio-inline">
          <input type="radio" name="controlConsumoRadio1" id="controlConsumoRadio1" value="N/D"
          ng-model="formData.controlConsumo"
          onclick="validacionND(type, 'GRE_Q4', 'controlConsumoRadio1')">N/D
          </label>
        </div>
			</div>


      <div class="form-group" ng-class="{ 'has-error' : !form.$pristine  && form.consumoTotal.$error.required || !formData.consumoTotal }">
        <label for="GRE_Q5">
          Consumo total según el alcance definido
        </label>
        <div class="input-group col-md-4 has-success" >
          <input  type="text" class="form-control" name="consumoTotal" id="GRE_Q5" min="0"
                  ng-model="formData.consumoTotal"
                  onclick="validacionND(type, 'GRE_Q5', 'consumoTotalRadio1')"
                  required pattern="[0-9]+$|[0-9]+,[0-9]+$|^N\/D$" ><!--GRE_V_RC	DOUBLE-->
          <div class="input-group-addon">KWh Total/Año</div>
          <span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Ingrese el consumo total según el alcance definido"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
        </div>
        <div>
          <label class="radio-inline">
          <input  type="radio" name="consumoTotal" id="consumoTotalRadio1" value="N/D"
                  ng-model="formData.consumoTotal"
                  onclick="validacionND(type, 'GRE_Q5', 'consumoTotalRadio1')">N/D
          </label>
        </div>
      </div>

      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success btn-block" ng-click="submitForm(formData)"ng-disabled="!form.$valid">
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
<?php virtual ("footer.html");?>
</footer>

</html>
