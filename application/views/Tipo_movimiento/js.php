
<script>
	$('#tablatipomovimiento').DataTable( {
                                        language: {
                                            search: "Buscar ... ",
                                            sLengthMenu:"",
                                            sZeroRecords: "No se encontraron resultados",
                                            sInfo:"",
                                            sInfoEmpty:"",
                                            sInfoFiltered:"",
                                            oPaginate: {
                                                "sNext":"Siguiente",
                                                "sPrevious":"Anterior"
                                            }
                                        }
                  });
function Modificar(id){
		$.post("<?php echo base_url();?>Tipo_movimiento_c/seleditar",{"id_tipomovimiento":id},
			function(data){
				var $modal = $('#tipo_movimiento_modal');
				$('#tipo_movimiento_modal').empty();
            	$('#tipo_movimiento_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var tipomovimiento = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Tipo_movimiento_c/modificar",{"id_tipomovimiento":id,"descripcion":tipomovimiento},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablatipomovimiento").DataTable();
			tabla1.destroy();
			$('#tipo_movimiento').empty();
            $('#tipo_movimiento').append(data);
            toastr.success("Tipo Movimiento <b>" + tiposocio + " fue actualizado Correctamente</b>");
            $('#tablatipomovimiento').DataTable( {
							language: {
							search: "Buscar ... ",
							sLengthMenu:"",
							sZeroRecords: "No se encontraron resultados",
							sInfo:"",
							sInfoEmpty:"",
							sInfoFiltered:"",
								oPaginate: {
								"sNext":"Siguiente",
								"sPrevious":"Anterior"
								}
							}
            });
        	}
        }

		);
}

	function Eliminar(codigo){
		modal();
		bootbox.confirm("Está seguro que desea eliminar este Tipo Movimiento?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Tipo_movimiento_c/eliminar",{"id_tipomovimiento":codigo},
					function(data){
						var table1 = $('#tablatipomovimiento').DataTable();
						table1.destroy();
                       $('#tipo_movimiento').empty();
                       $('#tipo_movimiento').append(data);
                       $('#tablatipomovimiento').DataTable( {
							language: {
							search: "Buscar ... ",
							sLengthMenu:"",
							sZeroRecords: "No se encontraron resultados",
							sInfo:"",
							sInfoEmpty:"",
							sInfoFiltered:"",
								oPaginate: {
								"sNext":"Siguiente",
								"sPrevious":"Anterior"
								}
							}
                        });
					}
				);

				toastr.warning('Se elimino Correctamente ');
			}
		});
	}

	function AgregarTipo(){
		modal();

			bootbox.prompt("Agregar Tipo Movimiento", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Tipo_movimiento_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablatipomovimiento').DataTable();
						table1.destroy();
                       $('#tipo_movimiento').empty();
                       $('#tipo_movimiento').append(data);
                       toastr.success("Tipo Movimiento <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablatipomovimiento').DataTable( {
							language: {
							search: "Buscar ... ",
							sLengthMenu:"",
							sZeroRecords: "No se encontraron resultados",
							sInfo:"",
							sInfoEmpty:"",
							sInfoFiltered:"",
								oPaginate: {
								"sNext":"Siguiente",
								"sPrevious":"Anterior"
								}
							}
                        });


					}
				);
				}
			});

	}
</script>