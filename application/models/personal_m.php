<?php

class Personal_m extends CI_Model {

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

     public function modificar($id){
        $this->db->select("empleado.nombre,tipo_documento.descripcion as dni,grupo_sanguineo.descripcion as sangre,nacionalidad.descripcion as nacion,
        sexo.descripcion as sexo,tipo_vivienda.descripcion as vivienda,grado_estudio.descripcion as grado,empleado.apellido_paterno,
        empleado.apellido_materno,empleado.email,empleado.telefono,empleado.direccion,empleado.celular,empleado.fecha_nacimiento,
        empleado.hobby, empleado.numero_hijo,perfil_usuario.descripcion as tipo_perfil, tipo_documento.id_tipodocumento,empleado.nro_documento,
        grupo_sanguineo.id_gruposanguineo, sexo.id_sexo,tipo_vivienda.id_tipovivienda, empleado.id_empleado,grado_estudio.id_gradoestudio,
        ubigeo.Provincia,ubigeo.Distrito,ubigeo.Departamento,ubigeo.id_ubigeo,perfil_usuario.id_perfil_usuario");
        $this->db->from("tipo_documento");
        $this->db->join("empleado"," empleado.id_tipo_documento = tipo_documento.id_tipodocumento");
        $this->db->join("ubigeo"," empleado.idubigeo = ubigeo.id_ubigeo");
        $this->db->join("perfil_usuario","empleado.id_perfil_usuario = perfil_usuario.id_perfil_usuario");
        $this->db->join("sexo","empleado.id_sexo = sexo.id_sexo");
        $this->db->join("grupo_sanguineo","empleado.id_gruposanguineo = grupo_sanguineo.id_gruposanguineo",'left');
        $this->db->join("nacionalidad","empleado.id_nacionalidad = nacionalidad.id_nacionalidad",'left');
        $this->db->join("tipo_vivienda","empleado.id_tipovivienda = tipo_vivienda.id_tipovivienda",'left');
        $this->db->join("grado_estudio","empleado.id_gradoestudio = grado_estudio.id_gradoestudio",'left');
        $this->db->where("id_empleado",$id);

        $r = $this->db->get();   
        return $r->result();
     }

    public function sexo(){
        $r= $this->db->get_where("sexo",array('estado' => "1"));
        return $r->result();
    }

    public function documento(){
        $r= $this->db->get_where("tipo_documento",array('estado' => "1"));
        return $r->result();
    }
    public function empleado(){
        $r= $this->db->get_where("perfil_usuario",array('estado' => "1"));
        return $r->result();
    }
     public function grado(){
        $r= $this->db->get_where("grado_estudio",array('estado' => "1"));
        return $r->result();
    }
    public function registrar_empleado(){
        $data =array('nombre' => $this->input->post("nombre"),
        'apellido_materno' => $this->input->post("materno"),
        'apellido_paterno' => $this->input->post("paterno"),
        'email' => $this->input->post("email"),
        'estado' => '1',
        'telefono' => $this->input->post("fijo"),
        'celular' => $this->input->post("celular"),
        'direccion' => $this->input->post("direccion"),
        'idubigeo' => $this->input->post("distrito"),
        'fecha_nacimiento' => $this->input->post("fecha"),
        'id_sexo' => $this->input->post("sexo"),
        'id_tipo_documento' => $this->input->post("tipo_documento"),
        'nro_documento' =>$this->input->post("documento"),
        'numero_hijo' => $this->input->post("hijos"),
        'hobby' => $this->input->post("hobby"),
        'id_perfil_usuario' => $this->input->post("tipo_empleado"));
        $r = $this->db->insert("empleado",$data);
        return $r;
    }

    public function actualizar_empleado(){
           $data =array('nombre' => $this->input->post("nombre"),
        'apellido_materno' => $this->input->post("materno"),
        'apellido_paterno' => $this->input->post("paterno"),
        'email' => $this->input->post("email"),
        'fecha_nacimiento' => $this->input->post("fecha"),
        'estado' => '1',
        'telefono' => $this->input->post("fijo"),
        'celular' => $this->input->post("celular"),
        'direccion' => $this->input->post("direccion"),
        'idubigeo' => $this->input->post("distrito"),
        'fecha_nacimiento' => $this->input->post("fecha"),
        'id_sexo' => $this->input->post("sexo"),
        'id_tipo_documento' => $this->input->post("tipo_documento"),
        'numero_hijo' => $this->input->post("hijos"),
        'hobby' => $this->input->post("hobby"),
        'id_perfil_usuario' => $this->input->post("tipo_empleado"));
         $this->db->where('nro_documento',$this->input->post("documento"));
        $r= $this->db->update('empleado',$data);
        return $r;

    }

    public function departamento(){
        $this->db->select("Departamento");
        $this->db->from("ubigeo");
        $this->db->where(array('estado' => "1"));
        $this->db->group_by("Departamento");
        $r= $this->db->get();
        return $r->result();
    }
    public function provincia($departamento){
        $this->db->select("Provincia");
        $this->db->from("ubigeo");
        $this->db->where(array('estado' => "1",'Departamento'=>$departamento));
        $this->db->where('Distrito != ""');
        $this->db->group_by("Provincia");
        $r= $this->db->get();
        return $r->result();
    }
    public function distrito($departamento){
        $this->db->select("Distrito,id_ubigeo");
        $this->db->from("ubigeo");
        $this->db->where(array('estado' => "1",'Provincia'=>$departamento));
        $this->db->where('Distrito != ""');
        $this->db->group_by("Distrito");
        $r= $this->db->get();
        return $r->result();
    }

    public function todos()
    {
       $this->db->where("estado","1");
       $this->db->order_by("id_empleado","desc");
       $r = $this->db->get("empleado");
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