
<script>
	$('#tablatipoempleado').DataTable( {
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
		$.post("<?php echo base_url();?>Tipo_empleado_c/seleditar",{"id_tipoempleado":id},
			function(data){
				var $modal = $('#tipo_empleado_modal');
				$('#tipo_empleado_modal').empty();
            	$('#tipo_empleado_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var tipoempleado = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Tipo_empleado_c/modificar",{"id_tipoempleado":id,"descripcion":tipoempleado},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablatipoempleado").DataTable();
			tabla1.destroy();
			$('#tipo_empleado').empty();
            $('#tipo_empleado').append(data);
            toastr.success("Tipo Empleado <b>" + tipoempleado + " fue actualizado Correctamente</b>");
            $('#tablatipoempleado').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Tipo Empleado?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Tipo_empleado_c/eliminar",{"id_tipoempleado":codigo},
					function(data){
						var table1 = $('#tablatipoempleado').DataTable();
						table1.destroy();
                       $('#tipo_empleado').empty();
                       $('#tipo_empleado').append(data);
                       $('#tablatipoempleado').DataTable( {
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

			bootbox.prompt("Agregar Tipo Empleado", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Tipo_empleado_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablatipoempleado').DataTable();
						table1.destroy();
                       $('#tipo_empleado').empty();
                       $('#tipo_empleado').append(data);
                       toastr.success("Tipo empleado <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablatipoempleado').DataTable( {
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