<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contenido extends CI_Controller {
	public function index()
	{

	}
	public function captcha()
	{
$this->limpiar();

$dir=base_url().'captcha2/';
$config['image_library'] = 'gd2';
$config['source_image'] = './captcha2/cap.jpg';
$config['create_thumb'] = TRUE;
$config['maintain_ratio'] = TRUE;
$config['width'] = 50;
$config['height'] = 50;

		$this->load->library('image_lib',$config);

		$this->load->helper('captcha');
		$this->load->helper('url');
		$this->load->helper('string');
		$tres_letras=substr(random_string('alpha'), 0,4);
		$tres_numeros=substr(random_string('nozero'), 0,3);
		$aleatoreo=$tres_letras.$tres_numeros;
		$this->session->set_userdata('captcha',$aleatoreo);
		$vals = array(
    'word' => $aleatoreo,
    'img_path' => './captcha2/',
    'img_url' => $dir,
    'font_path' => './font/mon.ttf',
    'img_width' => '150',
    'img_height' => 30,
    'expiration' => 7200
    );

$cap = create_captcha($vals);
return $cap['image'];

	}

public function limpiar(){
		$directorio = "./captcha2/"; 
		$handle = opendir($directorio); 

		while ($file = readdir($handle))  
			{  
				 if (is_file($directorio.$file)) { 
				 	//unlink($dir.$file); 
				 	$ext_nom=explode(".", $file);
				 		//echo "partes:".count($ext_nom)." nombre archivo:".$file." extesion:".$ext_nom[count($ext_nom)-1]."<br>";				 	
				 	if(strtolower($ext_nom[count($ext_nom)-1])=="jpg"){
				 		//unlink($directorio.$file); 
				 		$fecha_hoy = strtotime('now');
				 		$fecha_captcha=date("d-m-Y H:i",filectime($directorio.$file));
				 		$hoy= date("d-m-Y H:i",$fecha_hoy);
				 		//echo $hoy." - Arch:".$fecha_captcha;
				 		//var_dump($hoy > $fecha_captcha);
				 		if($hoy==$fecha_captcha){
				 			//si las captchas son del dia de hoy y del ultimo minuto no los borramos 
				 		}else{
				 			unlink($directorio.$file); 
				 		}
				 		//echo "<br>Fecha de mod:".date("F d Y H:i:s",filectime($directorio.$file))."<br>";
				 	}//fin de if (si es un archivo jpg)
				 }
			}
}//fin de la funsion limpiar cap

public function EnviarComentario(){

		$this->load->helper(array('form'));
		$this->load->library('form_validation');
			//primero cargamos los contenidos para mandarselos a la vista
			$this->load->model('data');
			$this->load->helper('text');
				$GLOBALS=array();
		$this->form_validation->set_rules('comentario', 'Comentario', 'trim|required|min_length[5]|max_length[2500]|xss_clean');
		$this->form_validation->set_rules('captcha', 'Codigo de Seguridad', 'trim|required|min_length[7]|max_length[7]|xss_clean');
		if(strtoupper($this->session->userdata('captcha'))==strtoupper($this->input->post('captcha'))){

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('cabecera');
			$error=array('contenidos'=>$this->data->obtener_contenidos(),'error'=>validation_errors());
			$this->load->view('contenido2',$error);
			/*
			echo "<div id=\"contenido\" class=\"container\">";
			echo "<pre>Falto informacion para poderse registrar</pre><div class=\"alert alert-error\">";
			echo validation_errors();
			echo "</div></div>"; */

			$this->load->view('pie_pagina');

		}else{
			$this->load->model('data');
			//$comentario = filter_var($this->input->post('comentario'),FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
			$comentario = filter_var($this->input->post('comentario'),FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES | FILTER_FLAG_ENCODE_AMP);
			/*
			$comentario = preg_replace('*', ' ',$this->input->post('comentario'));
			$comentario = preg_replace(')', ' ',$comentario);
			$comentario = preg_replace('(', ' ',$comentario);
			$comentario = preg_replace(';', ' ',$comentario);
			$comentario = preg_replace('`', ' ',$comentario);*/
			$datos_usuario=$this->session->userdata('datos_usuario');
			$id_contenido=$this->session->userdata('contenido_seleccionado');
			$data=array('idu'=>$datos_usuario['idu'],'idc'=>$id_contenido,'comentario'=>$comentario);

			/*var_dump($comentario);
			echo "<br><hr>";
			var_dump($datos_usuario);
			echo "<br><hr>";
			var_dump($id_contenido);*/
			//
			//var_dump($this->data->insertar_comentario_contenido($data));

			//si devuelve el valor 1 nos inserto el comentario
			if($this->data->insertar_comentario_contenido($data)==1){
				 redirect('/contenido/verContenido/'.$id_contenido, 'refresh');					
				}else{
					// en caso que no nos haya insertado el comentario
					
					}/*fin del else sino inserto el comentario*/



		}

		}else{
			//F:".$this->input->post('captcha')."-sess".$this->session->userdata("captcha")."
			$error=array('error'=>"el codigo de la captcha (CODDIGO DE SEGURIDAD) que ingreso no coinside");
			$this->load->model('data');
			$this->load->view('cabecera');
				$contenidos=array('contenidos'=>$this->data->obtener_contenidos(),'error'=>$error);

				$GLOBALS=array();
				$GLOBALS['pagina_inicio'] = 1;
			$this->load->view('contenido2',$contenidos);
			$this->load->view('pie_pagina');

		}//fin de else en caso que la captcha no coincida
}

	public function verContenido($x=''){
		$this->load->model('data');
		$this->load->view('cabecera');
		$this->session->set_userdata('contenido_seleccionado',$x);
		$publicacion=$this->data->obtener_contenido_id($x);
		$full_name=$this->data->nombre_apellido($publicacion[0]['idu']);
		$comentarios=$this->data->obtener_comentarios_contenido($x);
		$data=array('publicacion'=>$publicacion,'autor'=>$full_name,'comentarios'=>$comentarios,'captcha'=>$this->captcha());
		if($full_name==-1){	
			$this->load->view('errores/error_404.php');
			
		}else{
			$this->load->view('detallar_contenido',$data);
		}
		$this->load->view('pie_pagina');
	}
}
