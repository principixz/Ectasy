<?php include('public/css.inc');?>

<body>
	<?php include('includes/menu.inc');?>

	<div class="container">
		<div class="toolbar row">
			<div class="col-sm-6 hidden-xs">
				<div class="page-header">
					<h1>Registrar Cliente <small>Se guardarán los datos del Cliente </small></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li><a href="#">Cliente</a></li>
					<li class="active">Registrar Cliente</li>
				</ol>
			</div>
		</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-white">
						<div class="panel-body">
							<form action="<?php base_url() ?>Clientes_c/agregar" method="post" role="form"  id="form">
											<div id="wizard" class="swMain">
												<ul>
										<li>
											<a href="#step-1">
											<div class="stepNumber">
											1
											</div>
											<span class="stepDesc"> Datos
											<br />
											<small>Generales</small> </span>
											</a>
										</li>
										<li>
											<a href="#step-2">
												<div class="stepNumber">
												2
												</div>
												<span class="stepDesc">Datos
												<br />
												<small>Personales</small> </span>
											</a>
										</li>
										<li>
											<a href="#step-3">
												<div class="stepNumber">
													3
												</div>
												<span class="stepDesc">Información
												<br />
												<small>Adicional</small> </span>
												</a>
										</li>
										<li>
											<a href="#step-4">
												<div class="stepNumber">
												4
												</div>
												<span class="stepDesc">Registrar
												<br />
												<small>Cliente</small> </span>
											</a>
										</li>
									</ul>
												<div class="progress progress-striped transparent-black no-radius active">
										<div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar partition-green step-bar">
											<span class="sr-only"> 0% Complete (success)</span>
										</div>
									</div>
												<div id="step-1">
													<h2 class="StepTitle">Datos Generales</h2>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Nombres <span class="symbol required"></span>
															</label>
															<input type="text" maxlength="30" value="" placeholder="Inserta tu Nombre" class="form-control" id="nombre" name="nombre">
														</div>
														<div class="row">
															<div class="col-md-5">
																<div class="form-group">
																<label class="control-label">
																Apellido Paterno <span class="symbol required"></span>
																</label>
																<input type="text" maxlength="15" placeholder="Insertar Apellido Materno" class="form-control" id="paterno" name="paterno">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label">
																	Apellido Materno <span class="symbol required"></span>
																	</label>
																	<input type="text" maxlength="15" placeholder="Insertar Apellido Materno" class="form-control" id="materno" name="materno">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label">
																Sexo <span class="symbolf required"></span>
															</label>
															<div>
																<?php foreach ($sexo as $value ) { ?>
																<label class="radio-inline">
																	<input type="radio" class="grey" value="<?php echo $value->id_sexo; ?>" name="sexo" id="sexo">
																	<?php echo $value->descripcion; ?>
																</label>
																<?php } ?>
															</div>
														</div>
														<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">
																	Tipo Documento <span class="symbol required"></span>
																</label>
																<div>
																<select class="form-control" id="tipo_documento" name="tipo_documento">
																<option value="">Seleccione...</option>
																<?php foreach ($tipo_doc as $value ) { ?>
																	<option value="<?php echo $value->id_tipodocumento;?>"><?php echo $value->descripcion; ?></option>
																<?php } ?>
																</select>
																</div>
															</div>
														</div>
														<div class="col-md-8">
															<div class="form-group">
																<label class="control-label">
																	Documento <span class="symbol required"></span>
																</label>																
																<input type="text" maxlength="15" onkeypress = "return validarNum(event)" placeholder="" class="form-control" id="documento" name="documento">
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label">
														Direccion <span class="symbol required"></span>
														</label>
														<input type="text" maxlength="30" placeholder="Direccion" class="form-control" id="direccion" name="direccion">
													</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Correo Electronico <span class="symbol required"></span>
															</label>
															<input type="email" placeholder="ejemplo@sucorreo.com" class="form-control" id="email" name="email">
														</div>
														<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">
																Telefono Fijo <span class=""></span>
																</label>
																<input type="text" maxlength="6" onkeypress = "return validarNum(event)" placeholder="" class="form-control" id="fijo" name="fijo">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
															<label class="control-label">
															Celular <span class="symbol required"></span>
															</label>
															<input type="text" maxlength="9" onkeypress = "return validarNum(event)" placeholder="" class="form-control" id="celular" name="celular">
															</div>
														</div>
													</div>
													<div class="form-group connected-group">
														<label class="control-label">
															Fecha Nacimiento <span class="symbol required"></span>
														</label>
														<div class="input-group">
															<input type="text" data-date-format="dd-mm-yyyy" name="fecha" id="fecha" data-date-viewmode="years" class="form-control date-picker">
															<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
														</div>														
													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">
																	Departamento <span class="symbol required"></span>
																</label>
																<div>
																<select class="form-control" id="departamento" name="departamento">
																
																	<option value="">Seleccione...</option>
																
																</select>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">
																	Provincia <span class="symbol required"></span>
																</label>
																<div>
																<select class="form-control" id="provincia" name="provincia">
																<option value="">Seleccione...</option>
																</select>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">
																	Distrito <span class="symbol required"></span>
																</label>
																<div>
																<select class="form-control" id="distrito" name="distrito">
																<option value="">Seleccione...</option>
																</select>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="col-md-3">
															
														</div>
														<div class="">
															<button class="btn btn-blue next-step btn-block">
																Siguiente <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>
													</div>
												</div>
													
												</div>
												<div id="step-2">
													<h2 class="StepTitle">Datos Personales</h2>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">
																Número de hijos<span class=""></span>
																</label>
																<input type="text" onkeypress = "return validarNum(event)" maxlength="2" placeholder="Numero de Hijos" class="form-control" id="hijos" name="hijos">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label">
																	Rango de Ingreso<span class=""></span>
																	</label>
																	<input type="text" maxlength="15" placeholder="0-200" class="form-control" id="rango" name="rango">
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">
																Tipo de Sangre<span class="symbol required"></span>
																</label>
																</div>
																<select class="form-control" id="sangre" name="sangre">
																<option value="">Seleccione...</option>
																<?php foreach ($sangre as $value ) { ?>
																	<option value="<?php echo $value->id_gruposanguineo;?>"><?php echo $value->descripcion; ?></option>
																<?php } ?>
																</select>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label">
																	Estado Civil<span class="symbol required"></span>
																	</label>
																</div>
																<select class="form-control" id="estadoc" name="estadoc">
																	<option value="">Seleccione...</option>
																	<?php foreach ($civil as $value ) { ?>
																		<option value="<?php echo $value->id_estadocivil;?>"><?php echo $value->descripcion; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">
																Numero de Emergencia<span class="symbol required"></span>
																</label>
																<input type="text" onkeypress = "return validarNum(event)" maxlength="9" placeholder="" class="form-control" id="emergencia" name="emergencia">
																</div>
															</div>
															<div class="col-md-6">
															<div class="form-group">
															<label class="control-label">
																¿Tiene algún tipo de Alergia? <span class=""></span>
															</label>
															<input type="text" maxlength="30" value="" placeholder="" class="form-control" id="alergia" name="alergia">
														</div>
															</div>
														</div>

													</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">
																Seguro Medico<span class=""></span>
																</label>
																<input type="text" maxlength="30" placeholder="Essalud" class="form-control" id="segurom" name="segurom">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label">
																	Ocupacion<span class=""></span>
																	</label>
																	<input type="text" maxlength="15" placeholder="" class="form-control" id="ocupacion" name="ocupacion">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label">
																¿Sufre de Alguna enfermedad o alguna lesión? <span class=""></span>
															</label>
															<input type="text" maxlength="30" value="" placeholder="" class="form-control" id="enfermedad" name="enfermedad">
														</div>
														<div class="form-group">
															<label class="control-label">
																¿Consume algún tipo de medicamento ? <span class=""></span>
															</label>
															<input type="text" maxlength="30" value="" placeholder="" class="form-control" id="medicamento" name="medicamento">
														</div>
														<div class="row">
															<div class="col-md-6">
																<button class="btn btn-light-grey back-step btn-block">
                                                                <i class="fa fa-circle-arrow-left"></i> Atras
                                                            	</button>
															</div>
															<div class="col-md-6">
																<button class="btn btn-blue next-step btn-block">
																Siguiente <i class="fa fa-arrow-circle-right"></i>
																</button>
															</div>
														</div>
													</div>
												</div>
												<div id="step-3">
													<h2 class="StepTitle">Datos Adicionales</h2>
													<div class="col-md-6">
											
																<div class="form-group">
																	<label class="control-label">
																	Grado de Estudio<span class=""></span>
																	</label>
																	<select class="form-control" id="grado" name="grado">
																<option value="">Seleccione...</option>
																<?php foreach ($grado as $value ) { ?>
																	<option value="<?php echo $value->id_gradoestudio;?>"><?php echo $value->descripcion; ?></option>
																<?php } ?>
																</select>
																</div>
																
													</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">
																Hobby<span class=""></span>
																</label>
																<input type="text" maxlength="20" placeholder="" class="form-control" id="hobby" name="hobby">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label class="control-label">
																	Alias<span class=""></span>
																	</label>
																	<input type="text" maxlength="15" placeholder="0-200" class="form-control" id="alias" name="alias">
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="col-md-6">
																<button class="btn btn-light-grey back-step btn-block">
                                                                <i class="fa fa-circle-arrow-left"></i> Atras
                                                            	</button>
															</div>
															<div class="col-md-6">
																<button class="btn btn-blue next-step btn-block">
																Siguiente <i class="fa fa-arrow-circle-right"></i>
																</button>
															</div>
														</div>
													</div>
												</div>
												<div id="step-4">
													<h2 class="StepTitle">Registrar Cliente</h2>
													<div class="col-md-4">
													<h3>Datos Generales</h3>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Nombre:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="nombre"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Apellidos:
																</label>
															</div>
															<div class="col-md-2">
																<p class="display-value" data-display="paterno"></p>
															</div>
															<div class="col-md-2">
																<p class="display-value" data-display="materno"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Documento:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="documento"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Sexo:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="sexo"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Direccion:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="direccion"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Correo:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="email"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Telefono Fijo:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="fijo"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Celular:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="celular"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Fecha Nacimiento:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="fecha"></p>
															</div>
														</div>	
													</div>		
													<div class="col-md-4">
													<h3>Datos Adicionales</h3>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	N° Hijos:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="hijos"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Rango:
																</label>
															</div>
															<div class="col-md-4">
																<p class="display-value" data-display="rango"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Tipo Sangre:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="sangre"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Estado Civil:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="estadoc"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	N° Emergencia:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="emergencia"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Seguro Medico
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="segurom"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Alergia:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="alergia"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Ocupacion:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="ocupacion"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Enfermedad:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="enfermedad"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Medicamento:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="medicamento"></p>
															</div>
														</div>			
													</div>
													<div class="col-md-4">
													<h3>Datos Personales</h3>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Grado Estudio:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="grado"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Hobby:
																</label>
															</div>
															<div class="col-md-2">
																<p class="display-value" data-display="hobby"></p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5">
																<label class="control-label">
																	Alias:
																</label>
															</div>
															<div class="col-md-6">
																<p class="display-value" data-display="alias"></p>
															</div>
														</div>
														
														
														<div class="row">
															<div class="col-md-6">
																
															</div>
															<div class="col-md-6">
																<button class="btn btn-success finish-step btn-block">
																Finalizar <i class="fa fa-arrow-circle-right"></i>
															</button>
															</div>
														</div>

													</div>																								
												</div>
											</div>
										</form>
						</div>
					</div>
				</div>
			</div>
		</div>

								
		
							
	</div>

	<?php include('includes/js_principal.inc');?>
	<?php include('js.php');?>

</body>
</html>