<?php
class Categoria_ejercicios_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function mostrar()
   {
    $r = $this->db->get_where("categoria_ejercicio",array('estado'=>'1'));
        
    return $r->result();
   }

 public function agregar($categoria_ejercicio)
   {
    echo $categoria_ejercicio;
    $data = $this->db->Insert("categoria_ejercicio",array('descripcion'=>$categoria_ejercicio,'estado'=>'1'));
   }

   public function seleditar($id){
    $seleditar = $this->db->get_where("categoria_ejercicio",array('id_categoria_ejercicio'=>$id));
    return $seleditar->result();
   }

 public function modificar($id,$categoria_ejercicio){
    $actualizar =array('descripcion' => $categoria_ejercicio);
    $this->db->where('id_categoria_ejercicio',$id);
    $this->db->update('categoria_ejercicio',$actualizar);
   }

   public function eliminar($id){
    $elimi =array('estado' => 0);
    $this->db->where('id_categoria_ejercicio',$id);
    $this->db->update('categoria_ejercicio',$elimi);
   }
   }
 ?>