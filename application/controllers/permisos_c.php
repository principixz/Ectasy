<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Permisos_m');
		$this->load->model('Principal_m');

	}


	public function index()
	{
		$permisos = $this->Principal_m->traer_modulos();
		$perfiles = $this->Permisos_m->traer_perfiles();
		$permisos2 = $this->Permisos_m->traer_modulos();

		$data["permisos"] = $permisos;
		$data["perfiles"] = $perfiles;
		$data["permisos2"] = $permisos2;
		$this->load->view('seguridad/permisos/permisos_v',$data);
	}

	public function devolver_permisos($idperfil)
	{
		$permisos = $this->Permisos_m->traer_modulos();
		$modulos = $this->Permisos_m->traer_permisos($idperfil);
		$modulos_con_permisos = array();

		foreach ($modulos as $value2)
		{
			$modulos_con_permisos[] = $value2->idhijo;
		}

		$data["permisos"] = $permisos;
		$data["modulos"] = $modulos_con_permisos;

		$this->load->view('seguridad/permisos/modulos_v',$data);

	}

	public function insertar()
	{
		$r = $this->Permisos_m->insertar();

		if($r == true)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */