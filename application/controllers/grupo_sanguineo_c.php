<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupo_sanguineo_c extends CI_Controller {

		public function __construct()
		{
		parent::__construct();
		$this->load->model('Grupo_sanguineo_m');
		$this->load->model('Principal_m');

		}
		public function index(){
		$grupo_sanguineo = $this->Grupo_sanguineo_m->mostrar();
		$permisos = $this->Principal_m->traer_modulos();
		$this->load->view('Grupo_sanguineo/grupo_sanguineo_v.php',compact("grupo_sanguineo","permisos"));

	}

public function agregar(){
		$grupo_sanguineo = $this->Grupo_sanguineo_m->agregar($this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function modificar(){
		$grupo_sanguineo_modal = $this->Grupo_sanguineo_m->modificar($this->input->post("id_gruposanguineo"),$this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function seleditar(){
		$grupo_sanguineo_modal = $this->Grupo_sanguineo_m->seleditar($this->input->post("id_gruposanguineo"));
		$this->load->view('Grupo_sanguineo/grupo_sanguineo_edi_v.php',compact("grupo_sanguineo_modal"));
	}
	public function eliminar(){
		$grupo_sanguineo = $this->Grupo_sanguineo_m->eliminar($this->input->post("id_gruposanguineo"));
		$this->listar();exit;
	}

	public function listar(){
		$html = '';
		$grupo_sanguineo = $this->Grupo_sanguineo_m->mostrar();
		$i=1;
		//print_r($tiposocios);
		foreach ($grupo_sanguineo as $value){
		$html.= '<tr>
					<td> '.$i.' </td>
					<td> '.$value->descripcion.'</td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
						<a onclick=Modificar('.$value->id_gruposanguineo.') class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
						<a onclick=Eliminar('.$value->id_gruposanguineo.') class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
						</div>
						<div class="visible-xs visible-sm hidden-md hidden-lg">
							<div class="btn-group">
								<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
								<i class="fa fa-cog"></i> <span class="caret"></span>
								</a>
								<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
									<li>
										<a role="menuitem" tabindex="-1" onclick="Modificar('.$value->id_gruposanguineo.')" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
										<i class="fa fa-edit"></i> Editar
										</a>
									</li>
									<li>
										<a role="menuitem" tabindex="-1"  onclick="Eliminar('.$value->id_gruposanguineo.')" data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
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