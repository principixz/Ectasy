	<?php include('public/css.inc');?>

<body>
	<?php include('includes/menu.inc');?>


				<div class="container">
					<div class="toolbar row">
						<div class="col-sm-6 hidden-xs">
							<div class="page-header">
								<h1>Personal <small>Se guardarán los datos del personal que trabaja en la empresa</small></h1>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
							<div class="col-sm-12">
								<!-- start: TEXT FIELDS PANEL -->
								<div class="panel panel-white">

									<div class="panel-body">
										<h2><i class="fa fa-pencil-square"></i> REGISTRAR</h2>
										<p>Registrar Nuevo Empleado</p>
										<form role="form" id="form" method="post" action="<?php echo base_url()?>Personal_c/registrar_empleado">
											<div class="col-md-12">
													<div class="errorHandler alert alert-danger no-display">
														<i class="fa fa-times-sign"></i> Tienes algun error en el formulario. Por favor verifique.
													</div>
													<div class="successHandler alert alert-success no-display">
														<i class="fa fa-ok"></i> El registro fue exitoso!
													</div>
											</div>
											<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															Nombres <span class="symbol required"></span>
														</label>
														<input type="text" maxlength="30" value="" placeholder="Inserta tu Nombre" class="form-control" id="nombre" name="nombre">
													</div>
													<div class="row">
														<div class="col-md-6">
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
															Correo Electronico <span class="symbol required"></span>
														</label>
														<input type="email" placeholder="ejemplo@sucorreo.com" class="form-control" id="email" name="email">
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">
																Telefono Fijo <span class="symbol required"></span>
																</label>
																<input type="text" maxlength="6" placeholder="" class="form-control" id="fijo" name="fijo">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
															<label class="control-label">
															Celular <span class="symbol required"></span>
															</label>
															<input type="text" maxlength="9" placeholder="" class="form-control" id="celular" name="celular">
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label">
														Direccion <span class="symbol required"></span>
														</label>
														<input type="text" maxlength="30" placeholder="Direccion" class="form-control" id="direccion" name="direccion">
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
												</div>
													<div class="col-md-6">
													<div class="form-group connected-group">
														<label class="control-label">
															Fecha Nacimiento <span class="symbol required"></span>
														</label>
														<div class="input-group">
															<input type="text" data-date-format="dd-mm-yyyy" name="fecha" id="fecha" data-date-viewmode="years" class="form-control date-picker">
															<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
														</div>
														
													</div>
													<div class="form-group">
														<label class="control-label">
															Sexo <span class="symbolf required"></span>
														</label>
														<div>
															<?php foreach ($sexo as $value ) { ?>
															<label class="radio-inline">
																<input type="radio" class="grey" value="<?php echo $value->id_sexo; ?>" name="sexo" id="<?php echo $value->id_sexo; ?>">
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
																<input class="form-control tooltips" type="number" maxlength="15" data-original-title="Insertar el número de su documento" data-rel="tooltip"  title="" data-placement="top" name="documento" id="documento">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label class="control-label">
																Numero de Hijos <span class=""></span>
																</label>
																<input type="number" placeholder="" class="form-control" id="hijos" name="hijos">
															</div>
														</div>
														<div class="col-md-8">
															<div class="form-group">
																<label class="control-label">
																	Hobby <span class=""></span>
																</label>
																<input class="form-control tooltips" maxlength="20" type="text"  type="text" data-placement="top" name="hobby" id="hobby">
															</div>
														</div>
													</div>
													<div class="form-group">
																<label class="control-label">
																	Tipo Empleado <span class="symbol required"></span>
																</label>
																<div>
																<select class="form-control" id="tipo_empleado" name="tipo_empleado">
																	<option value="">Seleccione...</option>
																<?php foreach ($tipo_empleado as $value ) { ?>
																	<option value="<?php echo $value->id_perfil_usuario;?>"><?php echo $value->descripcion; ?></option>
																<?php } ?>
																</select>
																</div>
													</div>
													
												</div>
											

													<div class="row">
														<div class="col-md-3">
															<p>
															<a href="<?php echo base_url()?>Personal_c" class="btn btn-red btn-block" type="">
																 <i class="fa fa-arrow-circle-left"></i> Cancelar
															</a>
															</p>
														</div>
														<div class="col-md-3">
															<button class="btn btn-yellow btn-block" type="submit">
																Registrar <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>													
													</div>
										</form>
									</div>
								</div>
								<!-- end: TEXT FIELDS PANEL -->
							</div>
					</div>
				</div>
			<!-- end: PAGE -->
		</div>
	</div>

	<?php include('includes/pie.inc');?>
	<?php include('includes/js_principal.inc');?>
	<script>
	cargar_departamentos();
	$("#departamento").change(function(){dependencia_provincia();});
	$("#provincia").change(function(){dependencia_distrito();});
	$("#provincia").attr("disabled",true);
	$("#distrito").attr("disabled",true);
var datos="<option value=''>Seleccione...</option";
function cargar_departamentos()
{

	$.post("<?php echo site_url('Personal_c/cargar_departamentos');?>" , function(data){
		if(data == false)
		{
			alert("Error");
		}
		else
		{
			$('#departamento').append(data);			
		}
	});	
}
function dependencia_provincia()
{
	var code = $("#departamento").val();
	$.post("<?php echo site_url('Personal_c/cargar_provincias');?>", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				
				$("#provincia").attr("disabled",true);	
				$("#distrito").attr("disabled",true);
				$("#provincia").empty("disabled",true);	
				$("#distrito").empty("disabled",true);	
				$("#provincia").append(datos);	
				$("#distrito").append(datos);
			}
			else
			{
				$("#provincia").attr("disabled",false);
				document.getElementById("provincia").options.length=1;
				$('#provincia').append(resultado);			
			}
		}

	);
}
function dependencia_distrito()
{
	var code = $("#provincia").val();
	$.post("<?php echo site_url('Personal_c/cargar_distrito');?>", { code: code }, function(resultado){
		if(resultado == false)
		{
			$("#distrito").attr("disabled",true);
			$("#distrito").append(datos);	
		}
		else
		{
			$("#distrito").attr("disabled",false);
			document.getElementById("distrito").options.length=1;
			$('#distrito').append(resultado);			
		}
	});	
	
}
	var validateCheckRadio = function (val) {
        $("input[type='radio'], input[type='checkbox']").on('ifChecked', function(event) {
			$(this).parent().closest(".has-error").removeClass("has-error").addClass("has-success").find(".help-block").hide().end().find('.symbol').addClass('ok');
		});
    };
    var fecha = function() {
		$('.date-picker').datepicker({
		format: 'mm-dd-yyyy',
      endDate: '+0d',
      autoclose: true
		});
		$('.date-picker').keypress(function(evt){
			return false;
		});
	};
	fecha(); 

var runValidator1 = function () {
        var form1 = $('#form');
        var errorHandler1 = $('.errorHandler', form1);
        var successHandler1 = $('.successHandler', form1);
               
        $('#form').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                nombre: {
                    minlength: 2,
                    required: true
                },
                materno: {
                    minlength: 2,
                    required: true
                },
                paterno: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
              
                fecha: {
                	required:true
                },
               
                departamento: {
                	required: true,
                },
                provincia: {
                	required: true,
                },
                distrito: {
                	required: true,
                },
               
                sexo: {
                    required: true
                },
                tipo_empleado: {
                    required: true
                },
                fijo: {
                    required: true,
                    number: true,
                    minlength: 6
                },
                celular: {
                    required: true,
                    number: true,
                    minlength: 9
                },
                direccion: {
                    required: true,
                    minlength: 9
                },
                documento: {
                    required: true
                },
                tipo_documento: {
                    required: true
                },
            },
            messages: {
                nombre: "Por favor especifica tu nombre",
                materno: "Por favor especifica tu Apellido Materno",
                paterno: "Por favor especifica tu Apellido Paterno",
                celular: "Por favor ingrese numero valido",
                direccion: "Por favor ingrese direccion valida",
                fijo: "Por favor ingresar numero valido",
                departamento: "Seleccione una opcion",
                provincia: "Seleccione una opcion",
                distrito: "Seleccione una opcion",
                tipo_empleado: "Seleccione una opcion",
                documento: "Seleccione una opcion",
                tipo_documento: "Seleccione una opcion",
                fecha: "Introducir la fecha de Nacimiento",
                email: {
                    required: "Nosotros necesitamos el correo electronico!!",
                    email: "Ingrese su correo en este formato ejemplo@gmail.com"
                },
                sexo: "Por favor seleccione el genero!"
            },
            groups: {
                DateofBirth: "dd mm yyyy",
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                successHandler1.hide();
                errorHandler1.show();
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                successHandler1.show();
                errorHandler1.hide();
                // submit form
                //$('#form').submit();
                document.getElementById("#form").submit();
            }
        });
    };


		function alerta_message(msg,title,method)
		{
			var shortCutFunction = method;
            var msg = msg;
            var title = title || '';
            var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
            $toastlast = $toast;
		}

		function message_nothing()
		{
          swal({
                title: "No deje vacio el campo!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dedo.png';?>"
            });
        }

        function message_nothing2()
		{
          swal({
                title: "No puede insertar un campo vacio, Por Favor llenelo!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dedo.png';?>"
            });
        }

        function eliminar_perfil(idperfil)
        {
        	$.post("<?php echo site_url('Perfiles_c/delete_perfil'); ?>",{idperfil:idperfil},respuesta_de_la_eliminacion);
        }

        function respuesta_de_la_eliminacion(rpta)
        {
        	var respta = rpta.split("-");
        	if(respta[0] == 1)
			{
				alerta_message("Se Eliminó Correctamente","Mensaje","success");
				$("#tabla_perfil").empty();
				$("#tabla_perfil").append(respta[1]);
			}
			else
			{
				alerta_message("Error al eliminar","Mensaje","error");
				$("#tabla_perfil").empty();
				$("#tabla_perfil").append(respta[1]);
			}
        }


        function alerta()
		{
          swal({
                title: "No, primero termine de realizar la operacion!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dedo.png';?>"
            });
        }

		 $('#tabla_default').dataTable({
			"aoColumnDefs" : [{
				"aTargets" : [0]
			}],

			"oLanguage" : {
				"sInfo": "Mostrando Página _PAGE_",
				"sLengthMenu" : "Mostrar _MENU_ Registros",

				"sSearch" : "",
				"oPaginate" : {
					"sPrevious" : "",
					"sNext" : ""
				}
			},
			"aaSorting" : [[1, 'asc']],
			"aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
			],
			// set the initial value
			"iDisplayLength" : 10,
		});

		$('#tabla_default_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Buscar Personal");
		// modify table search input
		$('#tabla_default_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		$('#tabla_default_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		$('#tabla_default_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
		validateCheckRadio();
            runValidator1();

	


	</script>
</body>

</html>

