<?php

class Ventas_m extends CI_Model {

   	public function __construct()
    {
        parent::__construct();

 	}
    
     public function correlativo(){
        $this->db->select("*");
        $this->db->from("correlativocodigo");
        $this->db->where("id_tipo_documento",$this->input->post("id_tipo_documento"));
        $r = $this->db->get();   
        return $r->result();
     }
     public function paquetes(){
     	$r = $this->db->get_where('paquete',array('estado' => '1'));
     	return $r->result();
     }

 

}
?>