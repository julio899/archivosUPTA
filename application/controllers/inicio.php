<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->model('data');
		$this->load->helper('text');
		
		$contenidos=array('contenidos'=>$this->data->obtener_contenidos());

				$GLOBALS=array();
				$GLOBALS['pagina_inicio'] = 1;
		$this->load->view('cabecera');
		$this->load->view('contenido2',$contenidos);
    	$this->load->view('pie_pagina');
	}



	public function error()
	{
		$e=$this->session->userdata('error');
		$error=array('error' => $e);
		$this->load->view('cabecera');
		$this->load->view('contenido2',$error);
		$this->load->view('pie_pagina');
	}
}
