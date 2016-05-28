
<script>
	$('#tablatiposocio').DataTable( {
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
		$.post("<?php echo base_url();?>Servicio_c/seleditar",{"id":id},
			function(data){
				var $modal = $('#tiposociomodal');
				$('#tiposociomodal').empty();
            	$('#tiposociomodal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var tiposocio = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Servicio_c/modificar",{"id_servicio":id,"servicio":tiposocio},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablatiposocio").DataTable();
			tabla1.destroy();
			$('#tipodesocio').empty();
            $('#tipodesocio').append(data);
            toastr.success("Servicio <b>" + tiposocio + " fue actualizado Correctamente</b>");
            $('#tablatiposocio').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Servicio?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Servicio_c/eliminar",{"id":codigo},
					function(data){
						var table1 = $('#tablatiposocio').DataTable();
						table1.destroy();
                       $('#tipodesocio').empty();
                       $('#tipodesocio').append(data);
                       $('#tablatiposocio').DataTable( {
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

			bootbox.prompt("Agregar Servicio", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Servicio_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablatiposocio').DataTable();
						table1.destroy();
                       $('#tipodesocio').empty();
                       $('#tipodesocio').append(data);
                       toastr.success("Tipo de Socio <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablatiposocio').DataTable( {
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