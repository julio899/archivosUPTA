<?php 
class Recapcha extends CI_Controller {
	public function index()
	{	
		require_once(base_url().'captcha/recaptchalib.php');
		echo base_url().'captcha/recaptchalib.php';
		$publickey = "6LcTKOoSAAAAAIwa_LUjaiqA3VJs8jIWju_o9M0Q"; // you got this from the signup page
  		echo recaptcha_get_html($publickey);
	}//fin de la funcion index

}/*Fin de Clase*/