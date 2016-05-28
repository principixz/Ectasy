<?php
class Grupo_sanguineo_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("grupo_sanguineo",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($grupo_sanguineo)
   {
    echo $grupo_sanguineo;
    $data = $this->db->Insert("grupo_sanguineo",array('descripcion'=>$grupo_sanguineo,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("grupo_sanguineo",array('id_gruposanguineo'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$grupo_sanguineo){
    $actualizar =array('descripcion' => $grupo_sanguineo);
    $this->db->where('id_gruposanguineo',$id);
    $this->db->update('grupo_sanguineo',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_gruposanguineo',$id);
    $this->db->update('grupo_sanguineo',$elimi);
   }
   }
 ?>