<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nacionalidad_c extends CI_Controller {

		public function __construct()
		{
		parent::__construct();
		$this->load->model('Nacionalidad_m');
		$this->load->model('Principal_m');
		}
		public function index(){
		$nacionalidad = $this->Nacionalidad_m->mostrar();
		$permisos = $this->Principal_m->traer_modulos();

		$this->load->view('Nacionalidad/nacionalidad_v.php',compact("nacionalidad","permisos"));

	}

public function agregar(){
		$nacionalidad = $this->Nacionalidad_m->agregar($this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function modificar(){
		$nacionalidad_modal = $this->Nacionalidad_m->modificar($this->input->post("id_nacionalidad"),$this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function seleditar(){
		$nacionalidad_modal = $this->Nacionalidad_m->seleditar($this->input->post("id_nacionalidad"));
		$this->load->view('nacionalidad/nacionalidad_edi_v.php',compact("nacionalidad_modal"));
	}
	public function eliminar(){
		$nacionalidad = $this->Nacionalidad_m->eliminar($this->input->post("id_nacionalidad"));
		$this->listar();exit;
	}

	public function listar(){
		$html = '';
		$nacionalidad = $this->Nacionalidad_m->mostrar();
		$i=1;
		//print_r($tiposocios);
		foreach ($nacionalidad as $value){
		$html.= '<tr>
					<td> '.$i.' </td>
					<td> '.$value->descripcion.'</td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
						<a onclick=Modificar('.$value->id_nacionalidad.') class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
						<a onclick=Eliminar('.$value->id_nacionalidad.') class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
						</div>
						<div class="visible-xs visible-sm hidden-md hidden-lg">
							<div class="btn-group">
								<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
								<i class="fa fa-cog"></i> <span class="caret"></span>
								</a>
								<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
									<li>
										<a role="menuitem" tabindex="-1" onclick="Modificar('.$value->id_nacionalidad.')" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
										<i class="fa fa-edit"></i> Editar
										</a>
									</li>
									<li>
										<a role="menuitem" tabindex="-1"  onclick="Eliminar('.$value->id_nacionalidad.')" data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
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