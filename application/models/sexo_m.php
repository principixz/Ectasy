<?php
class Sexo_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("sexo",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($sexo)
   {
    echo $sexo;
    $data = $this->db->Insert("sexo",array('descripcion'=>$sexo,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("sexo",array('id_sexo'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$sexo){
    $actualizar =array('descripcion' => $sexo);
    $this->db->where('id_sexo',$id);
    $this->db->update('sexo',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_sexo',$id);
    $this->db->update('sexo',$elimi);
   }
   }
 ?>