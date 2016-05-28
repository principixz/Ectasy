<?php include('public/css.inc');?>
<body>
		<?php include('public/menu.inc');?>
		<?php include('public/js.inc');?>
	<div class="container">
		<div class="toolbar row">
			<div class="col-sm-6 hidden-xs">
				<div class="page-header">
				<h1>Base de Datos <small></small></h1>
				</div>
			</div>
		</div>
	</div>
<div>
<div class="container">
	<div class="row">
		<div class="col-sm-6 hidden-xs">
			<ol class="breadcrumb">
				<li class="active">
				Actualizar Base de Datos
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
							<div class="col-sm-12">
								<!-- start: FORM WIZARD PANEL -->
								<div class="panel panel-white">
									<div class="panel-body">
										<form action="<?php echo base_url();?>Cambiarbase_c/modificar" method="post" role="form" class="smart-wizard form-horizontal" id="form">
											<div id="wizard" class="swMain">
												<div id="step-1">
													<h2 class="StepTitle">Modificar</h2>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															GESTOR <span></span>
														</label>
														<div class="col-sm-7">
															<select name="gestor" id="c" class="form-control">
																<option value="<?php echo $datos['gestor']; ?>"><?php echo $datos['gestor']; ?></option>
																<option value="MYSQL">MYSQL</option>
																<option value="POSTGRES">POSTGRES</option>
																<option value="SQL">SQL</option>
																<option value="ORACLE">ORACLE</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															HOST <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<input type="text" value="<?php echo $datos['host']; ?>" class="form-control" id="host" name="host" placeholder="Text Field" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															USUARIO <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<input type="text" value="<?php echo $datos['usuario']; ?>" class="form-control" id="email" name="usuario" placeholder="Text Field"  required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															Clave <span class=""></span>
														</label>
														<div class="col-sm-7">
															<input type="text" value="<?php echo $datos['password']; ?>" class="form-control" id="password" name="clave" placeholder="Text Field" >
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															BASE DE DATOS <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<input type="text" value="<?php echo $datos['basedatos']; ?>" class="form-control" id="email" name="basedatos" placeholder="Text Field" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															DRIVER <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<input type="text" value="<?php echo $datos['driver']; ?>" class="form-control" id="email" name="driver" placeholder="Text Field" required>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-2 col-sm-offset-8">
															<button class="btn btn-blue next-step btn-block">
																Guardar <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- end: FORM WIZARD PANEL -->
							</div>
						</div>
</div>
</div>
	</body>
	<!-- end: BODY -->
		<?php include('public/pie.inc');?>

</html>