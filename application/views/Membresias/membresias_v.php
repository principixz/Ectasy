<?php $hoy=  date("d")."-".date("m")."-".date("Y");?>
<?php include('public/css.inc');?>
<body>
	<?php include('public/menu.inc');?>
	<?php include('public/js.inc');?>
	<div class="container">
		<div class="toolbar row">
			<div class="col-sm-2 hidden-xs">
				<h1>Ventas</h1>
			</div>
		</div>
	</div>
	<div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				</div>
				<div class="col-md-12"></div>
				<div class="col-md-12"></div>
				<div class="col-md-12"></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-white">
						<div class="row">
							<div class="col-md-9"></div>
							<div class="col-md-2"></div>
						</div>
						<!-- Inicio Container -->
						<div class="container-12">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<p class="list-group-item list-group-item-success">Registro de Ventas</p>
										<div class="col-md-12 list-group-item list-group-item-danger">
											<!-- Inicio -->
											<div class="col-md-6">
												<div class="row">
													<!-- Inicio -->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Comprobante <span class="symbol required"></span>
															</label>
															<div class="">
																<select class="form-control" id="comprobante" name="comprobante">
																	<option value="0">Elegir ...</option>
																	<option value="1">Ticket Simple</option>
																	<option value="2">Boleta</option>
																	<option value="3">Factura</option>
																</select>
															</div>															
														</div>
													</div><!-- Fin -->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Nro. : <span class="symbol required"></span>
															</label>
															<input type="text" name="nro_documento" placeholder="Numero Documento" id="nro_documento" class="form-control" disabled="">		
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Fecha <span class="symbol required"></span>
															</label>
															<input type="text" value="<?php echo $hoy ?>" data-date-format="dd-mm-yyyy" name="fechaventa" id="fechaventa" data-date-viewmode="years" class="col-md-3 form-control date-picker" disabled>
														</div>
													</div>
													<div class="col-md-3"></div>
													<div class="col-md-3" id="adelantocre" style="float:left;display: none;"  >												
														<div class="form-group">
															<label class="control-label">
																Adelanto <span class="symbol required"></span>
															</label>
															<input type="number" maxlength="5" placeholder="" value="0.00" step="0.01" class="form-control" id="adelanto" name="adelanto" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label">
														Nombre Cliente <span class="symbol required"></span>
													</label>
													<div class="input-group">
														<input type="text" placeholder="" value="" name="nombre" id="nombre" class="form-control" disabled>
														<input type="hidden" placeholder="" name="dni" id="dni" class="form-control">
														<span class="input-group-btn">
															<button class="btn btn-social-icon btn-reddit"  id="buscar" onclick="Buscar()" type="submit">
																<i class="fa fa-search"></i>
															</button>
															<button class="btn btn-social-icon btn-reddit" id="agregar" onclick="Agregar()"  type="submit">
																<i class="fa fa-male"></i>
															</button>
														</span>
													</div>												
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">
																Tipo Pago <span class="symbol required"></span>
															</label>
															<div class="input-group">
																<select class="form-control" id="modalidadtrans" name="modalidadtrans">
																	<?php foreach ($transaccion as $value ) { ?>
																	<option value="<?php echo $value->id_modalidad_transaccion;?>"><?php echo $value->descripcion; ?></option>
																	<?php } ?>
																</select>
																<span class="input-group-btn">
																	<button class="btn btn-social-icon btn-reddit"  name="evaluar" id="evaluar" onclick="Evaluar()" type="submit">
																		<i class="fa fa-road"></i>
																	</button>

																</span>
															</div>	
														</div>
													</div>
													<div class="row" >
														<input type="hidden" name="estado_cronograma"  id="estado_cronograma" value="0" >
														<div class="col-md-3" id="cuotascre" style="float:left;display: none;"  >												
															<div class="form-group">
																<label class="control-label">
																	Cuotas <span class="symbol required"></span>
																</label>
																<input type="number" maxlength="5" placeholder="" value="" class="form-control" id="cuotas" name="cuotas" >
															</div>
														</div>
														<div class="col-md-3" id="intervacredi" style="float:left;display: none;" >												
															<div class="form-group">
																<label class="control-label">
																	Intervalo Dias <span class="symbol required"></span>
																</label>
																<div class="input-group">
																	<input type="number" maxlength="5" placeholder="" value="" class="form-control" id="intervalo" name="intervalo" >
																	<span class="input-group-btn">
																		<button class="btn btn-social-icon btn-reddit" title="Ver Cronograma" name="cronograma" id="VtnCuotas">
																			<i class="fa fa-list-alt"	></i>
																		</button>
																	</span>
																</div>
															</div>
														</div>	
													</div>

												</div>

												<!-- Fin -->
											</div>
											<!-- Fin -->
											<div class="col-md-6">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">
																Encargado <span class="symbol required"></span>
															</label>
															<input  type="text" maxlength="15" value="<?php echo $_SESSION['personal']?>" placeholder="Insertar Apellido Materno" class="form-control" id="empleado" name="empleado" disabled>
															<input type="hidden" maxlength="15" value="<?php echo $_SESSION['id_empleado']?>" placeholder="Insertar Apellido Materno" class="form-control" id="id_empleado" name="id_empleado" disabled>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Tipo Venta <span class="symbol required"></span></label>
															<div class="form-group">
																<select id="tipoventa" name="tipoventa" class="form-control">
																	<option selected value="1">Servicio</option>
																	<option value="2">Producto</option>
																</select>
															</div>
														</div>
													</div>
													<div id="membresias" >
														<div class="col-md-6">
															<label class="control-label">
																Seleccionar Paquete<span class="symbol required"></span>
															</label>
															<div class="input-group">
																<input type="text" placeholder="" value="" name="nompaquete" id="nompaquete" class="form-control" disabled>
																<input type="hidden" placeholder="" name="idpaquete" id="idpaquete" class="form-control">
																<span class="input-group-btn">
																	<button class="btn btn-social-icon btn-reddit" id="AbrirVtnBuscarMembresia"  type="submit">
																		<i class="fa fa-search"></i>
																	</button>
																</span>
															</div>	
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">
																	Fecha Inicio <span class="symbol required"></span>
																</label>
																<input type="text" value="<?php $time = time(); echo date("d-m-Y",$time) ?>"data-date-format="dd-mm-yyyy" name="fechainiciop" id="fechainiciop" data-date-viewmode="years" class="col-md-3 form-control date-picker" disabled>

															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">
																	Precio <span class="symbol required"></span>
																</label>
																<input type="text" value="0.00" style="text-align:right;" name="preciopa" id="preciopa" class="col-md-3 form-control" disabled>
															</div>
														</div><br>&nbsp;
														<div class="row">
														<div class="col-md-9"></div>
														<div class="col-md-3">
															<button type="button" title="Agregar al Detalle" id="AgregarDetalle" class="btn btn-primary">
																<i class="fa fa-plus"></i>Agregar
															</button>
														</div>
														</div>
													</div>
													<div id="productosventas" style="display: none;">
														<div class="col-md-6">
															<label class="control-label">
																Seleccionar Almacen<span class="symbol required"></span>
															</label>
															<div class="input-group">
																<select class="form-control" id="idalmacen" name="idalmacen">
																	<?php foreach ($almacen as $value ) { ?>
																	<option value="<?php echo $value->id_almacen;?>"><?php echo $value->descripcion; ?></option>
																	<?php } ?>
																</select>
																<span class="input-group-btn">
																	<a class="btn btn-social-icon btn-reddit" >
																		<i class="fa fa-suitcase"></i>
																	</a>
																</span>
															</div>		
														</div>
														<div class="col-md-6">
															<label class="control-label">
																Seleccionar Productos<span class="symbol required"></span>
															</label>
															<div class="input-group">
																<input type="text" placeholder="" value="" name="nombreproducto" id="nombreproducto" class="form-control" disabled>
																<input type="hidden" placeholder="" name="idproducto" id="idproducto" class="form-control">
																<input type="hidden" name="id_almacense" id="id_almacense"/>
																<input type="hidden" name="almacense" id="almacense"/>
																<span class="input-group-btn">
																	<button class="btn btn-social-icon btn-reddit"  id="AbrirVtnBuscarProducto" type="submit">
																		<i class="fa fa-search"></i>
																	</button>
																</span>
															</div>	
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">
																	Stock <span class="symbol required"></span>
																</label>
																<input type="text" value="" style="text-align:right;" name="stockactual" id="stockactual" class="col-md-3 form-control" disabled>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">
																	Cantidad <span class="symbol required"></span>
																</label>
																<select class="form-control" id="cantidad" name="cantidad">
																</select>	
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">
																	Precio <span class="symbol required"></span>
																</label>
																<input type="text" value="0.00" style="text-align:right;" name="preciopro" id="preciopro" class="col-md-3 form-control" disabled>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label class="control-label">
																	Importe <span class="symbol required"></span>
																</label>
																<input type="text" value="0.00" style="text-align:right;" name="importe" id="importe" class="col-md-3 form-control" disabled>
															</div>
														</div>
														<div class="col-md-9"></div>
														<div class="col-md-3">
															<button type="button" title="Agregar al Detalle" id="AgregarDetalleProducto" class="btn btn-primary">
																<i class="fa fa-plus"></i>Agregar
															</button>
														</div>
													</div>
												</div>												

											</div>
										</div>
										<div class="col-md-12 list-group-item list-group-item-success">
											<div class="row">
												<div class="col-md-9 table-responsive">
													<table class="table table-striped table-hover" id="tblDetalle">
														<th>Tipo</th>
														<th>Descripcion</th>
														<th>Almacen</th>
														<th>Fecha</th>
														<th>Cantidad</th>
														<th>Precio</th>
														<th>Importe(S/.)</th>
														<th>x</th>

													</table>												
												</div>
												<div class="span3">
													<div class="col-md-3">
														<div class="row">
															<div class="col-md-3">	
																<label class="control-label">
																	Subtotal
																</label>
															</div>
															<div class="col-md-2">
																<input type="text" id="subtotal" name="subtotal" value="0.00" readonly="readonly" class="form-control"  style="width: 150px"  /><br/>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">	
																<label class="control-label">
																	IGV
																	<input type="checkbox" id="chbx_igv" name="chbx_igv"/>
																</label>
															</div>
															<div class="col-md-3">
																<input type="text" id="igv" name="igv" value="0.00" readonly="readonly" class="form-control"  style="width: 150px"  /><br/>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">	
																<label class="control-label">
																	Total (S/.)
																</label>
															</div>
															<div class="col-md-3">
																<input type="text" id="total" name="total" value="0.00" readonly="readonly" class="form-control"  style="width: 150px"  /><br/>
															</div>
														</div>													
													</div>
												</div>
											</div>
										</div>


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<div id="clientes" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-target="#clientes">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-content">
							<div class="modal-header">
								<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
									×
								</button>
								<h3><center id="myLargeModalLabel" class="modal-title">Lista de Clientes</center></h3>
							</div>
							<div class="modal-body">
								<table id="tablabuscar_cliente" class="table table-striped table-hover" cellspacing="0">
									<thead>
										<tr>
											<th>Codigo</th>
											<th>Nombre</th>
											<th>Apellidos</th>
											<th>Celular</th>
											<th>Direccion</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tbody id="bodycliente">

									</tbody>
								</table><br><br>
								<div class="modal-footer">
									<button data-dismiss="modal" class="btn btn-default" type="button">
										Cerrar
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<div id="modalMembresia" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-target="#modalMembresia" aria-hidden="false">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-content">
							<div class="modal-header">
								<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
									×
								</button>
								<h3><center id="myLargeModalLabel" class="modal-title">Lista de Paquetes</center></h3>
							</div>
							<div class="modal-body">
								<form class="VtnBuscarMembresia">
									<div class="paquetesmodal">
										<div class="page-header" >

										</div>
									</div>
								</form>
								<div class="modal-footer">
									<button data-dismiss="modal" class="btn btn-default" type="button">
										Cerrar
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<div id="modalProductos" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-target="#modalProductos" aria-hidden="false">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-content">
							<div class="modal-header">
								<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
									×
								</button>
								<h3><center id="myLargeModalLabel" class="modal-title">Lista de Productos</center></h3>
							</div>
							<div class="modal-body">
								<form class="VtnBuscarProducto">
									<div class="productosmodal">
										<div class="page-header" >

										</div>
									</div>
								</form>
								<div class="modal-footer">
									<button data-dismiss="modal" class="btn btn-default" type="button">
										Cerrar
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<div id="modalCuotas" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-target="#modalCuotas" aria-hidden="false">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-content">
							<div class="modal-header">
								<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
									×
								</button>
								<h3><center id="myLargeModalLabel" class="modal-title">Cronograma de Pagos</center></h3>
							</div>
							<div class="modal-body">
								<form class="VtnCuotas">
									<div class="cronograma">
										<div class="page-header" >

										</div>
									</div>
								</form>
								<div class="modal-footer">
									<button data-dismiss="modal" class="btn btn-default" type="button">
										Cerrar
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
</body>
<?php include('js.php');?>
<?php include('public/pie.inc');?>
</html>