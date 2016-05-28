<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo_vivienda_c extends CI_Controller {

		public function __construct()
		{
		parent::__construct();
		$this->load->model('Tipo_vivienda_m');
		$this->load->model('Principal_m');
		}
		public function index(){
		$permisos = $this->Principal_m->traer_modulos();
		$tipo_vivienda = $this->Tipo_vivienda_m->mostrar();

		$this->load->view('Tipo_vivienda/tipo_vivienda_v.php',compact("tipo_vivienda","permisos"));

	}

public function agregar(){
		$tipo_vivienda = $this->Tipo_vivienda_m->agregar($this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function modificar(){
		$tipo_vivienda_modal = $this->Tipo_vivienda_m->modificar($this->input->post("id_tipovivienda"),$this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function seleditar(){
		$tipo_vivienda_modal = $this->Tipo_vivienda_m->seleditar($this->input->post("id_tipovivienda"));
		$this->load->view('Tipo_vivienda/tipo_vivienda_edi_v.php',compact("tipo_vivienda_modal"));
	}
	public function eliminar(){
		$tipo_vivienda = $this->Tipo_vivienda_m->eliminar($this->input->post("id_tipovivienda"));
		$this->listar();exit;
	}

	public function listar(){
		$html = '';
		$tipo_vivienda = $this->Tipo_vivienda_m->mostrar();
		$i=1;
		//print_r($tiposocios);
		foreach ($tipo_vivienda as $value){
		$html.= '<tr>
					<td> '.$i.' </td>
					<td> '.$value->descripcion.'</td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
						<a onclick=Modificar('.$value->id_tipovivienda.') class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
						<a onclick=Eliminar('.$value->id_tipovivienda.') class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
						</div>
						<div class="visible-xs visible-sm hidden-md hidden-lg">
							<div class="btn-group">
								<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
								<i class="fa fa-cog"></i> <span class="caret"></span>
								</a>
								<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
									<li>
										<a role="menuitem" tabindex="-1" onclick="Modificar('.$value->id_tipovivienda.')" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
										<i class="fa fa-edit"></i> Editar
										</a>
									</li>
									<li>
										<a role="menuitem" tabindex="-1"  onclick="Eliminar('.$value->id_tipovivienda.')" data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
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