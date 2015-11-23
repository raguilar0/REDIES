<!DOCTYPE HTML>
<html lang="en">
	<head>
		<?php virtual ("usuario_header.php");?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Consultas Sobre Indicadores</title>

		<meta name="description" content="Usuario - Consultas Sobre Indicadores">
		<meta name="author" content="Luis Mata, José Slon, Michael Quirós, Ricardo Aguilar, Brandon Sardí">
		<script src = "js/app.js"></script>

	</head>

<body ng-app="formApp" ng-controller="GetIndicadores">

	<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>
			Consultas sobre indicadores
			</h3>

		<form name="form" role="form"> <!--method="post" action="php/representante/usuario_consultas_con.php"-->
			<div class="form-group">
				<label for="AD_C1">
					Tipo de búsqueda
					<a href="#" data-toggle="tooltip" data-placement="top" title="Seleccione una opción entre Área o Tipos para realizar la consulta"><img src="images/question_icon.png" style="width:20px;height:20px;"></a>
				</label>
				<div class="input-group col-md-4 has-success">
					<div class="radio-inline">
					  <label>
						<input type="radio" name="busqueda_areas" value="areas" onclick="mostrarAreas()">
						Áreas
					  </label>
					</div>
					<div class="radio-inline">
					  <label>
						<input type="radio" name="busqueda_areas" value="tipos" onclick="mostrarTipos()">
						Tipos
					  </label>
					</div>
				</div>
			</div>




			<div name="area_elegida" id="combobox_usuario_consulta_area" style='display:none;'>
				<div class="form-group">
					<label for="AD_C2">
						Seleccione un Área
					</label>
					<div class="input-group col-md-4 has-success">
						<select name = "usuario_consulta_area" onclick="mostrarAreas()" id="area_personalizada" class="form-control">
							<option value="CN">Carbono Neutralidad</option>
							<option value="GR">Gestión de Recursos</option>
							<option value="GRE">Gestión de Recursos Energéticos</option>
							<option value="RHACH">Recurso Hídrico: Aguas de Consumo Humano</option>
							<option value="RHAR">Recurso Hídrico: Aguas Residules</option>
							<option value="RS">Residuos Sólidos</option>
							<option value="all_areas">Todas las áreas</option>
							<option value="personalizados_areas">Personalizadas</option>
						</select>
						<span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Escoja un área para realizar la consulta o puede personalizar su búsqueda"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
					</div>
				</div>
			</div>



			<div name="tipo_elegido" id="combobox_consulta_tipo" style='display:none;'>
				<div class="form-group">
					<label for="AD_C3">
						Seleccione un Tipo
					</label>
					<div class="input-group col-md-4 has-success">
						<select name = "usuario_consulta_tipo" onclick="mostrarTipos()" id="tipo_personalizado" class="form-control">
							<option value="consumo">Registros de Consumo</option>
							<option value="gestion">Gestión</option>
							<option value="salida">Registros de Salida</option>
							<option value="all_tipos">Todos los tipos</option>
							<option value="personalizados_tipos">Personalizado</option>
						</select>
						<span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Escoja una tipo para realizar la consulta o puede personalizar su búsqueda"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
					</div>
				</div>
			</div>

			<div name="areas_personalizadas" id="checkbox_areas_personalizadas" style='display:none;'>
				<div class="form-group">
					<label for="AD_C4">
						Personalizar Búsqueda
					</label>
					<div class="input-group col-md-4 has-success">
						<input type="checkbox" id="checkAreasCN" name="checkAreas" value="CCN" checked> Carbono Neutralidad </br>
						<input type="checkbox" id="checkAreasGR" name="checkAreas" value="CGR" checked> Gestión de Recursos </br>
						<input type="checkbox" id="checkAreasGRE" name="checkAreas" value="CGRE" checked> Gestión de Recursos Energéticos </br>
						<input type="checkbox" id="checkAreasRHACH" name="checkAreas" value="CRHACH" checked> Recurso Hídrico: Aguas de Consumo Humano </br>
						<input type="checkbox" id="checkAreasRHAR" name="checkAreas" value="CRHAR" checked> Recurso Hídrico: Aguas Residules </br>
						<input type="checkbox" id="checkAreasRS" name="checkAreas" value="CRS" checked> Residuos Sólidos </br>

					</div>
				</div>
			</div>

			<div name="tipos_personalizados" id="checkbox_tipos_personalizados" style='display:none;'>
				<div class="form-group">
					<label for="AD_C5">
						Personalizar Búsqueda
					</label>
					<div class="input-group col-md-4 has-success">
						<input type="checkbox" id="checkTiposRegistrosConsumo" name="Cconsumo" value="" checked> Registros de Consumo </br>
						<input type="checkbox" id="checkTiposGestion" name="Cgestion" value="" checked> Gestión </br>
						<input type="checkbox" id="checkTiposRegistrosSalida" name="Csalida" value="" checked> Registros de Salida </br>
					</div>
				</div>
			</div>


			<div class="form-group">
				<label for="AD_C7">
					Seleccione los años en los que desea ver la consulta
				</label>
				<div class="input-group col-md-4 has-success">
					<div class="input-group-addon">Desde</div>
					<input  type="number" name="anio_inicio" min=2014 value=2014 class="form-control">
					<span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Fecha de inicio de la búsqueda"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
				</div>
			</div>

			<div class="form-group">
				<div class="input-group col-md-4 has-success">
						<div class="input-group-addon">Hasta</div>
						<input  type="number" name="anio_fin" min=2014 value=2014 class="form-control">
						<span class="input-group-addon"><a href="#" data-toggle="tooltip" data-placement="top" title="Fecha de finalización de la búsqueda"><img src="images/question_icon.png" style="width:20px;height:20px;"></a></span>
				</div>
			</div>

			<div class="form-group col-md-4">
					<button type="submit" class="btn btn-success btn-block" id="boton_areas" style='display:none;' ng-click="" onclick="mostrarAreasSeleccionadas()">
					<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
						Mostrar Tabla
					</button>

					<button type="submit" class="btn btn-success btn-block" id="boton_tipos" style='display:none;' onclick="mostrarTiposSeleccionados()">
					<span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
						Mostrar Tabla
					</button>
			</div>


			<div name="resultado">
				<div class="form-group" name="resultado">
					<div id="tablas_areas_prueba">
						<tr class="success" ng-repeat= "indicador in indicadores">
							<td>{{indicador.CN_I_RS}}</td>
						</tr>
					<div>

				<div id="tablas_areas" style='display:none;'>
					<div  id="table_CN" style='display:none;'>
						<h4>Carbono neutralidad</h4>
			            <table class="table table-hover" id="tabla_carbono_neutralidad">
			                <tr>
			                    <th>Año</th>
			                    <th>Invent. EG EI</th>
			                    <th>CO2</th>
			                    <th>RC_Gasolina</th>
			                    <th>RC_Diesel</th>
			                    <th>RC_Gas LPG</th>
			                    <th>RC_Otros combustibles</th>
			                    <th>Plan de reducción de emisiones de gases</th>
			                    <th>Meta</th>
			                    <th>Plan de conservación y reforestación</th>
			                    <th>Árboles sembrados/año </th>
			                    <th>Certificados</th>
			                </tr>
			                <tr>
			                    <td>2014</td>
			                    <td>{{indicador.CN_I_RS}}</td>
			                    <td>2</td>
			                    <td>200</td>
			                    <td>150</td>
			                    <td>155</td>
			                    <td>123</td>
			                    <td>SI</td>
			                    <td>30</td>
			                    <td>Si</td>
			                    <td>15</td>
			                    <td>3</td>
			                </tr>
			                <tr>
			                    <td>2015</td>
			                    <td>Si</td>
			                    <td>2</td>
			                    <td>200</td>
			                    <td>150</td>
			                    <td>155</td>
			                    <td>123</td>
			                    <td>NO</td>
			                    <td></td>
			                    <td>Si</td>
			                    <td>15</td>
			                    <td>3</td>
			                </tr>

			            </table>
			            <h6>*EG EI: Emisiones de Gases de Efecto Invernadero</h6>
			            <h6>*RC: Registro y control del Consumo de combustibles y refrigerantes de todo tipo por fuentes móviles y fijas</h6>

			        </div>

			        <div id="table_GR" style='display:none;'>
			        	<h4>Gestión de recursos</h4>
			            <table class="table table-hover" id="tabla_gestion_recursos" >
			                <tr>
			                    <th>Año</th>
			                    <th>Politica de Gestión Ambienta</th>
			                    <th>Plan de Gestión Ambiental</th>
			                    <th>Participación en actividades</th>
			                    <th>Iniciativa de Proyección Ambiental</th>
			                    <th>Programas de Compras Verdes</th>
			                    <th>Número de Carteles con Inclusión de Criterios Ambientales</th>
			                    <th>Comision de Gestión Ambiental</th>
			                </tr>
			                <tr>
			                    <td>2014</td>
			                    <td>Si</td>
			                    <td>Si</td>
			                    <td>25</td>
			                    <td>ND</td>
			                    <td>Si</td>
			                    <td>3</td>
			                    <td>Si</td>
			                </tr>
			                <tr>
			                    <td>2015</td>
			                    <td>Si</td>
			                    <td>No</td>
			                    <td></td>
			                    <td>ND</td>
			                    <td>Si</td>
			                    <td>3</td>
			                    <td>Si</td>
			                </tr>
			            </table>
			            <h6>*Participación en actividades se da en personas/año</h6>
			        </div>
			        <div id="table_GRE" style='display:none;'>
			        	<h4>Gestión de recursos enérgeticos</h4>
			            <table class="table table-hover" id="tabla_gestion_recurso_energetico">
			                <tr>
			                    <th>Año</th>
			                    <th>Comité para la Gestión del Recurso Energético</th>
			                    <th>CEP-Número de medidores</th>
			                    <th>CEP-KW/Año/Persona</th>
			                    <th>PRC-en todas las Unidades o Centros</th>
			                    <th>Meta de reducción</th>
			                    <th>Control y evaluación de consumo según el alcance definido</th>
			                    <th>Consumo total según el alcance definido</th>
			                </tr>
			                <tr>
			                    <td>2014</td>
			                    <td>Si</td>
			                    <td>4</td>
			                    <td>108</td>
			                    <td>Si</td>
			                    <td>20</td>
			                    <td>10</td>
			                    <td>75000</td>
			                </tr>

			            </table>
			            <h6>*CEP: Consumo eléctrico per cápita</h6>
			            <h6>*PRC: Plan de reducción del consumo </h6>
			        </div>
			        <div id="table_RHACH" style='display:none;'>
			        	<h4>Recurso Hídrico: Agua para consumo humano</h4>

			            <table class="table table-hover">
			                <tr>
			                    <th>Año</th>
			                    <th>Consumo de Agua per capita</th>
			                    <th>IFA Número de pozos</th>
			                    <th>IFA Número de nacientes</th>
			                    <th>IFA Número de ríos</th>
			                    <th>IFA Número de hídrometros</th>
			                    <th>Registros de Consumo de Agua</th>
			                    <th>realizan análisis de calidad de agua</th>
			                    <th>¿Poseen plan de ahorro de agua?</th>
			                    <th>Porcentaje de Reducción</th>
			                    <th>¿Poseen plan de manejo de cuerpos de agua?</th>
			                    <th>¿Poseen permisos de explotación de pozos?</th>
			                    <th>¿Poseen plan de mantenimiento de sistemas de abastecimiento de agua?</th>
			                </tr>
			                <tr>
			                    <td>2014</td>
			                    <td>125</td>
			                    <td>N/D</td>
			                    <td>N/A</td>
			                    <td>2</td>
			                    <td>5</td>
			                    <td>3</td>
			                    <td>Si</td>
			                    <td>Si</td>
			                    <td>15</td>
			                    <td>SI</td>
			                    <td>No</td>
			                    <td>Si</td>
			                </tr>
			            </table>
			            <h6>*IFA: Inventario de fuentes de agua</h6>
			        </div>
			        <div id="table_RHAR" style='display:none;'>
			        	<h4>Recurso Hídrico: Aguas residuales</h4>
			        	<table class="table table-hover">
			        		<tr>
			        			<th>Año</th>
			        			<th>IEARPD descargas al alcantarillado público</th>
			        			<th>IEARPD descargas a tanques sépticos</th>
			        			<th>IEARPD descargas al sistema de tratamiento</th>
			        			<th>¿Posee STAR debidamente inscrito y con un diseño adecuado?</th>
			        			<th>¿Realiza análisis de aguas residuales?</th>
			        			<th>Reportes Operacionales</th>
			        		</tr>
			        		<tr>
			        			<td>2014</td>
			        			<td>1</td>
			        			<td>2</td>
			        			<td>N/A</td>
			        			<td>2</td>
			        			<td>Si</td>
			        			<td>No</td>
			        		</tr>
			        	</table>
			        	<h6>*IEARPD: Inventario de efluentes de aguas residuales y puntos de descarga</h6>
			        	<h6>*STAR: Sistema de tratamiendro de aguas residuales</h6>
			        </div>
			        <div id="table_RS" style='display:none;'>
			        	<h4>Residuos Sólidos</h4>
			        	<table class="table table-hover">
			        		<tr>
			        			<th>Año</th>
			        			<th>IGRS Papel</th>
			        			<th>IGRS Residuos Orgánicos</th>
			        			<th>IGRS Residuos Valorizables</th>
			        			<th>IGRS Residuos Peligrosos</th>
			        			<th>IGRS Residuos de Manejo Especial</th>
			        			<th>IGRS Residuos no Valorizables</th>
			        			<th>IGRS Otros</th>
			        			<th>Generación de residuos sólidos per cápita</th>
			        			<th>Indicadores de recuperación de residuos sólidos</th>
			        			<th>Tasa anual de reciclaje</th>
			        			<th>Trazabilidad de gestores de residuos</th>
			        			<th>¿Posee plan de manejo de residuos sólidos en ejecución?</th>
			        		</tr>
			        		<tr>
			        			<td>2014</td>
			        			<td>50</td>
			        			<td>N/D</td>
			        			<td>N/D</td>
			        			<td>N/D</td>
			        			<td>N/D</td>
			        			<td>N/D</td>
			        			<td>N/D</td>
			        			<td>15</td>
			        			<td>N/D</td>
			        			<td>25</td>
			        			<td>2</td>
			        			<td>Si</td>
			        		</tr>
			        	</table>
			        	<h6>IGRS: Inventario de Generación de Residuos sólidos</h6>
			        </div>
		        </div>

		        <div id="tablas_tipos">
		        	<div id="tabla_Registro_Consumo" style='display:none;'>
		        		<h4>Registro de consumo</h4>
			        	<table class="table table-hover">
			        		<tr>
			        			<th>Año</th>
			        			<th>CN RC_Gasolina</th>
			                    <th>CN RC_Diesel</th>
			                    <th>CN RC_Gas LPG</th>
			                    <th>CN RC_Otros combustibles</th>
			        			<th>CN</th>
			        			<th>GR</th>
			        			<th>GRE CEP-Número de medidores</th>
			                    <th>GRE CEP-KW/Año/Persona</th>
			        			<th>RHACH Consumo de Agua per capita</th>
			        			<th>RHACH Registros de Consumo de Agua</th>
			        		</tr>
			        		<tr>
			        			<td>2014</td>
			        		</tr>
		        		</table>
		        		<h6>*CEP: Consumo eléctrico per cápita</h6>
		        		<h6>*CN: Carbono neutralidad</h6>
		        		<h6>*GR: Gestión de recursos</h6>
		        		<h6>*GRE: Gestión del recurso energético</h6>
		        		<h6>*RC: Registro y control del Consumo de combustibles y refrigerantes de todo tipo por fuentes móviles y fijas</h6>
		        		<h6>*RHACH: Recurso hídrico: Agua para consumo humano</h6>


		        	</div>


		        	<div id="tabla_Gestion" style='display:none;'>
		        		<h4>Gestión</h4>
		        		<table class="table table-hover">
		        			<tr>
		        				<th>Año</th>
		        				<th>CN Plan de reducción de emisiones de gases</th>
			                    <th>CN Meta</th>
			                    <th>CN Plan de conservación y reforestación</th>
			                    <th>CN Árboles sembrados/año </th>
			                    <th>CN Certificados</th>
			                    <th>GR Politica de Gestión Ambienta</th>
			                    <th>GR Plan de Gestión Ambiental</th>
			                    <th>GR Participación en actividades</th>
			                    <th>GR Iniciativa de Proyección Ambiental</th>
			                    <th>GR Programas de Compras Verdes</th>
			                    <th>GR Número de Carteles con Inclusión de Criterios Ambientales</th>
			                    <th>GR Comision de Gestion Ambiental</th>
			                    <th>GRE Comité para la Gestión del Recurso Energético</th>
			                    <th>GRE PRC-en todas las Unidades o Centros</th>
			                    <th>GRE Meta de reducción</th>
			                    <th>GRE Control y evaluación de consumo según el alcance definido</th>
			                    <th>RHACH IFA Número de pozos</th>
			                    <th>RHACH IFA Número de nacientes</th>
			                    <th>RHACH IFA Número de ríos</th>
			                    <th>RHACH IFA Número de hídrometros</th>
			                    <th>RHACH realizan análisis de calidad de agua</th>
			                    <th>RHACH ¿Poseen plan de ahorro de agua?</th>
			                    <th>RHACH Porcentaje de Reducción</th>
			                    <th>RHACH ¿Poseen plan de manejo de cuerpos de agua?</th>
			                    <th>RHACH ¿Poseen permisos de explotación de pozos?</th>
			                    <th>RHACH ¿Poseen plan de mantenimiento de sistemas de abastecimiento de agua?</th>
			                    <th>RAAR Reportes Operacionales</th>
			                    <th>RS ¿Posee plan de manejo de residuos sólidos en ejecución?</th>
			                    <th>RS Trazabilidad de gestores de residuos</th>
		        			</tr>

		        			<tr></tr>
		        		</table>
		        		<h6>*CN: Carbono neutralidad</h6>
		        		<h6>*GR: Gestión de recursos</h6>
		        		<h6>*IFA: Inventario de fuentes de agua</h6>
		        		<h6>*PRC: Plan de reducción del consumo </h6>
		        		<h6>*RHACH: Recurso hídrico: Agua para consumo humano</h6>
		        		<h6>*RHAR: Recurso hídrico: Aguas residuales</h6>
		        		<h6>*RS: Residuos sólidos</h6>
		        	</div>
		        	<div id="tabla_Registos_salida" style='display:none;'>
		        		<h4>Registro de salida</h4>
		        		<table class="table table-hover">
			        		<tr>
			        			<th>Año</th>
			        			<th>CN Invent. EG EI</th>
			        			<th>CN CO2</th>
			        			<th>RHAR IEARPD descargas al alcantarillado público</th>
			        			<th>RHAR IEARPD descargas a tanques sépticos</th>
			        			<th>RHAR IEARPD descargas al sistema de tratamiento</th>
			        			<th>RHAR ¿Posee STAR debidamente inscrito y con un diseño adecuado?</th>
			        			<th>RHAR ¿Realiza análisis de aguas residuales?</th>
			        			<th>RS Generación de residuos sólidos per cápita</th>
			        			<th>RS Indicadores de recuperación de residuos sólidos</th>
			        			<th>RS Tasa anual de reciclaje</th>
			        		</tr>
			        		<tr>

			        		</tr>
		        		</table>
		        		<h6>*CN: Carbono neutralidad</h6>
		        		<h6>*IEARPD: Inventario de efluentes de aguas residuales y puntos de descarga</h6>
		        		<h6>*RHAR: Recurso hídrico: Aguas residuales</h6>
		        		<h6>*STAR: Sistema de tratamiendro de aguas residuales</h6>
		        		<h6>*RS: Residuos sólidos</h6>
		        	</div>

		        </div>

			</div>

			</div>

		</Form>
	    </div>
	</div>
	</div>

</body>
		<script src="js/app.js"></script>
		<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>

					<script type="text/javascript">

							function mostrarAreas(){
									document.getElementById('combobox_usuario_consulta_area').style.display = 'inline-block';
									document.getElementById('boton_areas').style.display = 'inline-block';
									document.getElementById('boton_tipos').style.display = 'none';
									document.getElementById('combobox_consulta_tipo').style.display = 'none';
									document.getElementById('checkbox_areas_personalizadas').style.display = 'none';
									document.getElementById('checkbox_tipos_personalizados').style.display = 'none';


									document.getElementById('tabla_Registro_Consumo').style.display = 'none';
									document.getElementById('tabla_Gestion').style.display = 'none';
									document.getElementById('tabla_Registos_salida').style.display = 'none';


									if(document.getElementById('area_personalizada').selectedIndex == 7){
										document.getElementById('checkbox_areas_personalizadas').style.display = 'block';
											document.getElementById('table_CN').style.display = 'none';
											document.getElementById('table_GR').style.display = 'none';
											document.getElementById('table_GRE').style.display = 'none';
											document.getElementById('table_RHACH').style.display = 'none';
											document.getElementById('table_RHAR').style.display = 'none';
											document.getElementById('table_RS').style.display = 'none';
									}


							};
							function mostrarTipos(){
									document.getElementById('combobox_usuario_consulta_area').style.display = 'none';
									document.getElementById('boton_areas').style.display = 'none';
									document.getElementById('boton_tipos').style.display = 'inline-block';
									document.getElementById('combobox_consulta_tipo').style.display = 'inline-block';
									document.getElementById('checkbox_areas_personalizadas').style.display = 'none';
									document.getElementById('checkbox_tipos_personalizados').style.display = 'none';
									document.getElementById('table_CN').style.display = 'none';
									document.getElementById('table_GR').style.display = 'none';
									document.getElementById('table_GRE').style.display = 'none';
									document.getElementById('table_RHACH').style.display = 'none';
									document.getElementById('table_RHAR').style.display = 'none';
									document.getElementById('table_RS').style.display = 'none';

									if(document.getElementById('tipo_personalizado').selectedIndex == 4){
										document.getElementById('checkbox_tipos_personalizados').style.display = 'block';
											document.getElementById('tabla_Registro_Consumo').style.display = 'none';
										document.getElementById('tabla_Gestion').style.display = 'none';
										document.getElementById('tabla_Registos_salida').style.display = 'none';
									}


							};


							 function mostrarAreasSeleccionadas(){
											document.getElementById('checkbox_areas_personalizadas').style.display = 'none';
											document.getElementById('tablas_areas').style.display = 'block';


											switch (document.getElementById('area_personalizada').selectedIndex){
													case 0:
															document.getElementById('table_CN').style.display = 'inline-block';
															document.getElementById('table_GR').style.display = 'none';
															document.getElementById('table_GRE').style.display = 'none';
															document.getElementById('table_RHACH').style.display = 'none';
															document.getElementById('table_RHAR').style.display = 'none';
															document.getElementById('table_RS').style.display = 'none';
															break;
													case 1:

															document.getElementById('table_CN').style.display = 'none';
															document.getElementById('table_GR').style.display = 'inline-block';
															document.getElementById('table_GRE').style.display = 'none';
															document.getElementById('table_RHACH').style.display = 'none';
															document.getElementById('table_RHAR').style.display = 'none';
															document.getElementById('table_RS').style.display = 'none';
															break;
													case 2:
															document.getElementById('table_CN').style.display = 'none';
															document.getElementById('table_GR').style.display = 'none';
															document.getElementById('table_GRE').style.display = 'inline-block';
															document.getElementById('table_RHACH').style.display = 'none';
															document.getElementById('table_RHAR').style.display = 'none';
															document.getElementById('table_RS').style.display = 'none';

															break;
													case 3:

															document.getElementById('table_CN').style.display = 'none';
															document.getElementById('table_GR').style.display = 'none';
															document.getElementById('table_GRE').style.display = 'none';
															document.getElementById('table_RHACH').style.display = 'inline-block';
															document.getElementById('table_RHAR').style.display = 'none';
															document.getElementById('table_RS').style.display = 'none';

															break;
													case 4:
															document.getElementById('table_CN').style.display = 'none';
															document.getElementById('table_GR').style.display = 'none';
															document.getElementById('table_GRE').style.display = 'none';
															document.getElementById('table_RHACH').style.display = 'none';
															document.getElementById('table_RHAR').style.display = 'inline-block';
															document.getElementById('table_RS').style.display = 'none';


															break;
													case 5:
															document.getElementById('table_CN').style.display = 'none';
															document.getElementById('table_GR').style.display = 'none';
															document.getElementById('table_GRE').style.display = 'none';
															document.getElementById('table_RHACH').style.display = 'none';
															document.getElementById('table_RHAR').style.display = 'none';
															document.getElementById('table_RS').style.display = 'inline-block';


															break;
													case 6:
															document.getElementById('table_CN').style.display = 'inline-block';
															document.getElementById('table_GR').style.display = 'inline-block';
															document.getElementById('table_GRE').style.display = 'inline-block';
															document.getElementById('table_RHACH').style.display = 'inline-block';
															document.getElementById('table_RHAR').style.display = 'inline-block';
															document.getElementById('table_RS').style.display = 'inline-block';
															break;
													case 7:

														document.getElementById('checkbox_areas_personalizadas').style.display = 'block';
													if(document.getElementById('checkAreasCN').checked){
														document.getElementById('table_CN').style.display = 'inline-block';
													}
													else{
														document.getElementById('table_CN').style.display = 'none';
													}
													if(document.getElementById('checkAreasGR').checked){
														document.getElementById('table_GR').style.display = 'inline-block';
													}
													else{
														document.getElementById('table_GR').style.display = 'none';
													}
													if(document.getElementById('checkAreasGRE').checked){
														document.getElementById('table_GRE').style.display = 'inline-block';
													}
													else{
														document.getElementById('table_GRE').style.display ='none';
													}
													if(document.getElementById('checkAreasRHACH').checked){
														document.getElementById('table_RHACH').style.display = 'inline-block';
													}
													else{
														document.getElementById('table_RHACH').style.display ='none';
													}
													if(document.getElementById('checkAreasRHAR').checked){
														document.getElementById('table_RHAR').style.display = 'inline-block';
													}
													else{
														document.getElementById('table_RHAR').style.display ='none';
													}
													if(document.getElementById('checkAreasRS').checked){
														document.getElementById('table_RS').style.display = 'inline-block';
													}
													else{
														document.getElementById('table_RS').style.display ='none';
													}
														break;

									}
							 };



							 function mostrarTiposSeleccionados(){
								document.getElementById('tablas_tipos').style.display = 'block';
								switch (document.getElementById('tipo_personalizado').selectedIndex){
									case 0:
										document.getElementById('tabla_Registro_Consumo').style.display = 'inline-block';
													document.getElementById('tabla_Gestion').style.display = 'none';
													document.getElementById('tabla_Registos_salida').style.display = 'none';
										break;
									case 1:
										document.getElementById('tabla_Registro_Consumo').style.display = 'none';
													document.getElementById('tabla_Gestion').style.display = 'inline-block';
													document.getElementById('tabla_Registos_salida').style.display = 'none';

										break;
									case 2:
										document.getElementById('tabla_Registro_Consumo').style.display = 'none';
													document.getElementById('tabla_Gestion').style.display = 'none';
													document.getElementById('tabla_Registos_salida').style.display = 'inline-block';

										break;
									case 3:
										document.getElementById('tabla_Registro_Consumo').style.display = 'inline-block';
													document.getElementById('tabla_Gestion').style.display = 'inline-block';
													document.getElementById('tabla_Registos_salida').style.display = 'inline-block';

										break;
									case 4:
										document.getElementById('checkbox_tipos_personalizados').style.display = 'block';
										if(document.getElementById('checkTiposRegistrosConsumo').checked){
											document.getElementById('tabla_Registro_Consumo').style.display= 'inline-block';
										}
										else{
											document.getElementById('tabla_Registro_Consumo').style.display= 'none';
										}
										if(document.getElementById('checkTiposGestion').checked){
											document.getElementById('tabla_Gestion').style.display= 'inline-block';
										}
										else{
											document.getElementById('tabla_Gestion').style.display= 'none';
										}
										if(document.getElementById('checkTiposRegistrosSalida').checked){
											document.getElementById('tabla_Registos_salida').style.display= 'inline-block';
										}
										else{
											document.getElementById('tabla_Registos_salida').style.display= 'none';
										}
										break;
								}
							 };

					</script>
					<?php virtual ("footer.html");?>

</html>
