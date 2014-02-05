<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {
public $contenidos;
public $emails;
	public function index()
	{
		super();

	}

	public function obtener_noticias()
	{
			//Busco las 10 Ultimas Noticias
			$query=$this->db->query("SELECT `noticias`.`id` ,  `noticias`.`titulo` ,  `noticias`.`descripcion` ,  `noticias`.`fecha` ,  `noticias`.`status` ,  `noticias`.`tipo` ,  `cuentas`.`idu` ,  `cuentas`.`usuario` , `cuentas`.`nombre` ,  `cuentas`.`apellido` FROM  `noticias` ,  `cuentas` WHERE  `noticias`.`idu` LIKE  `cuentas`.`idu` ORDER BY `noticias`.`fecha` DESC LIMIT 0 , 30");
		 	$noticias=array();
			
				foreach ($query->result() as $row)
				{
				   $noticias[]=array('id'=>$row->id,'titulo'=>utf8_encode($row->titulo),'descripcion'=>utf8_encode($row->descripcion),'fecha'=>$row->fecha,'status'=>$row->status,'tipo'=>$row->tipo,'idu'=>$row->idu,'usuario'=>utf8_decode($row->usuario),'nombre'=>utf8_decode($row->nombre),'apellido'=>utf8_decode($row->apellido));
				}

			return $noticias;
	}/*Fin de la funcion obtener noticias*/

public function contenidos_docente($id){
	$query=$this->db->query("SELECT * FROM `contenidos` WHERE `idu`=$id ORDER BY  `contenidos`.`fecha` DESC");
	$data_contenidos=array();
	foreach ($query->result() as $row) {
		$data_contenidos[]=array('id' => $row->id,'titulo' => $row->titulo,'contenido' => $row->contenido,'fecha' => $row->fecha,'nombre_archivo' => $row->nombre_archivo,'status' => $row->status);
	}
return $data_contenidos;
}/*fin del la funcion de contenidos docente*/

public function contenido_docente($ids){
	$query=$this->db->query("SELECT * FROM `contenidos` WHERE `idu`=".$ids['id_docente']." AND `id`=".$ids['id_contenido']." LIMIT 1");
	$data_contenidos=array();
	foreach ($query->result() as $row) {
		$data_contenidos[]=array('id' => $row->id,'titulo' => $row->titulo,'contenido' => $row->contenido,'fecha' => $row->fecha,'nombre_archivo' => $row->nombre_archivo,'status' => $row->status);
	}
return $data_contenidos;
}// un solo contenido
	public function obtener_comentarios_contenido($id)
	{
			//Busco los comentarios para esta publicacion
			$query=$this->db->query("SELECT `uptafile_app`.`cometarios_contenidos`.`id`,`uptafile_app`.`cometarios_contenidos`.`id_contenido`,`uptafile_app`.`cometarios_contenidos`.`fecha`,`uptafile_app`.`cometarios_contenidos`.`status`,`uptafile_app`.`cometarios_contenidos`.`comentario`,`uptafile_app`.`cuentas`.`usuario`,`uptafile_app`.`cuentas`.`nombre`,`uptafile_app`.`cuentas`.`apellido`,`uptafile_app`.`cuentas`.`email`,`uptafile_app`.`cuentas`.`tipo`
FROM  `uptafile_app`.`cometarios_contenidos` ,  `uptafile_app`.`cuentas` 
WHERE  `uptafile_app`.`cometarios_contenidos`.`id_contenido` =$id
AND  `uptafile_app`.`cuentas`.`idu` =  `uptafile_app`.`cometarios_contenidos`.`id_usuario` LIMIT 50");
		 	$comentarios=array();
			
				foreach ($query->result() as $row)
				{
				   $comentarios[]=array('id'=>$row->id,'id_contenido'=>$row->id_contenido,'usuario'=>$row->usuario,'nombre_apellido'=>$row->nombre." ".$row->apellido,'email'=>$row->email,'tipo'=>$row->tipo,'fecha'=>$row->fecha,'status'=>$row->status,'comentario'=>$row->comentario);
				}

			return $comentarios;
	}/*Fin de la funcion obtener comentarios*/

	public function insertar_comentario_contenido($data=''){
		//INSERT INTO `uptafile_app`.`cometarios_contenidos` (`id`, `id_contenido`, `id_usuario`, `comentario`, `fecha`, `status`) VALUES (NULL, '1', '1', 'algo de texto', NOW(), 'enviado');

		if($this->db->query("INSERT INTO `uptafile_app`.`cometarios_contenidos` (`id`, `id_contenido`, `id_usuario`, `comentario`, `fecha`, `status`) VALUES (NULL, '".$data['idc']."', '".$data['idu']."', '".$this->limpiarTodoEnCampo(mysql_real_escape_string($data['comentario']))."', NOW(), 'enviado')")){
			return 1;
		}else{
			return 0;
		}
	}
	public function registrar_docente($datos=''){

		$usu=explode("@", $datos['correo']);
		
		if($this->db->query("INSERT INTO `uptafile_app`.`cuentas` (`idu`, `usuario`, `clave`, `nombre`, `apellido`, `trayecto`, `seccion`, `turno`, `fecha`, `tipo`, `email`) VALUES (NULL, '".$usu[0]."', '".sha1($datos['pass'])."', '".$datos['nombre']."', '".$datos['apellido']."', '', '', '', NOW(), 'D', '".$datos['correo']."');")){
			return 1;
		}else{
			return 0;
		}
	}

public function actualizar_datos_docente($data=''){
	//UPDATE  `uptafile_app`.`cuentas` SET  `nombre` =  'Julio Cesarr',`apellido` =  'Vinachii',`email` =  'julio899@hotmail.com' WHERE  `cuentas`.`idu` =6;
		if($this->db->query("UPDATE  `uptafile_app`.`cuentas` SET  `nombre` =  '".$data['nombre']."',`apellido` =  '".$data['apellido']."',`email` =  '".$data['email']."' WHERE  `cuentas`.`idu` =".$data['idu'])){
			return 1;
		}else{
			return 0;
		}
	}
public function actualizar_contenido_docente($data=''){
		if($this->db->query("UPDATE  `uptafile_app`.`contenidos` SET  `titulo` =  '".$data['data']['titulo']."',`contenido` =  '".$data['data']['contenido']."' WHERE  `contenidos`.`id` =".$data['data']['id_contenido'])){
			return 1;
		}else{
			return 0;
		}
	}

public function obtener_email_full()
{
	$query=$this->db->query("SELECT `email` FROM  `cuentas`");
		foreach ($query->result() as $columna )
		{
			$emails[]=$columna->email;
		}
	return $emails;
}/*Fin de obtener_email_full*/

public function obtener_email_estudiantes(){
	$query=$this->db->query("SELECT  `email` FROM  `cuentas` WHERE  `tipo` LIKE  'E'");
	foreach ($query->result() as $columna ) {
		$emails[]=$columna->email;
	}
	return $emails;
}


public function obtener_email_estudiantes_trayecto($t){
	$query=$this->db->query("SELECT  `email` FROM  `cuentas` WHERE  `tipo` LIKE  'E' AND `trayecto` LIKE '$t'");
	foreach ($query->result() as $columna ) {
		$this->emails[]=$columna->email;
	}
	return $this->emails;
}


public function insertar_noticia($datos){
		if($this->db->query("INSERT INTO `uptafile_app`.`noticias` ( `id` , `idu` , `titulo` , `descripcion` , `fecha` , `status` , `tipo` ) VALUES ( NULL , '".$datos['idu']."', '".$datos['titulo']."', '".$datos['descripcion']."', NOW( ) , 'A', 'N' )")){
			return 1;
		}else{
			return 0;
		}

}/*Fin de insertar noticia*/
public function insertar_contenido($datos){
	if($this->db->query("INSERT INTO  `uptafile_app`.`contenidos` ( `id` , `idu` , `titulo` , `contenido` , `fecha` , `nombre_archivo` , `status`) VALUES ( NULL,  '".$datos['idu']."',  '".$datos['titulo']."',  '".$datos['contenido']."', NOW( ) ,  '".$datos['archivo']."',  'A');")){
		return 1;
	}else{
		return 0;
	}

}/*Fin de la funcion para insertar el contenido en la bd*/

public function nombre_apellido($idu){
	$query=$this->db->query("SELECT  `nombre` ,  `apellido` FROM  `cuentas` WHERE  `idu` LIKE  '$idu' LIMIT 1");
		foreach ($query->result() as $columna ) {
		$nombre_apellido=array('nombre'=>$columna->nombre,'apellido'=>$columna->apellido);
	}
	if(isset($nombre_apellido)){

		return $nombre_apellido;
	}else{
		return -1;
	}
}

public function obtener_contenidos()
{
	$query=$this->db->query("SELECT * FROM  `contenidos` ORDER BY  `contenidos`.`fecha` DESC LIMIT 5");
		foreach ($query->result() as $columna ) 
		{
			$nom_ape=$this->nombre_apellido($columna->idu);
			$this->contenidos[]=array('id'=>$columna->id,'autor'=>$nom_ape['nombre']." ".$nom_ape['apellido'],'titulo'=>$columna->titulo,'contenido'=>$columna->contenido,'fecha'=>$columna->fecha);
		}
	return $this->contenidos;
}

public function obtener_contenido_id($id)
{
	$query=$this->db->query("SELECT * FROM  `contenidos` WHERE `id`=$id");
		foreach ($query->result() as $columna ) 
		{
			$this->contenidos[]=array('id'=>$columna->id,'idu'=>$columna->idu,'titulo'=>$columna->titulo,'contenido'=>$columna->contenido,'fecha'=>$columna->fecha,'nombre_archivo'=>$columna->nombre_archivo);
		}
	return $this->contenidos;
}

public function limpiarTodoEnCampo($input) {
 
  $search = array(
    '@<script [^>]*?>.*?@si',            // Strip out javascript
    '@< [/!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style [^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@< ![sS]*?--[ tnr]*>@'         // Strip multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
}

}//fin de clase data
