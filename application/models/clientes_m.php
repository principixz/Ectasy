<?php

class Clientes_m extends CI_Model {

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

     public function clientesm($id){
        $this->db->select("*");
        $this->db->from("editar_cliente");
        $this->db->where("id_cliente",$id);

        $r = $this->db->get();   
        return $r->result();
     }

    public function sangre(){
        $r= $this->db->get_where("grupo_sanguineo",array('estado' => "1"));
        return $r->result();
    }
    public function civil(){
        $r= $this->db->get_where("estado_civil",array('estado' => "1"));
        return $r->result();
    }

    public function grado(){
        $r= $this->db->get_where("grado_estudio",array('estado' => "1"));
        return $r->result();
    }
    public function guardar_cliente(){
        $data =array('nombre' => $this->input->post("nombre"),
        'apellido_materno' => $this->input->post("materno"),
        'apellido_paterno' => $this->input->post("paterno"),
        'email' => $this->input->post("email"),
        'estado' => '1',
        'telefono' => $this->input->post("fijo"),
        'celular' => $this->input->post("celular"),
        'direccion' => $this->input->post("direccion"),
        'id_ubigeo' => $this->input->post("distrito"),
        'fecha_nacimiento' => $this->input->post("fecha"),
        'id_sexo' => $this->input->post("sexo"),
        'rango_ingreso' => $this->input->post("rango"),
        'id_gruposanguineo' => $this->input->post("sangre"),
        'id_estadocivil' => $this->input->post("estadoc"),

        'numero_emergencia' => $this->input->post("emergencia"),
        'alergias' => $this->input->post("alergias"),
        'seguro_medico' => $this->input->post("segurom"),
        'ocupacion' => $this->input->post("ocupacion"),
        'enfermedad' => $this->input->post("enfermedad"),
        'medicamento' => $this->input->post("medicamento"),
        'id_gradoestudio' => $this->input->post("grado"),
        'alias' => $this->input->post("alias"),
        'hobby' => $this->input->post("hobby"),

        'id_tipo_documento' => $this->input->post("tipo_documento"),
        'nro_documento' =>$this->input->post("documento"),
        'numero_hijo' => $this->input->post("hijos"),
        'hobby' => $this->input->post("hobby"),
        'id_perfil_usuario' => $this->input->post("tipo_empleado"));    
        $r = $this->db->insert("cliente",$data);
        return $r;
    }

    public function actualizar_cliente(){
        $data =array('nombre' => $this->input->post("nombre"),
        'apellido_materno' => $this->input->post("materno"),
        'apellido_paterno' => $this->input->post("paterno"),
        'email' => $this->input->post("email"),
        'estado' => '1',
        'telefono' => $this->input->post("fijo"),
        'celular' => $this->input->post("celular"),
        'direccion' => $this->input->post("direccion"),
        'id_ubigeo' => $this->input->post("distrito"),
        'fecha_nacimiento' => $this->input->post("fecha"),
        'id_sexo' => $this->input->post("sexo"),
        'rango_ingreso' => $this->input->post("rango"),
        'id_gruposanguineo' => $this->input->post("sangre"),
        'id_estadocivil' => $this->input->post("estadoc"),

        'numero_emergencia' => $this->input->post("emergencia"),
        'alergias' => $this->input->post("alergias"),
        'seguro_medico' => $this->input->post("segurom"),
        'ocupacion' => $this->input->post("ocupacion"),
        'enfermedad' => $this->input->post("enfermedad"),
        'medicamento' => $this->input->post("medicamento"),
        'id_gradoestudio' => $this->input->post("grado"),
        'alias' => $this->input->post("alias"),
        'hobby' => $this->input->post("hobby"),       
        'numero_hijo' => $this->input->post("hijos"),
        'hobby' => $this->input->post("hobby"),
        'id_perfil_usuario' => $this->input->post("tipo_empleado")); 
        $this->db->where('nro_documento',$this->input->post("documento"));
        $r = $this->db->update('cliente',$data);
        return $r;
    }

    public function todos(){
        $this->db->where("estado","1");
       $this->db->order_by("id_cliente","desc");
       $r = $this->db->get("cliente");
       return $r->result();
    }
 

}
?>