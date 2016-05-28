<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo_empleado_c extends CI_Controller {

		public function __construct()
		{
		parent::__construct();
		$this->load->model('Tipo_empleado_m');
		$this->load->model('Principal_m');
		}
		public function index(){
		$permisos = $this->Principal_m->traer_modulos();
		$tipo_empleado = $this->Tipo_empleado_m->mostrar();
		$this->load->view('Tipo_empleado/tipo_empleado_v.php',compact("tipo_empleado","permisos"));
	}

public function agregar(){
		$tipo_empleado = $this->Tipo_empleado_m->agregar($this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function modificar(){
		$tipo_empleado_modal = $this->Tipo_empleado_m->modificar($this->input->post("id_tipoempleado"),$this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function seleditar(){
		$tipo_empleado_modal = $this->Tipo_empleado_m->seleditar($this->input->post("id_tipoempleado"));
		$this->load->view('Tipo_empleado/tipo_empleado_edi_v.php',compact("tipo_empleado_modal"));
	}
	public function eliminar(){
		$tipo_documento = $this->Tipo_empleado_m->eliminar($this->input->post("id_tipoempleado"));
		$this->listar();exit;
	}

	public function listar(){
		$html = '';
		$tipo_empleado = $this->Tipo_empleado_m->mostrar();
		$i=1;
		//print_r($tiposocios);
		foreach ($tipo_empleado as $value){
		$html.= '<tr>
					<td> '.$i.' </td>
					<td> '.$value->descripcion.'</td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
						<a onclick=Modificar('.$value->id_tipoempleado.') class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
						<a onclick=Eliminar('.$value->id_tipoempleado.') class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
						</div>
						<div class="visible-xs visible-sm hidden-md hidden-lg">
							<div class="btn-group">
								<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
								<i class="fa fa-cog"></i> <span class="caret"></span>
								</a>
								<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
									<li>
										<a role="menuitem" tabindex="-1" onclick="Modificar('.$value->id_tipoempleado.')" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
										<i class="fa fa-edit"></i> Editar
										</a>
									</li>
									<li>
										<a role="menuitem" tabindex="-1"  onclick="Eliminar('.$value->id_tipoempleado.')" data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
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