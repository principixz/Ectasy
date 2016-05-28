<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estado_civil_c extends CI_Controller {

		public function __construct()
		{
		parent::__construct();
		$this->load->model('Estado_civil_m');
		$this->load->model('Principal_m');
		}
		public function index(){
		$estado_civil = $this->Estado_civil_m->mostrar();
		$permisos = $this->Principal_m->traer_modulos();
		$this->load->view('Estado_civil/estado_civil_v.php',compact("estado_civil","permisos"));
	}

public function agregar(){
		$estado_civil = $this->Estado_civil_m->agregar($this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function modificar(){
		$estado_civil_modal = $this->Estado_civil_m->modificar($this->input->post("id_estadocivil"),$this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function seleditar(){
		$estado_civil_modal = $this->Estado_civil_m->seleditar($this->input->post("id_estadocivil"));
		$this->load->view('Estado_civil/estado_civil_edi_v.php',compact("estado_civil_modal"));
	}
	public function eliminar(){
		$estado_civil = $this->Estado_civil_m->eliminar($this->input->post("id_estadocivil"));
		$this->listar();exit;
	}

	public function listar(){
		$html = '';
		$estado_civil = $this->Estado_civil_m->mostrar();
		$i=1;
		//print_r($tiposocios);
		foreach ($estado_civil as $value){
		$html.= '<tr>
					<td> '.$i.' </td>
					<td> '.$value->descripcion.'</td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
						<a onclick=Modificar('.$value->id_estadocivil.') class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
						<a onclick=Eliminar('.$value->id_estadocivil.') class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
						</div>
						<div class="visible-xs visible-sm hidden-md hidden-lg">
							<div class="btn-group">
								<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
								<i class="fa fa-cog"></i> <span class="caret"></span>
								</a>
								<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
									<li>
										<a role="menuitem" tabindex="-1" onclick="Modificar('.$value->id_estadocivil.')" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
										<i class="fa fa-edit"></i> Editar
										</a>
									</li>
									<li>
										<a role="menuitem" tabindex="-1"  onclick="Eliminar('.$value->id_estadocivil.')" data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
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