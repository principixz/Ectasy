<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Principal_m');
		$this->load->model('Membresias_m');
		$this->load->model('Ventas_m');
	}
	
	public function index(){
		$permisos = $this->Principal_m->traer_modulos();
		$paquetes = $this->Membresias_m->traer_paquetes();
		$transaccion = $this->Membresias_m->modalidad_transaccion();
		$almacen = $this->Ventas_m->almacen();
		$data["permisos"] = $permisos;
		$data["paquetes"] = $paquetes;
		$data["transaccion"] = $transaccion;
		$data["almacen"] = $almacen;
		$this->load->view('Membresias/membresias_v.php',$data);
	}

	public function correlativo(){
		if($this->input->post("id_tipo_documento")==1 || $this->input->post("id_tipo_documento")==2 || $this->input->post("id_tipo_documento")==3 ){
			$datos = $this->Ventas_m->correlativo();
			foreach ($datos as  $value) {
				if($value->numero == $value->max_numero){
					$codigo = $this->number_code(intval($value->codigo)+1,3).'-'.$this->number_code(1,7);
					echo $codigo;
				}else{
					$codigo = $this->number_code(intval($value->codigo),3).'-'.$this->number_code(intval($value->numero)+1,7);
					echo $codigo;
				}
			}			
		}else{
			echo " ";
		}
	}

	public function number_code($number,$tam=0){
        $data="";
        $comodin="0";
        for($i=0;$i<$tam-strlen($number);$i++){
            $data.=$comodin;
        }
        $data.=$number;
        return $data;
    }
	public function paquetes(){
		
		$datos = $this->Ventas_m->paquetes();
		sleep(1);
		echo json_encode($datos);
	}

	public function productos(){
		$datos = $this->Ventas_m->productos();
		sleep(1);
		echo json_encode($datos);
	}
	public function parm(){
		$datos = $this->Ventas_m->parm();
		foreach ($datos as $value) {
			$igv = $value->valor;
		}
		echo $igv;
	}

	

}



?>