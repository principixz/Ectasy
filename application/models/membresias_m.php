<?php
class Membresias_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }
    public function traer_paquetes(){
    		$r = $this->db->get_where('paquete',array('estado' => '1'));
    		return $r->result();
    }

    public function traer_precios(){
    		$r = $this->db->get_where('paquete',array('id_paquete' => $this->input->post("idpaquete")));
    		return $r->result();
    }
    public function modalidad_transaccion(){
            $r = $this->db->get_where('modalidad_transaccion',array('estado' => '1'));
            return $r->result();
    }
}