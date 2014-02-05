<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Probador extends CI_Controller {

	public function index(){
		$this->load->model('data');
		var_dump($this->data->obtener_comentarios_contenido(25));
			echo "<hr><br>Probador";
	
	}
	public function test(){
	}

}