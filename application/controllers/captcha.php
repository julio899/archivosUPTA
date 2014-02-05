<?php
class Captcha extends CI_Controller {

	public function index()
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
echo $cap['image'];

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

}/*Fin de la clase*/