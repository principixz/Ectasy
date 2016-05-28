
<script>
	$('#tablaformapago').DataTable( {
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
		$.post("<?php echo base_url();?>Forma_pago_c/seleditar",{"id_formapago":id},
			function(data){
				var $modal = $('#forma_pago_modal');
				$('#forma_pago_modal').empty();
            	$('#forma_pago_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var formapago = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Forma_pago_c/modificar",{"id_formapago":id,"descripcion":formapago},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablaformapago").DataTable();
			tabla1.destroy();
			$('#forma_pago').empty();
            $('#forma_pago').append(data);
            toastr.success("Forma Pago <b>" + formapago + " fue actualizado Correctamente</b>");
            $('#tablaformapago').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Forma Pago?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Forma_pago_c/eliminar",{"id_formapago":codigo},
					function(data){
						var table1 = $('#tablaformapago').DataTable();
						table1.destroy();
                       $('#forma_pago').empty();
                       $('#forma_pago').append(data);
                       $('#tablaformapago').DataTable( {
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

			bootbox.prompt("Agregar Forma pago", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Forma_pago_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablaformapago').DataTable();
						table1.destroy();
                       $('#forma_pago').empty();
                       $('#forma_pago').append(data);
                       toastr.success("Forma pago <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablaformapago').DataTable( {
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