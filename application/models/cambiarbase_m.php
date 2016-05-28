<?php
class Cambiarbase_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    public function datos(){
    	@$ini_array = parse_ini_file("application/config/config.txt");
    	return $ini_array;
    }

    public function modificar($host,$usuario,$clave,$basedatos,$driver,$gestor)
   {
   	$link='application/config/config.txt';
   	unlink($link);
if ((strlen($host)>0) && (strlen($usuario)>0) && (strlen($basedatos)>0) && (strlen($driver)>0)) {
    $file=fopen("application/config/config.txt","a");   //fopen intenta abrir el archivo 'fichero.txt' con permisos de lectura y escritura, y con el parametro 'a' si no existe lo crea
    $linea ="[database]\r\n";
    $cad= $linea ;
    fputs($file,$cad);

    $linea ="host =";
    $cad=$host;
    $cad =$linea."$cad"."\r\n";
    $cad= $cad;
    fputs($file,$cad);

    $linea ="driver =";
    $cad=$driver;
    $cad =$linea."$cad"."\r\n";
    $cad= $cad;
    fputs($file,$cad);

    $linea ="usuario =";
    $cad=$usuario;
    $cad =$linea."$cad"."\r\n";
    $cad= $cad;
    fputs($file,$cad);

    $linea ="password =";
    $cad=$clave;
    $cad =$linea."$cad"."\r\n";
    $cad= $cad;
    fputs($file,$cad);

    $linea ="basedatos =";
    $cad=$basedatos;
    $cad =$linea."$cad"."\r\n";
    $cad= $cad;
    fputs($file,$cad);

    $linea ="gestor =";
    $cad=$gestor;
    $cad =$linea."$cad"."\r\n";
    $cad= $cad;
    fputs($file,$cad);
    header('Location:http://localhost:8080/ecstasyd/Cambiarbase_c');
} else {
    echo "Algún campo del formulario esta vacio.";
}
ob_end_flush();
   }

}
 ?>