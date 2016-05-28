<?php
class Grado_estudio_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("grado_estudio",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($grado_estudio)
   {
    echo $grado_estudio;
    $data = $this->db->Insert("grado_estudio",array('descripcion'=>$grado_estudio,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("grado_estudio",array('id_gradoestudio'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$grado_estudio){
    $actualizar =array('descripcion' => $grado_estudio);
    $this->db->where('id_gradoestudio',$id);
    $this->db->update('grado_estudio',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_gradoestudio',$id);
    $this->db->update('grado_estudio',$elimi);
   }
   }
 ?>