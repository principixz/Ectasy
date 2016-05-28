
<script>
	$('#tablatipodocumento').DataTable( {
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
		$.post("<?php echo base_url();?>Tipo_documento_c/seleditar",{"id_tipodocumento":id},
			function(data){
				var $modal = $('#tipo_documento_modal');
				$('#tipo_documento_modal').empty();
            	$('#tipo_documento_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var tipodocumento = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Tipo_documento_c/modificar",{"id_tipodocumento":id,"descripcion":tipodocumento},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablatipodocumento").DataTable();
			tabla1.destroy();
			$('#tipo_documento').empty();
            $('#tipo_documento').append(data);
            toastr.success("Tipo Documento <b>" + tipodocumento + " fue actualizado Correctamente</b>");
            $('#tablatipodocumento').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Tipo Documento?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Tipo_documento_c/eliminar",{"id_tipodocumento":codigo},
					function(data){
						var table1 = $('#tablatipodocumento').DataTable();
						table1.destroy();
                       $('#tipo_documento').empty();
                       $('#tipo_documento').append(data);
                       $('#tablatipodocumento').DataTable( {
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

			bootbox.prompt("Agregar Tipo Documento", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Tipo_documento_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablatipodocumento').DataTable();
						table1.destroy();
                       $('#tipo_documento').empty();
                       $('#tipo_documento').append(data);
                       toastr.success("Tipo documento <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablatipodocumento').DataTable( {
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