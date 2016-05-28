<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo_movimiento_c extends CI_Controller {

		public function __construct()
		{
		parent::__construct();
		$this->load->model('Tipo_movimiento_m');
		$this->load->model('Principal_m');
		}
		public function index(){
		$permisos = $this->Principal_m->traer_modulos();
		$tipo_movimiento = $this->Tipo_movimiento_m->mostrar();
		$this->load->view('Tipo_movimiento/tipo_movimiento_v.php',compact("tipo_movimiento","permisos"));
	}

public function agregar(){
		$tipo_movimiento = $this->Tipo_movimiento_m->agregar($this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function modificar(){
		$tipo_movimiento_modal = $this->Tipo_movimiento_m->modificar($this->input->post("id_tipomovimiento"),$this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function seleditar(){
		$tipo_movimiento_modal = $this->Tipo_movimiento_m->seleditar($this->input->post("id_tipomovimiento"));
		$this->load->view('Tipo_movimiento/tipo_movimiento_edi_v.php',compact("tipo_movimiento_modal"));
	}
	public function eliminar(){
		$tipo_movimiento = $this->Tipo_movimiento_m->eliminar($this->input->post("id_tipomovimiento"));
		$this->listar();exit;
	}

	public function listar(){
		$html = '';
		$tipo_movimiento = $this->Tipo_movimiento_m->mostrar();
		$i=1;
		//print_r($tiposocios);
		foreach ($tipo_movimiento as $value){
		$html.= '<tr>
					<td> '.$i.' </td>
					<td> '.$value->descripcion.'</td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
						<a onclick=Modificar('.$value->id_tipomovimiento.') class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
						<a onclick=Eliminar('.$value->id_tipomovimiento.') class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
						</div>
						<div class="visible-xs visible-sm hidden-md hidden-lg">
							<div class="btn-group">
								<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
								<i class="fa fa-cog"></i> <span class="caret"></span>
								</a>
								<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
									<li>
										<a role="menuitem" tabindex="-1" onclick="Modificar('.$value->id_tipomovimiento.')" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
										<i class="fa fa-edit"></i> Editar
										</a>
									</li>
									<li>
										<a role="menuitem" tabindex="-1"  onclick="Eliminar('.$value->id_tipomovimiento.')" data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
										<i class="fa fa-times"></i> Eliminar
										</a>
									</li>
								</ul>
							</div>
						</div>
					</td>
				</tr>';
		$i = $i+1;
		}
		echo $html;
	}

}



?>