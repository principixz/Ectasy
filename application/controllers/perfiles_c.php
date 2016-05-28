<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfiles_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perfiles_m');
		$this->load->model('Principal_m');

	}


	public function index()
	{
		$permisos = $this->Principal_m->traer_modulos();
		$perfiles = $this->Perfiles_m->todos();
		$data["perfiles"] = $perfiles;
		$data["permisos"] = $permisos;
		$this->load->view('seguridad/perfiles/perfil_v',$data);
	}

	public function listar()
	{
		$html = $this->listar_perfiles();
		echo $html;
	}


	public function delete_perfil()
	{
		$r = $this->Perfiles_m->eliminar_perfil();
		$html = $this->listar_perfiles();
		if($r)
		{
			echo "1-".$html;
		}
		else
		{
			echo "0-".$html;
		}
	}

	public function listar_perfiles()
	{

		$perfiles = $this->Perfiles_m->todos();
		// print_r($perfiles); exit;
		$html = "";

		foreach ($perfiles as $value)
		{
			$parametros = "'".$value->descripcion."','".$value->id_perfil_usuario."'";
			$html .='<tr id="modificar'.$value->id_perfil_usuario.'">
						<td style="width:700px;">'.$value->descripcion.'</td>

						<td>
						<a href="#" id="modificar" onclick="modificar('.$parametros.')">
							Modificar
						</a></td>
						<td>
						<a href="#" id="eliminar" >
							Eliminar
						</a></td>
					</tr>';

		}

		return $html;

	}
	public function save_perfil()
	{
		$r = $this->Perfiles_m->guardar_perfil();
		$html = $this->listar_perfiles();
		if($r)
		{
			echo "1-".$html;
		}
		else
		{
			echo "0-".$html;
		}
	}

	public function update_perfil()
	{
		$r = $this->Perfiles_m->modificar_perfil();
		$html = $this->listar_perfiles();
		if($r)
		{
			echo "1-".$html;
		}
		else
		{
			echo "0-".$html;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */