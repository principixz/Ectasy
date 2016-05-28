
<script>
	$('#tablasexo').DataTable( {
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
		$.post("<?php echo base_url();?>Sexo_c/seleditar",{"id_sexo":id},
			function(data){
				var $modal = $('#sexos_modal');
				$('#sexos_modal').empty();
            	$('#sexos_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var sexo = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Sexo_c/modificar",{"id_sexo":id,"descripcion":sexo},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablasexo").DataTable();
			tabla1.destroy();
			$('#sexo').empty();
            $('#sexo').append(data);
            toastr.success("Sexo <b>" + sexo + " fue actualizado Correctamente</b>");
            $('#tablasexo').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Sexo?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Sexo_c/eliminar",{"id_sexo":codigo},
					function(data){
						var table1 = $('#tablasexo').DataTable();
						table1.destroy();
                       $('#sexo').empty();
                       $('#sexo').append(data);
                       $('#tablasexo').DataTable( {
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

			bootbox.prompt("Agregar Sexo", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Sexo_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablasexo').DataTable();
						table1.destroy();
                       $('#sexo').empty();
                       $('#sexo').append(data);
                       toastr.success("Sexo <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablasexo').DataTable( {
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