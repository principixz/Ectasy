<script>
	$("#comprobante").focus();
	$("#comprobante").change(function(){
		$.post('Ventas_c/correlativo','id_tipo_documento='+$("#comprobante").val(),function(datos){
			$("#nro_documento").val(datos);
		});	});
	$("#modalidadtrans").change(function(){

		if($(this).val()==2){
			$("#cuotascre").show();
			$("#intervacredi").show();

		}else{
			$("#cuotascre").hide();
			$("#intervacredi").hide();
			//limpiar_tipo_pago();
		}
	});

	$("#AbrirVtnBuscarMembresia").click(function() {
		Paquetes();
	});

	$("#tipoventa").change(function(){
		if($(this).val()==2){
			$("#membresias").hide();
			$("#productosventas").show();
			limpiar_membresia();

		}else if($(this).val()==1){
			$("#productosventas").hide();
			$("#membresias").show();
			limpiar_producto();
		}else{
			$("#membresias").hide();
			$("#productosventas").hide();
			limpiar();
		}

	});
	function Buscar(){
		$.post("<?php echo site_url('Clientes_c/clientes');?>" , function(data){
			var tabla1= $("#tablabuscar_cliente").DataTable();
			tabla1.destroy();
			$('#bodycliente').empty();
			$('#bodycliente').append(data);			
			$('#clientes').modal('show'); 
			$('#tablabuscar_cliente').DataTable({
				'sPaginationType': 'full_numbers',
				'oLanguage':{
					'sProcessing':     'Cargando...',
					'sLengthMenu':     'Mostrar _MENU_ registros',
					'sZeroRecords':    'No se encontraron resultados',
					'sEmptyTable':     'Ningún dato disponible en esta tabla',
					'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
					'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
					'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
					'sInfoPostFix':    '',
					'sSearch':         'Buscar:',
					'sUrl':            '',
					'sInfoThousands':  '',
					'sLoadingRecords': 'Cargando...',
					'oPaginate': {
						'sFirst':    'Primero',
						'sLast':     'Último',
						'sNext':     'Siguiente',
						'sPrevious': 'Anterior'
					},
					'oAria': {
						'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
						'sSortDescending': ': Activar para ordenar la columna de manera descendente'
					}
				},
                    'aaSorting': [[ 0, 'asc' ]],//ordenar
                    'iDisplayLength': 10,
                    'aLengthMenu': [[5, 10, 20, -1], [5, 10, 20, 'All']]
                    
                    
                });
});		
};

function Paquetes(){
	$.blockUI({
		message : '<i class="fa fa-spinner fa-spin"></i>Consultando los Paquetes',
		responseTime : 1000,
	});
	$.ajax({
		url : "<?php echo site_url('Ventas_c/paquetes'); ?>",
		type : 'POST',
		dataType : 'json',
		success : function(json,datos) {
			var HTML = '<table class="table table-striped table-hover" id="table2">' + 	
			'<thead>' +
			'<tr>' +
			'<th>Codigo</th>'+
			'<th>Descripcion</th>'+
			'<th>Vigencia</th>'+
			'<th>Costo</th>'+
			'<th>Acciones</th>'+
			'</tr>' +
			'</thead>' +
			'<tbody>';			
			for (var i = 0; i < json.length; i++) {
				HTML = HTML + '<tr>';
				HTML = HTML + '<td>'+json[i].id_paquete+'</td>';
				HTML = HTML + '<td>'+json[i].descripcion+'</td>';
				HTML = HTML + '<td>'+json[i].vigencia+'</td>';
				HTML = HTML + '<td>'+json[i].precio+'</td>';
				var descripcion = json[i].descripcion;
				var precio_m = json[i].precio;
				var id_paquetes = json[i].id_paquete;
				HTML = HTML + '<td><a style="margin-right:4px" href="javascript:void(0)" onclick="selec_paquete(\'' + id_paquetes + '\',\'' + descripcion + '\',\'' + precio_m + '\')" class="btn btn-success"><i class="fa fa-check-square-o"></i> </a>';
				HTML = HTML + '</td>';
				HTML = HTML + '</tr>';
			}
			HTML = HTML + '</tbody></table>'	;
			$('div.paquetesmodal').html(HTML);
			tablabuscar();
			$("#modalMembresia").modal('show');

			$.unblockUI({});
		},
		error : function(xhr, status) {
			$.unblockUI({});
			swal({
				title: "Disculpe ocurrio un problema!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dislike.png';?>"
            });
		},  
	});
		//$("#modalMembresia").modal('show');
	}

	function tablabuscar(){
		$(document).ready(function() {
			$('#table2').dataTable({
				'sPaginationType': 'full_numbers',
				'oLanguage':{
					'sProcessing':     'Cargando...',
					'sLengthMenu':     'Mostrar _MENU_ registros',
					'sZeroRecords':    'No se encontraron resultados',
					'sEmptyTable':     'Ningún dato disponible en esta tabla',
					'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
					'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
					'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
					'sInfoPostFix':    '',
					'sSearch':         'Buscar:',
					'sUrl':            '',
					'sInfoThousands':  '',
					'sLoadingRecords': 'Cargando...',
					'oPaginate': {
						'sFirst':    'Primero',
						'sLast':     'Último',
						'sNext':     'Siguiente',
						'sPrevious': 'Anterior'
					},
					'oAria': {
						'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
						'sSortDescending': ': Activar para ordenar la columna de manera descendente'
					}
				},
                    'aaSorting': [[ 0, 'asc' ]],//ordenar
                    'iDisplayLength': 10,
                    'aLengthMenu': [[5, 10, 20, -1], [5, 10, 20, 'All']]
                    
                    
                });

}); 

}

function selec_paquete(id_paquetes,descripcion,costo){
	$("#fechainiciop").attr('disabled',false);
	$("#idpaquete").val(id_paquetes);
	$("#nompaquete").val(descripcion);
	$("#preciopa").val(costo);
	$('#modalMembresia').modal('hide');
}

function Cliente(dni,nombre){
	$('#nombre').val(nombre).focus();
	$('#dni').val(dni);
	$('#clientes').modal('hide');
}

$("#AgregarDetalle").click(function(){
	var html = '<tr class="row_tmp">';
	html += '<td>';
	html += '   <input type="hidden" name="id_tipo[]" value="m" />Membresia' ;
	html += '</td>';
	html += '<td>';
	html += '   <input type="hidden" name="id_vendido[]" class="id_mat" value="' + $("#idpaquete").val() + '" />' + $("#nompaquete").val();
	html += '</td>';
	html += '<td>';
	html += '   <input type="hidden" name="id_campo2[]"  value="' + $("#idpaquete").val() + '" />' + $("#clientes").val();
	html += '</td>';
	html += '<td>';
	html += '   <input type="hidden" name="numero[]" value="' + $("#fechaventa").val() + '" />' + $("#fechaventa").val();
	html += '</td>';
	html += '<td>';
	html += '   <input type="hidden" name="precio[]" value="' + $("#preciopa").val() + '" />' + $("#preciopa").val();
	html += '</td>';
	html += '<td>';
	html += '   <input type="hidden" name="importe[]" class="importe" value="' + $("#preciopa").val() + '" />' + $("#preciopa").val();
	html += '</td>';
	html += '<td>';
	html += '   <a  class="btn btn-danger delete"><i class="icon-trash icon-white"></i></a>';
	html += '</td>';
	html += '</tr>';

	$("#tblDetalle").append(html);
});

</script>