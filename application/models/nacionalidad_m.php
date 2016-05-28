<?php
class Nacionalidad_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("nacionalidad",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($nacionalidad)
   {
    echo $nacionalidad;
    $data = $this->db->Insert("nacionalidad",array('descripcion'=>$nacionalidad,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("nacionalidad",array('id_nacionalidad'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$nacionalidad){
    $actualizar =array('descripcion' => $nacionalidad);
    $this->db->where('id_nacionalidad',$id);
    $this->db->update('nacionalidad',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_nacionalidad',$id);
    $this->db->update('nacionalidad',$elimi);
   }
   }
 ?>