<?php
class Tipo_vivienda_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("tipo_vivienda",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($tipo_vivienda)
   {
    echo $tipo_vivienda;
    $data = $this->db->Insert("tipo_vivienda",array('descripcion'=>$tipo_vivienda,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("tipo_vivienda",array('id_tipovivienda'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$tipo_vivienda){
    $actualizar =array('descripcion' => $tipo_vivienda);
    $this->db->where('id_tipovivienda',$id);
    $this->db->update('tipo_vivienda',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_tipovivienda',$id);
    $this->db->update('tipo_vivienda',$elimi);
   }
   }
 ?>