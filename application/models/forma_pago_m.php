<?php
class Forma_pago_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("forma_pago",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($forma_pago)
   {
    echo $forma_pago;
    $data = $this->db->Insert("forma_pago",array('descripcion'=>$forma_pago,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("forma_pago",array('id_formapago'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$forma_pago){
    $actualizar =array('descripcion' => $forma_pago);
    $this->db->where('id_formapago',$id);
    $this->db->update('forma_pago',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_formapago',$id);
    $this->db->update('forma_pago',$elimi);
   }
   }
 ?>