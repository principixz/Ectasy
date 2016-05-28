<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personal_m');
		$this->load->model('Principal_m');

	}


	public function index()
	{
		$permisos = $this->Principal_m->traer_modulos();
		$personal = $this->Personal_m->todos();
		$data["permisos"] = $permisos;
		$data["personal"] = $personal;
		$this->load->view('seguridad/personal/personal_v',$data);
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
		$tipo_empleado = $this->Personal_m->empleado();		
		$data["permisos"] = $permisos;
		$data["sexo"] = $sexo;
		$data["tipo_doc"] = $tipo_doc;
		$data["tipo_empleado"] = $tipo_empleado;	
		$this->load->view('seguridad/personal/nuevo_v',$data);
	}

	public function modificar($id){
		
		$permisos = $this->Principal_m->traer_modulos();
		$personalm = $this->Personal_m->modificar($id);
		$tipo_empleado = $this->Personal_m->empleado();
		$tipo_doc = $this->Personal_m->documento();
		$sexoc = $this->Personal_m->sexo();
		$data["personalm"] = $personalm;
		$data["permisos"] = $permisos;
		$data["tipo_empleado"] = $tipo_empleado;
		$data["tipo_doc"] = $tipo_doc;
		$data["sexoc"] = $sexoc;
		$this->load->view('seguridad/personal/modificar_v',$data);
	}

	public function actualizar_empleado(){
		$actualizar_empleado = $this->Personal_m->actualizar_empleado();
		$this->index();	
	}

	public function registrar_empleado(){
		$registrar_empleado = $this->Personal_m->registrar_empleado();
		$this->index();
	
	}
	public function cargar_departamentos(){
		$departamento = $this->Personal_m->departamento();
		foreach($departamento as $value)
		{
		echo "<option value=\"$value->Departamento\">$value->Departamento</option>";
		}
		
	}
	public function cargar_provincias(){
		$provincia = $this->Personal_m->provincia($this->input->post("code"));

		foreach($provincia as $value)
		{
		echo "<option value=\"$value->Provincia\">$value->Provincia</option>";
		}
	}

	public function cargar_distrito(){
		$distrito = $this->Personal_m->distrito($this->input->post("code"));

		foreach($distrito as $value)
		{
		echo "<option value=\"$value->id_ubigeo\">$value->Distrito</option>";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */