<?php if(isset($tipo_empleado_modal)){
					foreach($tipo_empleado_modal as $valor){ ?>
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
								×
							</button>
							<h4 id="myLargeModalLabel" class="modal-title">Modificar Tipo Empleado</h4>
						</div>
						<div class="modal-body">
							<p>
								<label for="form-field-23">Tipo Empleado</label>
								<input type="hidden" id="idmem<?php echo $valor->id_tipoempleado;?>" value="<?php echo $valor->id_tipoempleado;?>" required>
								<input class="form-control" maxlength="20" type="text" id="edtipomembre<?php echo $valor->id_tipoempleado;?>" name="edtipomembre" value="<?php echo $valor->descripcion;?>" required>
							</p>
						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" class="btn btn-default" type="button">
								Cerrar
							</button>
							<button class="btn btn-primary"  data-dismiss="modal" type="button" onclick="Actualizar(<?php echo $valor->id_tipoempleado;?>)" >
								Guardar
							</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
<?php }} ?>