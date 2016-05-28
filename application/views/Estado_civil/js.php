
<script>
	$('#tablaestadocivil').DataTable( {
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
		$.post("<?php echo base_url();?>Estado_civil_c/seleditar",{"id_estadocivil":id},
			function(data){
				var $modal = $('#estado_civil_modal');
				$('#estado_civil_modal').empty();
            	$('#estado_civil_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var descripcion = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Estado_civil_c/modificar",{"id_estadocivil":id,"descripcion":descripcion},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablaestadocivil").DataTable();
			tabla1.destroy();
			$('#estado_civil').empty();
            $('#estado_civil').append(data);
            toastr.success("Estado Civil <b>" + descripcion + " fue actualizado Correctamente</b>");
            $('#tablaestadocivil').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Estado Civil?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Estado_civil_c/eliminar",{"id_estadocivil":codigo},
					function(data){
						var table1 = $('#tablaestadocivil').DataTable();
						table1.destroy();
                       $('#estado_civil').empty();
                       $('#estado_civil').append(data);
                       $('#tablaestadocivil').DataTable( {
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

				toastr.success('Se elimino Correctamente ');
			}
		});
	}

	function AgregarTipo(){
		modal();

			bootbox.prompt("Agregar Estado Civil", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Estado_civil_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablaestadocivil').DataTable();
						table1.destroy();
                       $('#estado_civil').empty();
                       $('#estado_civil').append(data);
                       toastr.success("Estado Civil <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablaestadocivil').DataTable( {
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