<?php

class Perfiles_m extends CI_Model {

   	public function __construct()
    {
        parent::__construct();

    }

    public function guardar_perfil()
    {


        $datos = array(

            "descripcion" => $this->input->post("descripcion"),
            "estado" => "1"
            );

        $r = $this->db->insert("perfil_usuario",$datos);
        return $r;
    }

    public function modificar_perfil()
    {


        $datos = array(
            "descripcion" => $this->input->post("descripcion")
            );

        $this->db->where("id_perfil_usuario",$this->input->post("idperfil"));
        $r = $this->db->update("perfil_usuario",$datos);
        return $r;
    }

    public function todos()
    {
       $this->db->where("estado","1");
       $this->db->order_by("id_perfil_usuario","desc");
       $r = $this->db->get("perfil_usuario");
       return $r->result();
    }

    public function eliminar_perfil()
    {
       $datos = array(
            "estado" => "0"
            );

        $this->db->where("id_perfil_usuario",$this->input->post("idperfil"));
        $r = $this->db->update("perfil_usuario",$datos);
        return $r;
    }

}
?>