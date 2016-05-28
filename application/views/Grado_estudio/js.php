
<script>
	$('#tablagradoestudio').DataTable( {
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
		$.post("<?php echo base_url();?>Grado_estudio_c/seleditar",{"id_gradoestudio":id},
			function(data){
				var $modal = $('#grado_estudio_modal');
				$('#grado_estudio_modal').empty();
            	$('#grado_estudio_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var gradoestudio = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Grado_estudio_c/modificar",{"id_gradoestudio":id,"descripcion":gradoestudio},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablagradoestudio").DataTable();
			tabla1.destroy();
			$('#grado_estudio').empty();
            $('#grado_estudio').append(data);
            toastr.success("Grado Estudio <b>" + gradoestudio + " fue actualizado Correctamente</b>");
            $('#tablagradoestudio').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Grado Estudio?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Grado_estudio_c/eliminar",{"id_gradoestudio":codigo},
					function(data){
						var table1 = $('#tablagradoestudio').DataTable();
						table1.destroy();
                       $('#grado_estudio').empty();
                       $('#grado_estudio').append(data);
                       $('#tablagradoestudio').DataTable( {
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

			bootbox.prompt("Agregar Grado Estudio", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Grado_estudio_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablagradoestudio').DataTable();
						table1.destroy();
                       $('#grado_estudio').empty();
                       $('#grado_estudio').append(data);
                       toastr.success("Grado Estudio <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablagradoestudio').DataTable( {
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