<?php
class Tipo_empleado_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("tipo_empleado",array('estado'=>'1'));
    return $r->result();
   }

 public function agregar($tipo_empleado)
   {
    echo $tipo_empleado;
    $data = $this->db->Insert("tipo_empleado",array('descripcion'=>$tipo_empleado,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("tipo_empleado",array('id_tipoempleado'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$tipo_empleado){
    $actualizar =array('descripcion' => $tipo_empleado);
    $this->db->where('id_tipoempleado',$id);
    $this->db->update('tipo_empleado',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_tipoempleado',$id);
    $this->db->update('tipo_empleado',$elimi);
   }
   }
 ?>