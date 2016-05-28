
<script>
	$('#tablatipovivienda').DataTable( {
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
		$.post("<?php echo base_url();?>Tipo_vivienda_c/seleditar",{"id_tipovivienda":id},
			function(data){
				var $modal = $('#tipo_vivienda_modal');
				$('#tipo_vivienda_modal').empty();
            	$('#tipo_vivienda_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var tipovivienda = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Tipo_vivienda_c/modificar",{"id_tipovivienda":id,"descripcion":tipovivienda},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablatipovivienda").DataTable();
			tabla1.destroy();
			$('#tipo_vivienda').empty();
            $('#tipo_vivienda').append(data);
            toastr.success("Tipo Vivienda <b>" + tipovivienda + " fue actualizado Correctamente</b>");
            $('#tablatipovivienda').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Tipo Vivienda?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Tipo_vivienda_c/eliminar",{"id_tipovivienda":codigo},
					function(data){
						var table1 = $('#tablatipovivienda').DataTable();
						table1.destroy();
                       $('#tipo_vivienda').empty();
                       $('#tipo_vivienda').append(data);
                       $('#tablatipovivienda').DataTable( {
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

			bootbox.prompt("Agregar Tipo Vivienda", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Tipo_vivienda_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablatipovivienda').DataTable();
						table1.destroy();
                       $('#tipo_vivienda').empty();
                       $('#tipo_vivienda').append(data);
                       toastr.success("Tipo Vivienda <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablatipovivienda').DataTable( {
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