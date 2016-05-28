<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_ejercicios_c extends CI_Controller {

		public function __construct()
		{
		parent::__construct();
		$this->load->model('Categoria_ejercicios_m');
		$this->load->model('Principal_m');
		}
		public function index(){
		$categoria_ejercicio = $this->Categoria_ejercicios_m->mostrar();		
		$permisos = $this->Principal_m->traer_modulos();
		$this->load->view('Categoria_ejercicios/categoria_ejercicios_v.php',compact("categoria_ejercicio","permisos"));

	}

public function agregar(){
		$categoria_ejercicio = $this->Categoria_ejercicios_m->agregar($this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function modificar(){
		$categoria_ejercicios_modal = $this->Categoria_ejercicios_m->modificar($this->input->post("id_categoria_ejercicio"),$this->input->post("descripcion"));
		$this->listar();exit;
	}

	public function seleditar(){
		$categoria_ejercicios_modal = $this->Categoria_ejercicios_m->seleditar($this->input->post("id_categoria_ejercicio"));
		$this->load->view('Categoria_ejercicios/categoria_ejercicios_edi_v.php',compact("categoria_ejercicios_modal"));
	}
	public function eliminar(){
		$categoria_ejercicio = $this->Categoria_ejercicios_m->eliminar($this->input->post("id_categoria_ejercicio"));
		$this->listar();exit;
	}

	public function listar(){
		$html = '';
		$categoria_ejercicio = $this->Categoria_ejercicios_m->mostrar();
		$i=1;
		//print_r($tiposocios);
		foreach ($categoria_ejercicio as $value){
		$html.= '<tr>
					<td> '.$i.' </td>
					<td> '.$value->descripcion.'</td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
						<a onclick=Modificar('.$value->id_categoria_ejercicio.') class="btn btn-xs btn-blue tooltips" data-placement="top" data-original-title="Editar"><i class="fa fa-edit"></i></a>
						<a onclick=Eliminar('.$value->id_categoria_ejercicio.') class="btn btn-xs btn-red tooltips" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times fa fa-white"></i></a>
						</div>
						<div class="visible-xs visible-sm hidden-md hidden-lg">
							<div class="btn-group">
								<a class="btn btn-green dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
								<i class="fa fa-cog"></i> <span class="caret"></span>
								</a>
								<ul role="menu" class="dropdown-menu pull-right dropdown-dark">
									<li>
										<a role="menuitem" tabindex="-1" onclick="Modificar('.$value->id_categoria_ejercicio.')" data-toggle="modal" class="btn btn-xs btn-blue tooltips" data-placement="top">
										<i class="fa fa-edit"></i> Editar
										</a>
									</li>
									<li>
										<a role="menuitem" tabindex="-1"  onclick="Eliminar('.$value->id_categoria_ejercicio.')" data-toggle="modal" class="btn btn-xs btn-red tooltips" data-placement="top" >
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