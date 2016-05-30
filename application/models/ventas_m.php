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

    public function almacen(){
    $r = $this->db->get_where('almacen',array('estado' => '1'));
    return $r->result();
    }

    public function productos(){
        $this->db->select("*");
        $this->db->from("producto_vista");
        $this->db->where("id_almacen",$this->input->post("idalmacen"));

        $r = $this->db->get();   
        return $r->result();
    }
    public function parm(){
    $r = $this->db->get_where('param',array('id_param' => $this->input->post("id_param")));
    return $r->result();
    }


}
?>