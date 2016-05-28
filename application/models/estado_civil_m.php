<?php
class Estado_civil_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("estado_civil",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($estado_civil)
   {
    echo $estado_civil;
    $data = $this->db->Insert("estado_civil",array('descripcion'=>$estado_civil,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("estado_civil",array('id_estadocivil'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$estado_civil){
    $actualizar =array('descripcion' => $estado_civil);
    $this->db->where('id_estadocivil',$id);
    $this->db->update('estado_civil',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_estadocivil',$id);
    $this->db->update('estado_civil',$elimi);
   }
   }
 ?>