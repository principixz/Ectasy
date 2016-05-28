<?php
class Tipo_movimiento_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("tipo_movimiento",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($tipo_movimiento)
   {
    echo $tipo_movimiento;
    $data = $this->db->Insert("tipo_movimiento",array('descripcion'=>$tipo_movimiento,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("tipo_movimiento",array('id_tipomovimiento'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$tipomovimiento){
    $actualizar =array('descripcion' => $tipomovimiento);
    $this->db->where('id_tipomovimiento',$id);
    $this->db->update('tipo_movimiento',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_tipomovimiento',$id);
    $this->db->update('tipo_movimiento',$elimi);
   }
   }
 ?>