<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personal_m');
		$this->load->model('Clientes_m');
		$this->load->model('Principal_m');

	}


	public function index()
	{
		$permisos = $this->Principal_m->traer_modulos();
		$clientes = $this->Clientes_m->todos();
		$data["permisos"] = $permisos;
		$data["clientes"] = $clientes;
		$this->load->view('clientes/registrar/Clientes_v',$data);
	}



	public function insertar()
	{
		$r = $this->Personal_m->insertar();

		if($r == true)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function nuevo()
	{
		$permisos = $this->Principal_m->traer_modulos();
		$sexo = $this->Personal_m->sexo();
		$tipo_doc = $this->Personal_m->documento();
		$sangre = $this->Clientes_m->sangre();	
		$civil = $this->Clientes_m->civil();
		$grado = $this->Clientes_m->grado();		
		$data["permisos"] = $permisos;
		$data["sexo"] = $sexo;
		$data["tipo_doc"] = $tipo_doc;
		$data["sangre"] = $sangre;
		$data["civil"] = $civil;
		$data["grado"] = $grado;
		$this->load->view('Clientes/registrar/nuevocliente_v',$data);
	}

	public function modificar($id){
		
		$permisos = $this->Principal_m->traer_modulos();
		$clientesm = $this->Clientes_m->clientesm($id);
		$sexoc = $this->Personal_m->sexo();
		$tipo_doc = $this->Personal_m->documento();
		$sangre = $this->Clientes_m->sangre();	
		$civil = $this->Clientes_m->civil();
		$grado = $this->Clientes_m->grado();		
		$data["permisos"] = $permisos;
		$data["sexoc"] = $sexoc;
		$data["tipo_doc"] = $tipo_doc;
		$data["clientesm"] = $clientesm;
		$data["sangre"] = $sangre;
		$data["civil"] = $civil;
		$data["grado"] = $grado;
		$this->load->view('clientes/modificar/clientemod_v',$data);
	}

	public function actualizar_cliente(){
		$actualizar_cliente = $this->Clientes_m->actualizar_cliente();
		sleep(1);
		echo $actualizar_cliente;
	}

	public function guardar_cliente(){
		$guardar = $this->Clientes_m->guardar_cliente();
		 sleep(1);
		echo $guardar;
	
	}

	public function cargar_distrito(){
		$distrito = $this->Personal_m->distrito($this->input->post("code"));

		foreach($distrito as $value)
		{
		echo "<option value=\"$value->id_ubigeo\">$value->Distrito</option>";
		}
	}

	public function clientes(){
		$clientes = $this->Clientes_m->todos();
		$html='';
		foreach ($clientes as $value) { 
			$nombre = $value->nombre. ' ' . $value->apellido_paterno .' ' . $value->apellido_materno;
			$clientes = "Cliente('".$value->id_cliente."','".$nombre."')";
			$html.='<tr>
						<td> '.$value->nro_documento.' </td>
						<td> '.$value->nombre.' </td>
						<td> '.$value->apellido_paterno.' '.$value->apellido_materno.' </td>
						<td> '.$value->celular.' </td>
						<td> '.$value->direccion.' </td>
						<td> <a class="btn btn-social-icon btn-reddit" onclick="'.$clientes.'" id="seleccionar"  type="submit">
						<i class="fa fa-check-square"></i></a></td>
					</tr>';
		}
		echo $html;
	}
}