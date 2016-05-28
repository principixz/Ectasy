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

	<style>
		.check{
			width: 245px;
			float: left;
		}
		.clear{
			clear: both;
		}
	</style>
</head>
<body>
	<?php include('includes/menu.inc');?>



				<div class="container">
					<div class="toolbar row">
						<div class="col-sm-6 hidden-xs">
							<div class="page-header">
								<h1>Permisos <small>Se Asignaran los Permisos al Personal Correspondiente</small></h1>

							</div>
						</div>

					</div>
					<br>

					<?php /*echo "<pre>"; print_r($permisos); exit;*/ ?>
					<div class="panel panel-white">

						<div class="row" >
							<div class="col-md-12" style="float:none; margin: 0 auto !important;">
								<div style="width:285px; padding-left:90px;" class="col-md-3">
									<h3>Busque el Perfil</h3>
								</div>
								<br>
								<div class="col-md-6" style="padding:0 10px 0 0;">
									<select name="perfil" id="perfil" class="combobox form-control" onchange="traer_permisos(this.value)">
										<option value=""></option>
										<?php foreach ($perfiles as $value) { ?>
										<option value="<?php echo $value->id_perfil_usuario ?>"><?php echo $value->descripcion;; ?></option>
										<?php } ?>
									</select>

								</div>
								<div class="col-md-2">
									<button type="button" class="btn btn-azure" onclick="enviar_permisos()" >GUARDAR</button>
								</div>
							</div>
						</div>
						<div class="panel-body" style="box-sizing: border-box; padding: 15px 15px 15px 60px!important; min-height:528px;">
							<div id="permisos">
								<?php $i=0; $encontrados = array(); ?>
								<?php foreach ($permisos2 as $value) { ?>

									<?php if(!in_array($value->padre, $encontrados)){ ?>
										<?php if($i > 0){ ?>
										</div>
										<?php if($i%4==0){ ?>
										<div class="clear"></div>
										<?php } } ?>
									<?php $encontrados[] = $value->padre; $i++; ?>
									<div class="check">
										<h3 class="space15"> <?php echo $value->padre; ?></h3>
										<?php } ?>

										<div class="checkbox">
											<label>
												<input id="modulo" type="checkbox" name="modulos[]" value="<?php echo $value->hijo; ?>" class="grey">
												<?php echo $value->hijo; ?>
											</label>
										</div>

								<?php } ?>
							</div>

						</div>
					</div>

				</div>


	<?php include('includes/pie.inc');?>
	<div id="js">
		<?php include('includes/js_principal.inc');?>


	</div>

	<script>
		$(document).ready(function(){

		});

		function traer_permisos(idperfil)
		{

			if(idperfil != "")
			{
				$("#permisos").empty();


				$("#permisos").load("<?php echo site_url('Permisos_c/devolver_permisos'); ?>"+"/"+idperfil);
			}

		}

		function enviar_permisos()
		{
			var idperfil = $("#perfil").val();

			if(idperfil=="")
			{
				message_nothing();
				$(".sa-icon").css("width","180");
				$(".sa-icon").css("height","160");
				$(".confirm").css("display","none");
				$(".showSweetAlert").css("background","#F0F7C8");
				$(".showSweetAlert").delay("2000").fadeOut("normal");
				$(".sweet-overlay").hide();

			}
			else
			{

				var modulos = new Array();
      			 // $('input[name="marcados[]"]:checked') es otra manera de saber si un checkbox esta seleecionado
			      $("#modulo:checked").each(function() {
			        //$(this).val() es el valor del checkbox correspondiente
			         modulos.push($(this).val());
			      });

				$.post("<?php echo site_url('Permisos_c/insertar') ?>",{modulos:modulos,idperfil:idperfil},respuesta_insercion);
			}
		}

		function respuesta_insercion(data)
		{

			if(data == 1)
			{
				message_like();
				$(".sa-icon").css("width","120");
				$(".sa-icon").css("height","100");
				$(".confirm").css("display","none");
				$(".showSweetAlert").css("background","#F0F7C8");
				$(".showSweetAlert").delay("1200").fadeOut("normal");
				$(".sweet-overlay").hide();

			}
			else
			{
				message_dislike();
				$(".sa-icon").css("width","180");
				$(".sa-icon").css("height","100");
				$(".confirm").css("display","none");
				$(".showSweetAlert").css("background","#F0F7C8");
				$(".showSweetAlert").delay("1200").fadeOut("normal");
				$(".sweet-overlay").hide();

			}
			setTimeout ('recargar()', 500); // despues de 500 milisegundos se ejecutara la funcion recargar()

		}

		function recargar()
		{
			location.reload(true);
		}

		function message_like()
		{
          swal({
                title: "Se Guardo Correctamente!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/like.png';?>"
            });
        }

        function message_dislike()
		{
          swal({
                title: "Error al guardar!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dislike.png';?>"
            });
        }

        function message_nothing()
		{
          swal({
                title: "No ha seleccionado un perfil; Por favor hágalo!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dedo.png';?>"
            });
        }

	</script>

</body>

</html>

