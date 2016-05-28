
<script>
	$('#tablaconceptotriaje').DataTable( {
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
		$.post("<?php echo base_url();?>Concepto_triaje_c/seleditar",{"id_conceptotriaje":id},
			function(data){
				var $modal = $('#concepto_triaje_modal');
				$('#concepto_triaje_modal').empty();
            	$('#concepto_triaje_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var descripcion = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Concepto_triaje_c/modificar",{"id_conceptotriaje":id,"descripcion":descripcion},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablaconceptotriaje").DataTable();
			tabla1.destroy();
			$('#concepto_triaje').empty();
            $('#concepto_triaje').append(data);
            toastr.success("Concepto Triaje <b>" + descripcion + " fue actualizado Correctamente</b>");
            $('#tablaconceptotriaje').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Concepto Triaje?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Concepto_triaje_c/eliminar",{"id_conceptotriaje":codigo},
					function(data){
						var table1 = $('#tablaconceptotriaje').DataTable();
						table1.destroy();
                       $('#concepto_triaje').empty();
                       $('#concepto_triaje').append(data);
                       $('#tablaconceptotriaje').DataTable( {
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

			bootbox.prompt("Agregar Concepto Triaje", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Concepto_triaje_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablaconceptotriaje').DataTable();
						table1.destroy();
                       $('#concepto_triaje').empty();
                       $('#concepto_triaje').append(data);
                       toastr.success("Tipo de Socio <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablaconceptotriaje').DataTable( {
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