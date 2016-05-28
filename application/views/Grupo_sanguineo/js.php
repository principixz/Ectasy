
<script>
	$('#tablagruposanguineo').DataTable( {
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
		$.post("<?php echo base_url();?>Grupo_sanguineo_c/seleditar",{"id_gruposanguineo":id},
			function(data){
				var $modal = $('#grupo_sanguineo_modal');
				$('#grupo_sanguineo_modal').empty();
            	$('#grupo_sanguineo_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var gruposanguineo = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Grupo_sanguineo_c/modificar",{"id_gruposanguineo":id,"descripcion":gruposanguineo},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablagruposanguineo").DataTable();
			tabla1.destroy();
			$('#grupo_sanguineo').empty();
            $('#grupo_sanguineo').append(data);
            toastr.success("Grupo Sanguineo <b>" + gruposanguineo + " fue actualizado Correctamente</b>");
            $('#tablagruposanguineo').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Grupo Sanguineo?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Grupo_sanguineo_c/eliminar",{"id_gruposanguineo":codigo},
					function(data){
						var table1 = $('#tablagruposanguineo').DataTable();
						table1.destroy();
                       $('#grupo_sanguineo').empty();
                       $('#grupo_sanguineo').append(data);
                       $('#tablagruposanguineo').DataTable( {
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

			bootbox.prompt("Agregar Grupo Sanguineo", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Grupo_sanguineo_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablagruposanguineo').DataTable();
						table1.destroy();
                       $('#grupo_sanguineo').empty();
                       $('#grupo_sanguineo').append(data);
                       toastr.success("Grupo Sanguineo <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablagruposanguineo').DataTable( {
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