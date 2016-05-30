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
			$("#adelantocre").show();

		}else{
			$("#cuotascre").hide();
			$("#intervacredi").hide();
			$("#adelantocre").hide();
			//limpiar_tipo_pago();
		}
	});
	$("#chbx_igv").click(function(){
        if($("#chbx_igv").is(':checked')){
            $.post('ventas_c/parm','id_param=IGV',function(datos){
                $("#igv").val(datos);
                setTotal(0, 1);
            },'json');
        }else{
            $("#igv").val('0.00');
        }
        setTotal(0, 1);
        
    });
    $("input:text[readonly=readonly]").css('cursor','pointer');

	$("#adelanto").change(function(){
		adelanto = $("#adelanto").val();
		adelanto = parseFloat(adelanto).toFixed(2);
		if(parseFloat($("#adelanto").val()) > parseFloat($("#total").val())){
			$("#adelanto").val($("#total").val());
		}else{
			parseFloat($("#adelanto").val(adelanto));
		}
	});

	$("#AbrirVtnBuscarMembresia").click(function() {
		Paquetes();
	});
	$("#cantidad").click(function() {
		if(parseInt($("#cantidad").val()) > parseInt($("#stockactual").val()) ){
			$("#cantidad").val($("#stockactual").val());
			return false;
		}
		else if($("#cantidad").val() < 1){
			$("#cantidad").val(1);
			return false;
		}else{
			setImporte();
		}
		
	});
	$("#VtnCuotas").click(function() {
		CrearCronograma();
	});
	$("#AbrirVtnBuscarProducto").click(function() {
		Productos();
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
function crearCuotas(){
	var HTML = '<table id="table" class="table table-bordered"  width="100%">' +
	'<thead>' +
	'<tr>' +
	'<th>Nro</th>' +
	'<th>Fecha Vencimiento</th>' +
	'<th>Monto</th>'
	'</tr>' +
	'</thead>' +
	'<tbody>';

	var letras = $("#cuotas").val();
	var c=letras;   

	if($("#estado_cronograma").val()==0){

		var monto = $("#total").val() - $("#adelanto").val();
		var intervalo_dias = $("#intervalo").val();


		var nueva_fecha = new Date();
		month = nueva_fecha.getMonth()+1;
		day = nueva_fecha.getDate();
		year = nueva_fecha.getFullYear();

		month = (month < 10) ? ("0" + month) : month;
		day = (day < 10) ? ("0" + day) : day;   
		var fecha_actual=  year + '-' + month + '-' +day  ;

		var fecha_temp = new Date();
		var monto_pagado = 0;
		var cuota = [];
		var pago_mensual = parseInt(monto / c);

		for(var i=1;i<=c;i++){
			cuota[i]=pago_mensual;
			monto_pagado = monto_pagado + pago_mensual;  
		}
		if(monto_pagado !== monto){
			cuota[c]=(cuota[c] + (monto- monto_pagado)).toFixed(2);
		}

		fecha_temp.setDate (fecha_temp.getDate() + parseInt(intervalo_dias));
		var month ;
		var day ;
		var year;

		for (var i = 1; i<=c; i++) {

			month = fecha_temp.getMonth()+1;
			day = fecha_temp.getDate();
			year = fecha_temp.getFullYear();

			month = (month < 10) ? ("0" + month) : month;
			day = (day < 10) ? ("0" + day) : day;            

			var valor= parseFloat(cuota[i]).toFixed(2)

			HTML = HTML + '<tr>';
			HTML = HTML + '<td>' + i + '</td>';
			HTML = HTML + '<td>';
			HTML = HTML + '   <input type="date" name="fecha_cuota[]" id="fecha_cuota'+i+'" readonly class="fecha_cuota" value="'+year + '-' + month + '-' +day+'"  min="'+fecha_actual+'"  max="3500-12-31" />';
			HTML = HTML + '</td>';
			HTML = HTML + '<td>';
			HTML = HTML + '   <input type="text" value="'+valor+'" maxlength="10" readonly  name="monto_cuota[]" id="monto_cuota'+i+'" class="monto_cuotas" onkeypress="return dosDecimales(event,this)" onblur="montoCuota('+i+')" />';
			HTML = HTML + '</td>';
			HTML = HTML + '</tr>';

			fecha_temp.setDate (fecha_temp.getDate() + parseInt(intervalo_dias));

		}
		HTML = HTML + '</tbody></table>';
		HTML = HTML+'<div class="form-group col-md-6 style="float:left;" >'+
		'<label class="control-label col-md-4">Restante:</label>'+
		'<div class="col-md-7">'+    
		'<input id="restante_cuota" name="restante_cuota" readonly class="form-control" value="'+parseFloat(monto).toFixed(2)+'" >'+
		'</div>'+
		'</div>' ;
		HTML = HTML+'<div class="form-group col-md-6 " style="float:left;" >'+
		'<label class="control-label col-md-3">Total:</label>'+
		'<div class="col-md-8">'+    
		'<input id="total_en_cuotas" name="total_en_cuotas" readonly class="form-control" value="'+$("#total").val()+'" >'+
		'</div>'+
		'</div>'+
		'<br>'
		;

		$('div.cronograma').html(HTML);



	}
}
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
			$('#table2').DataTable().destroy();
			$("#table2").dataTable().fnDestroy();

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

	function Productos(){
		if($("#idalmacen").val() == ''){
			alert("INgrese el almacen");
			return false;
		}else{
			idalmacen = $("#idalmacen").val();
			$.blockUI({
				message : '<i class="fa fa-spinner fa-spin"></i>Consultando los Productos',
				responseTime : 1000,
			});
			$.ajax({
				url : "<?php echo site_url('Ventas_c/productos'); ?>",
				data : {idalmacen : idalmacen},
				type : 'POST',
				dataType : 'json',
				success : function(json,datos) {
					var HTML = '<table class="table table-striped table-hover" id="table3">' +
					'<thead>' +
					'<tr>' +
					'<th>Item</th>'+
					'<th>Producto</th>'+
					'<th>Presentacion</th>'+
					'<th>Categoria</th>'+
					'<th>Marca</th>'+
					'<th>Stock</th>'+
					'<th>Precio</th>'+
					'<th>Acciones</th>'+
					'</tr>' +
					'</thead>' +
					'<tbody>';

					for (var i = 0; i < json.length; i++) {
						HTML = HTML + '<tr>';
						HTML = HTML + '<td>'+(i+1)+'</td>';
						HTML = HTML + '<td>'+json[i].nombre+'</td>';
						HTML = HTML + '<td>'+json[i].presentacion+'</td>';
						HTML = HTML + '<td>'+json[i].categoria+'</td>';
						HTML = HTML + '<td>'+json[i].marca+'</td>';
						HTML = HTML + '<td>'+json[i].stock+'</td>';
						HTML = HTML + '<td>'+json[i].precio+'</td>';
						var id_producto = json[i].id_producto;
						var id_almacen =$("#idalmacen").val();
						var nombre = json[i].nombre;
						var almacen = $( "#idalmacen option:selected" ).text();
						var stock = json[i].stock;
						var precioc = json[i].precio;
						HTML = HTML + '<td><a style="margin-right:4px" href="javascript:void(0)" onclick="sel_producto(\'' + id_producto + '\',\'' + id_almacen + '\',\'' + almacen + '\',\'' + nombre + '\',\'' + stock + '\',\'' + precioc + '\')" class="btn btn-success"><i class="icon-ok icon-white"></i> </a>';
						HTML = HTML + '</td>';
						HTML = HTML + '</tr>';
					}
					HTML = HTML + '</tbody></table>'	;
					$('div.productosmodal').html(HTML);
					tablabuscar1();
					$("#modalProductos").modal('show');

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

}

}

function CrearCronograma(){
	if($("#modalidadtrans").val()=='2' && $("#nompaquete").val() !='' && $("#nombre").val() != '' && $("#subtotal")!=''){
		bval = true;
		bval = bval && $("#cuotas").attr("required","true");
		bval = bval && $("#intervalo").attr("required","true");
		if ($("#cuotas").val() != '' && $("#intervalo").val() != '') {
			if($("#cuotas").val()<=0 || $("#intervalo").val()<=0){
				bootbox.alert("Por favor ingrese datos correcto, en los campos de credito!", function() {
				});
				return false;
			}
			var total=$("#total").val();
			if(parseInt($("#cuotas").val())>= parseInt(total)){
				bootbox.alert("Numero de cuotas invalido, por ser Mayor al total ");
				$("#cuotas").focus();
				return false;
			}
			crearCuotas();
			$("#modalCuotas").modal('show');
			$("#VtnCuotas").show();
		}
		return false;
	}else{
		bootbox.alert("Seleccione cliente y el producto!", function() {
		});
	}
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

function tablabuscar1(){
	$(document).ready(function() {
		$('#table3').dataTable({
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
function sel_producto(id_p,id_a,a, p, s, pc) {
	$("#cantidad,#preciopro").attr('disabled', false);
	$("#id_almacense").val(id_a);
	$("#almacense").val(a);
	$("#idproducto").val(id_p);
	$("#nombreproducto").val(p);
	$("#stockactual").val(s);
	$("#preciopro").val(parseFloat(pc).toFixed(2));
	$('#modalProductos').modal('hide');
	$("#cantidad").val('1').focus();
	var HTMLL;
	for(var i=1; i<=parseInt($("#stockactual").val());i++){
		HTMLL = HTMLL + '<option value="'+i+'">'+i+'</option>';
	}
	$('#cantidad').empty(); 
	$('#cantidad').append(HTMLL);            
	setImporte();

}

function setImporte(){
	var cantidad = $("#cantidad").val();
	cantidad = parseInt(cantidad);
	if (cantidad == '') {
		cantidad = 0;
	}
	var precio = $("#preciopro").val();
	precio = parseFloat(precio);
	if (precio == '') {
		precio = 0;
	}
	var importe;
	importe = cantidad * precio;
	$("#importe").val(parseFloat(importe).toFixed(2));

}

function Cliente(dni,nombre){
	$('#nombre').val(nombre).focus();
	$('#dni').val(dni);
	$('#clientes').modal('hide');
}

function limpiar_producto(){
$("#id_producto,#producto,#id_almacen,#stockactual,#nombreproducto,#cantidad").val('');
$("#preciopro,#importe").val('0.00');
$("#cantidad,#preciopro,#importe").attr('disabled',true);
}

function setTotal(importe,aumenta){
    var subtotal = $("#subtotal").val();
    subtotal = parseFloat(subtotal);
    if (subtotal <=0) {
        subtotal = 0;
    }
    var igv = $("#igv").val();
    igv = parseFloat(igv);
    if (igv<=0) {
        igv = 0;
    }
    if(aumenta){
        subtotal = subtotal + parseFloat(importe);
    }else{
        subtotal = subtotal - parseFloat(importe);
    }
    $("#subtotal").val(subtotal.toFixed(2));
    var total = subtotal + subtotal * igv;
    $("#total").val(total.toFixed(2));
}
function subTotal(importe,aumenta){
	var subtotal = parseInt($("#subtotal").val());
	if (subtotal <= 0) {
		subtotal = 0;
	}
	var igv = $("#igv").val();
	if (parseInt(igv) <=0) {
		igv = 0;
	}
	if(aumenta){
		subtotal = subtotal + parseFloat(importe);
	}else{
		subtotal = subtotal - parseFloat(importe);
	}
	$("#subtotal").val(parseFloat(subtotal).toFixed(2));
	var total = subtotal + subtotal * igv;
	$("#total").val(parseFloat(total).toFixed(2));
}

$("#AgregarDetalleProducto").click(function(){
	if ($("#nombreproducto").val() != '' ) {
		var num = $(".idproducto").length;
		if(($(".id_prod[value=" + $("#idproducto").val() + "]").length) >0){
			alert("YA SE REGISTRO");
			return false;
		}
		var tr = 'tr';
		var html = '<tr class="row_tmp">';
		html += '<td>';
		html += '   <input type="hidden" name="id_tipo[]" value="p" />Producto' ;
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="id_vendido[]" class="id_prod" value="' + $("#idproducto").val() + '" />' + $("#nombreproducto").val();
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="id_campo2[]" class="id_alm" value="' + $("#id_almacense").val() + '" />' + $("#almacense").val();
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="numero[]" value="' + $("#fechaventa").val() + '" />' + $("#fechaventa").val();
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="numero[]" value="' + $("#cantidad").val() + '" />' + $("#cantidad").val();
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="precio[]" value="' + $("#preciopro").val() + '" />' + $("#preciopro").val();
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="importe[]" class="importe" value="' + $("#importe").val() + '" />' + $("#importe").val();
		html += '</td>';
		html += '<td>';
		html += '   <a class="btn btn-danger delete" onclick="$(this).closest('+"'tr'"+').remove();setTotal('+$("#importe").val()+')"><i class="icon-trash icon-white"></i></a>';
		html += '</td>';
		html += '</tr>';
		setTotal($("#importe").val(), 1);
		$("#tblDetalle").append(html);
		limpiar_producto();

	}else{
		alert("los datos están vacios llenelos");
	}
});

$("#AgregarDetalle").click(function(){

	if ($("#nompaquete").val() != '' && $("#fechainiciop").val() != '' && $("#preciopa").val() != '' && $("#nombre").val()) {
		var num = $(".id_paquete").length;
		if(($(".id_paquete[value=" + $("#idpaquete").val() + "]").length) >0){
			alert("YA SE REGISTRO");
			return false;
		}
		if(num >=1){
			alert("Solo se permite una membresia");
			return false;
		}
		var html = '<tr class="row_tmp">';
		html += '<td>';
		html += '   <input type="hidden" name="id_tipo[]" value="m" />Membresia' ;
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="id_vendido[]" class="id_paquete" value="' + $("#idpaquete").val() + '" />' + $("#nompaquete").val();
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="id_campo2[]"  value="' + $("#dni").val() + '" />';
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="numero[]" value="' + $("#fechaventa").val() + '" />' + $("#fechaventa").val();
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="cantidad[]" value="1" />1' ;
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="precio[]" value="' + $("#preciopa").val() + '" />' + $("#preciopa").val();
		html += '</td>';
		html += '<td>';
		html += '   <input type="hidden" name="importe[]" class="importe" value="' + $("#preciopa").val() + '" />' + $("#preciopa").val();
		html += '</td>';
		html += '<td>';
		html += '   <a  class="btn btn-danger delete" onclick="$(this).closest('+"'tr'"+').remove();setTotal('+$("#preciopa").val()+')"><i class="icon-trash icon-white"></i></a>';
		html += '</td>';
		html += '</tr>';

		$("#tblDetalle").append(html);
		setTotal($("#preciopa").val(), 1);
	}else{
		alert("los datos están vacios llenelos");
	}
});

</script>