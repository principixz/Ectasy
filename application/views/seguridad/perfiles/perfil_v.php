	<html>
<head>
	<title>Ecstasy Gym</title>
	<!-- start: META -->
	<meta charset="utf-8" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<?php include('public/css.inc');?>
</head>
<body>
	<?php include('public/menu.inc');?>


				<div class="container">
					<div class="toolbar row">
						<div class="col-sm-6 hidden-xs">
							<div class="page-header">
								<h1>Perfiles <small>Se guardarán los perfiles de usuario que necesita el sistema</small></h1>
							</div>
						</div>

					</div>
					<br>
					<div class="row">
							<div class="col-sm-12">
								<!-- start: TEXT FIELDS PANEL -->
								<div class="panel panel-white">

									<div class="panel-body">
										<div class="row">
											<div class="col-md-12 space20">
												<button class="btn btn-green add-row" id="boton">
													Nuevo Perfil <i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
										<div class="table-responsive">
											<table class="table table-striped table-hover" id="tabla">
												<thead>
													<tr>
														<th>Perfiles de Usuario</th>

														<th>Modificar</th>
														<th>Eliminar</th>
													</tr>
												</thead>
												<tbody id="tabla_perfil">
													<?php foreach ($perfiles as $value) { ?>
													<tr id="modificar<?php echo $value->id_perfil_usuario; ?>">
														<td style="width:700px;"><?php echo $value->descripcion; ?></td>
														<td>
														<a href="#" onclick="modificar('<?php echo $value->descripcion; ?>','<?php echo $value->id_perfil_usuario; ?>')" >
															Modificar
														</a></td>
														<td>
														<a href="#" onclick="eliminar_perfil('<?php echo $value->id_perfil_usuario; ?>')" >
															Eliminar
														</a></td>
													</tr>

													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- end: TEXT FIELDS PANEL -->
							</div>
						</div>
				</div>


	
	<?php include('includes/js_principal.inc');?>
	<script>
		$("#boton").click(function(){
			if(!$('#nuevo').is(':visible'))
			{
				$("#tabla tbody")
				.prepend("<tr id='nuevo'><td><input type='text' style='width:300px;' name='descripcion' placeholder='Ingrese el Perfil de Usuario' ></td><td><a href='#' id='guardar' onclick='enviar_perfil()' >Guardar</a></td><td><a href='#' id='cancelar' onclick='cancelar()' >Cancelar</a></td></tr>");
			}
			else
			{
				alerta();
				$(".sa-icon").css("width","180");
				$(".sa-icon").css("height","160");
				$(".confirm").css("display","none");
				$(".showSweetAlert").css("background","#F0F7C8");
				$(".showSweetAlert").delay("2000").fadeOut("normal");
				$(".sweet-overlay").hide();
			}
		});


		function cancelar()
		{
			$.post("<?php echo site_url('Perfiles_c/listar') ?>",listado);
		}

		function listado(data)
		{
			$("#tabla_perfil").empty();
			$("#tabla_perfil").html(data);
		}

		function enviar_perfil()
		{

			var descripcion = $("input[name=descripcion]").val();

			if(descripcion != "")
			{
				$.post("<?php echo site_url('Perfiles_c/save_perfil'); ?>",{descripcion:descripcion},respuesta_perfil);

			}
			else
			{
				message_nothing2();
				$(".sa-icon").css("width","180");
				$(".sa-icon").css("height","160");
				$(".confirm").css("display","none");
				$(".showSweetAlert").css("background","#F0F7C8");
				$(".showSweetAlert").delay("2000").fadeOut("normal");
				$(".sweet-overlay").hide();
			}

		}

		function respuesta_perfil(band)
		{
			var resp = band.split("-");

			if(resp[0] == 1)
			{
	           	alerta_message("Se Guardó Correctamente","Mensaje","success");
				$("#tabla_perfil").empty();
				$("#tabla_perfil").append(resp[1]);
			}
			else
			{
				alerta_message("Error al guardar","Mensaje","error");
				$("#tabla_perfil").empty();
				$("#tabla_perfil").append(resp[1]);
			}
		}


		function modificar(descripcion,idperfil)
		{

			$("#modificar"+idperfil).empty();
			$("#modificar"+idperfil)
			.prepend("<td><input type='text' style='width:300px;' name='descripcion' value='"+descripcion+"' ></td><td><a href='#' id='guardar' onclick='modificar_perfil("+idperfil+")' >Modificar</a></td><td><a href='#' id='cancelar' onclick='cancelar()' >Cancelar</a></td>");
			$("#modificar"+idperfil).attr("id","nuevo");
		}

		function modificar_perfil(idperfil)
		{

			var descripcion = $("input[name=descripcion]").val();
			if(descripcion != "")
			{
				$.post("<?php echo site_url('Perfiles_c/update_perfil'); ?>",{descripcion:descripcion,idperfil:idperfil},respuesta_de_la_modificacion);

			}
			else
			{
				message_nothing();
				$(".sa-icon").css("width","180");
				$(".sa-icon").css("height","160");
				$(".confirm").css("display","none");
				$(".showSweetAlert").css("background","#F0F7C8");
				$(".showSweetAlert").delay("2000").fadeOut("normal");
				$(".sweet-overlay").hide();
			}
		}

		function respuesta_de_la_modificacion(response)
		{

			var resp = response.split("-");

			if(resp[0] == 1)
			{
				alerta_message("Se Modificó Correctamente","Mensaje","info");
				$("#tabla_perfil").empty();
				$("#tabla_perfil").append(resp[1]);
			}
			else
			{
				alerta_message("Error al modificar","Mensaje","error");
				$("#tabla_perfil").empty();
				$("#tabla_perfil").append(resp[1]);
			}
		}

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
                title: "No primero termine de realizar la operacion!",
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

		$('#tabla_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Buscar Perfil");
		// modify table search input
		$('#tabla_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		$('#tabla_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		$('#tabla_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	</script>
</body>

</html>

