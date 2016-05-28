<?php include('public/css.inc');?>
<body>
		<?php include('public/menu.inc');?>
		<?php include('public/js.inc');?>
	<div class="container">
		<div class="toolbar row">
			<div class="col-sm-6 hidden-xs">
				<div class="page-header">
				<h1>Sexo <small></small></h1>
				</div>
			</div>
		</div>
	</div>
<div>
<div class="container">
	<div class="row">
		<div class="col-sm-6 hidden-xs">
			<ol class="breadcrumb">
				<li class="active">
				Sexo
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="row">
				<div class="col-md-9"></div>
				<div class="col-md-2">
				<div class="panel-heading">
					<button onclick="AgregarTipo()" class="btn btn-blue">Agregar</button>
				</div>
				</div>
				</div>
				<div class="container-10">
				<div class="panel-body">
				<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<table class="table table-striped table-bordered table-hover table-full-width" id="tablasexo">
						<thead>
							<tr>
								<th>#</th>
								<th>Sexo</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="sexo">
						<?php $i=1; foreach ($sexo as $value) {?>
							<tr>
								<td><?php echo  $i;?></td>
								<td><?php echo  $value->descripcion; $i=$i+1;?></td>
								<td class="center">
								<div class="visible-md visible-lg hidden-sm hidden-xs">
									<a onclick='Modificar(<?php echo $value->id_sexo;?>)' class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
									<a onclick='Eliminar(<?php echo $value->id_sexo;?>)' class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
								</div>
								<div class="visible-xs visible-sm hidden-md hidden-lg">
									<div class="btn-group">
										<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
										<i class="fa fa-cog"></i> <span class="caret"></span>
										</a>
										<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
											<li>
												<a role="menuitem" tabindex="-1" onclick="Modificar(<?php echo $value->id_sexo;?>)" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
												<i class="fa fa-edit"></i> Editar
												</a>
											</li>
											<li>
												<a role="menuitem" tabindex="-1"  onclick='Eliminar(<?php echo $value->id_sexo; ?>)' data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
												<i class="fa fa-times"></i> Eliminar
												</a>
											</li>
										</ul>
									</div>
								</div>
								</td>
							</tr>
						<?php }?>
							<div id="sexos_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<?php include('sexo_edi_v.php'); ?>
							</div>
						</tbody>
					</table>
				</div>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	</body>
	<!-- end: BODY -->
		<?php include('public/pie.inc');?>
		<?php include('js.php');?>
</html>


