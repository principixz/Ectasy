<?php
class Concepto_triaje_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("concepto_triaje",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($concepto_triaje)
   {
    echo $concepto_triaje;
    $data = $this->db->Insert("concepto_triaje",array('descripcion'=>$concepto_triaje,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("concepto_triaje",array('id_conceptotriaje'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$conceptotriaje){
    $actualizar =array('descripcion' => $conceptotriaje);
    $this->db->where('id_conceptotriaje',$id);
    $this->db->update('concepto_triaje',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_conceptotriaje',$id);
    $this->db->update('concepto_triaje',$elimi);
   }
   }
 ?>