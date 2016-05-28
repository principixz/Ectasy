<?php
class Servicio_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("servicio",array('estado'=>'1'));

    return $r->result();
   }

    public function agregar($tiposocio)
   {
    echo $tiposocio;
    $data = $this->db->Insert("servicio",array('descripcion'=>$tiposocio,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("servicio",array('id_servicio'=>$id));
    return $seleditar->result();
   }

   public function modificar($id,$tipo_socio){
    $actualizar =array('descripcion' => $tipo_socio);
    $this->db->where('id_servicio',$id);
    $this->db->update('servicio',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_servicio',$id);
    $this->db->update('servicio',$elimi);
   }

}
 ?>