
<script>
	$('#tablanacionalidad').DataTable( {
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
		$.post("<?php echo base_url();?>Nacionalidad_c/seleditar",{"id_nacionalidad":id},
			function(data){
				var $modal = $('#nacionalidad_modal');
				$('#nacionalidad_modal').empty();
            	$('#nacionalidad_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var nacionalidad = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Nacionalidad_c/modificar",{"id_nacionalidad":id,"descripcion":nacionalidad},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablanacionalidad").DataTable();
			tabla1.destroy();
			$('#nacionalidad').empty();
            $('#nacionalidad').append(data);
            toastr.success("Nacionalidad <b>" + nacionalidad + " fue actualizado Correctamente</b>");
            $('#tablanacionalidad').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Nacionalidad?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Nacionalidad_c/eliminar",{"id_nacionalidad":codigo},
					function(data){
						var table1 = $('#tablanacionalidad').DataTable();
						table1.destroy();
                       $('#nacionalidad').empty();
                       $('#nacionalidad').append(data);
                       $('#tablanacionalidad').DataTable( {
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

			bootbox.prompt("Agregar Nacionalidad", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Nacionalidad_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablanacionalidad').DataTable();
						table1.destroy();
                       $('#nacionalidad').empty();
                       $('#nacionalidad').append(data);
                       toastr.success("Nacionalidad <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablanacionalidad').DataTable( {
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