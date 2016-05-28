<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Concepto_triaje_c extends CI_Controller {

		public function __construct()
		{
		parent::__construct();
		$this->load->model('Concepto_triaje_m');
		$this->load->model('Principal_m');
		}
		public function index(){
		$concepto_triaje = $this->Concepto_triaje_m->mostrar();
		$permisos = $this->Principal_m->traer_modulos();
		$this->load->view('Concepto_triaje/concepto_triaje_v.php',compact("concepto_triaje","permisos"),"permisos");
	}

public function agregar(){
		$concepto_triaje = $this->Concepto_triaje_m->agregar($this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function modificar(){
		$concepto_triaje_modal = $this->Concepto_triaje_m->modificar($this->input->post("id_conceptotriaje"),$this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function seleditar(){
		$concepto_triaje_modal = $this->Concepto_triaje_m->seleditar($this->input->post("id_conceptotriaje"));
		$this->load->view('Concepto_triaje/concepto_triaje_edi_v.php',compact("concepto_triaje_modal"));
	}
	public function eliminar(){
		$concepto_triaje = $this->Concepto_triaje_m->eliminar($this->input->post("id_conceptotriaje"));
		$this->listar();exit;
	}

	public function listar(){
		$html = '';
		$concepto_triaje = $this->Concepto_triaje_m->mostrar();
		$i=1;
		//print_r($tiposocios);
		foreach ($concepto_triaje as $value){
		$html.= '<tr>
					<td> '.$i.' </td>
					<td> '.$value->descripcion.'</td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
						<a onclick=Modificar('.$value->id_conceptotriaje.') class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
						<a onclick=Eliminar('.$value->id_conceptotriaje.') class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
						</div>
						<div class="visible-xs visible-sm hidden-md hidden-lg">
							<div class="btn-group">
								<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
								<i class="fa fa-cog"></i> <span class="caret"></span>
								</a>
								<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
									<li>
										<a role="menuitem" tabindex="-1" onclick="Modificar('.$value->id_conceptotriaje.')" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
										<i class="fa fa-edit"></i> Editar
										</a>
									</li>
									<li>
										<a role="menuitem" tabindex="-1"  onclick="Eliminar('.$value->id_conceptotriaje.')" data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
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