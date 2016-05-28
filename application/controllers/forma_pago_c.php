<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forma_pago_c extends CI_Controller {

		public function __construct()
		{
		parent::__construct();
		$this->load->model('Forma_pago_m');
		$this->load->model('Principal_m');
		}
		public function index(){
		$forma_pago = $this->Forma_pago_m->mostrar();
		$permisos = $this->Principal_m->traer_modulos();
		$this->load->view('Forma_pago/forma_pago_v.php',compact("forma_pago","permisos"));

	}

public function agregar(){
		$forma_pago = $this->Forma_pago_m->agregar($this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function modificar(){
		$forma_pago_modal = $this->Forma_pago_m->modificar($this->input->post("id_formapago"),$this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function seleditar(){
		$forma_pago_modal = $this->Forma_pago_m->seleditar($this->input->post("id_formapago"));
		$this->load->view('Forma_pago/forma_pago_edi_v.php',compact("forma_pago_modal"));
	}
	public function eliminar(){
		$forma_pago = $this->Forma_pago_m->eliminar($this->input->post("id_formapago"));
		$this->listar();exit;
	}

	public function listar(){
		$html = '';
		$forma_pago = $this->Forma_pago_m->mostrar();
		$i=1;
		//print_r($tiposocios);
		foreach ($forma_pago as $value){
		$html.= '<tr>
					<td> '.$i.' </td>
					<td> '.$value->descripcion.'</td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
						<a onclick=Modificar('.$value->id_formapago.') class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
						<a onclick=Eliminar('.$value->id_formapago.') class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
						</div>
						<div class="visible-xs visible-sm hidden-md hidden-lg">
							<div class="btn-group">
								<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
								<i class="fa fa-cog"></i> <span class="caret"></span>
								</a>
								<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
									<li>
										<a role="menuitem" tabindex="-1" onclick="Modificar('.$value->id_formapago.')" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
										<i class="fa fa-edit"></i> Editar
										</a>
									</li>
									<li>
										<a role="menuitem" tabindex="-1"  onclick="Eliminar('.$value->id_formapago.')" data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
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