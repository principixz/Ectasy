<?php if(isset($categoria_ejercicios_modal)){
					foreach($categoria_ejercicios_modal as $valor){ ?>
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
								×
							</button>
							<h4 id="myLargeModalLabel" class="modal-title">Modificar Categoria Ejercicios</h4>
						</div>
						<div class="modal-body">
							<p>
								<label for="form-field-23">Categoria Ejercicios</label>
								<input type="hidden"  id="idmem<?php echo $valor->id_categoria_ejercicio;?>" value="<?php echo $valor->id_categoria_ejercicio;?>" required>
								<input class="form-control" maxlength="20" type="text" id="edtipomembre<?php echo $valor->id_categoria_ejercicio;?>" name="edtipomembre" value="<?php echo $valor->descripcion;?>" required>
							</p>
						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" class="btn btn-default" type="button">
								Cerrar
							</button>
							<button class="btn btn-primary"  data-dismiss="modal" type="button" onclick="Actualizar(<?php echo $valor->id_categoria_ejercicio;?>)" >
								Guardar
							</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
<?php }} ?>