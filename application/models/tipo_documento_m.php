<?php
class Tipo_documento_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("tipo_documento",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($tipo_documento)
   {
    echo $tipo_documento;
    $data = $this->db->Insert("tipo_documento",array('descripcion'=>$tipo_documento,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("tipo_documento",array('id_tipodocumento'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$tipodocumento){
    $actualizar =array('descripcion' => $tipodocumento);
    $this->db->where('id_tipodocumento',$id);
    $this->db->update('tipo_documento',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_tipodocumento',$id);
    $this->db->update('tipo_documento',$elimi);
   }
   }
 ?>