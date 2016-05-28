<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Cambiarbase_c extends CI_Controller {
		public function __construct()
		{
		parent::__construct();
		$this->load->model('Cambiarbase_m');
		$this->load->model('Principal_m');
		}
		public function index(){
		$permisos = $this->Principal_m->traer_modulos();
		$datos= $this->Cambiarbase_m->datos();
		$this->load->view('Base/Cambiarbase_v.php',compact("datos","permisos"));
	}

		public function modificar(){
		$cambiarbase = $this->Cambiarbase_m->modificar($this->input->post("host"),$this->input->post("usuario"),
		$this->input->post("clave"),$this->input->post("basedatos"),$this->input->post("driver"),$this->input->post("gestor"));
		exit;
	}
}
?>