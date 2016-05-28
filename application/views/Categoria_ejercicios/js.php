
<script>
	$('#tablacategoriaejercicios').DataTable( {
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
		$.post("<?php echo base_url();?>Categoria_ejercicios_c/seleditar",{"id_categoria_ejercicio":id},
			function(data){
				var $modal = $('#categoria_ejercicios_modal');
				$('#categoria_ejercicios_modal').empty();
            	$('#categoria_ejercicios_modal').append(data);
			    $modal.modal();
			});

}
function Actualizar(id){
		var descripcion = $("#edtipomembre"+id).val();
		modal();
		$.post("<?php echo base_url();?>Categoria_ejercicios_c/modificar",{"id_categoria_ejercicio":id,"descripcion":descripcion},
		function(data){
			var j=data;
			if(j=='incorrecto'){
				toastr.warning("Error al Actualizar dato");
			}
			else{
			var tabla1= $("#tablacategoriaejercicios").DataTable();
			tabla1.destroy();
			$('#categoria_ejercicio').empty();
            $('#categoria_ejercicio').append(data);
            toastr.success("Categoria ejercicio <b>" + descripcion + " fue actualizado Correctamente</b>");
            $('#tablacategoriaejercicios').DataTable( {
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
		bootbox.confirm("Está seguro que desea eliminar este Categoria ejercicios?", function(result) {
			if(result==true){
			$.post("<?php echo base_url();?>Categoria_ejercicios_c/eliminar",{"id_categoria_ejercicio":codigo},
					function(data){
						var table1 = $('#tablacategoriaejercicios').DataTable();
						table1.destroy();
                       $('#categoria_ejercicio').empty();
                       $('#categoria_ejercicio').append(data);
                       $('#tablacategoriaejercicios').DataTable( {
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

			bootbox.prompt("Agregar Categoria Ejercicios", function(result) {
				if (result === null) {
					toastr.warning("No se inserto Dato");
				} else {
				$.post("<?php echo base_url();?>Categoria_ejercicios_c/agregar",{"descripcion":result},
					function(data){
						var table1 = $('#tablacategoriaejercicios').DataTable();
						table1.destroy();
                       $('#categoria_ejercicio').empty();
                       $('#categoria_ejercicio').append(data);
                       toastr.success("Categoria Ejercicio <b>" + result + " fue insertado Correctamente</b>");
                       $('#tablacategoriaejercicios').DataTable( {
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