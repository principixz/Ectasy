<?php

class Permisos_m extends CI_Model {

   	public function __construct()
    {
        parent::__construct();

    }

    public function traer_permisos($idperfil)
    {
    	$this->db->select("h.id_modulo as idpadre, h.nombre as padre, pa.nombre as hijo, pa.id_modulo as idhijo, h.icono as icono, pa.url, p.estado");
    	$this->db->from("modulo as h");
    	$this->db->join("modulo as pa","h.id_modulo=pa.id_padre");
    	$this->db->join("permisos as p","p.id_modulo=pa.id_modulo");
    	$this->db->join("perfil_usuario as pu","pu.id_perfil_usuario=p.id_perfil_usuario");
    	$this->db->where("pu.id_perfil_usuario",$idperfil);
    	$this->db->where("p.estado","1");
    	$this->db->order_by("h.id_modulo","asc");
    	$r = $this->db->get();
    	return $r->result();
    }

     public function traer_modulos()
    {
    	$this->db->select("h.id_modulo as idpadre, h.nombre as padre, pa.nombre as hijo, pa.id_modulo as idhijo, h.icono as icono, pa.url,pa.estado");
    	$this->db->from("modulo as h");
    	$this->db->join("modulo as pa","h.id_modulo=pa.id_padre");
    	$this->db->where("pa.estado","1");
    	$this->db->order_by("h.id_modulo","asc");

    	$r = $this->db->get();
    	return $r->result();
    }


    public function traer_perfiles()
    {

    	$r = $this->db->get_where("perfil_usuario",array("estado"=>"1"));
    	return $r->result();
    }

    public function insertar()
    {
    	if(isset($_POST["modulos"]))
    	{
    		$idmodulos = $_POST["modulos"];
    	}
    	else
    	{
    		$idmodulos = array();
    	}


    	$this->db->where("id_perfil_usuario",$this->input->post("idperfil"));
    	$res = $this->db->delete("permisos");

    	for($i=0 ; $i<count($idmodulos) ; $i++)
    	{
    		$datos = array(
    			"id_perfil_usuario" => $this->input->post("idperfil"),
		 		"estado" => "1",
		 		"id_modulo" => $idmodulos[$i]
		 	);

		 	$r = $this->db->insert("permisos",$datos);

    	}

		if(isset($r) || isset($res))
	 	{
	 		return true;
	 	}
	 	elseif(!isset($r)&&!isset($res))
	 	{
	 		return false;
	 	}

    }





}
?>