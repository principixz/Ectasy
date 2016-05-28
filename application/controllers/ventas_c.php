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
		$data["permisos"] = $permisos;
		$data["paquetes"] = $paquetes;
		$data["transaccion"] = $transaccion;
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

	/**public function precios(){
		$precios = $this->Membresias_m->traer_precios();
		$html = '';
			foreach ($precios as $value) {	
				$html .= '1/'.$value->precio.'/';
				$time = time(); 
				$fecha = date("d-m-Y",$time);
				if($value->vigencia == 'Dia'){
					$fecha = strtotime('+0 day',strtotime($fecha));
					$fecha = date("d-m-Y",$fecha);
				}
				if($value->vigencia == 'Mes'){
					$fecha = strtotime('+1 month',strtotime($fecha));
					$fecha = date("d-m-Y",$fecha);
				}
				$html .= '2/'.$fecha;
			}
			echo $html;
	}**/

	public function paquetes(){
		
		$datos = $this->Ventas_m->paquetes();
		sleep(1);
		echo json_encode($datos);
	}

	

}



?>