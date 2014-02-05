<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {
	public $respuesta;
	public function index(){
				$pagina_noticias=1;
				defined('pagina_noticias');
				$GLOBALS['pagina_noticias'] = 1;
				$this->load->view('cabecera');
				$this->load->model('data');
				$notcias=array('noticias'=>$this->data->obtener_noticias());
				$this->load->view('contenido_noticias',$notcias);
				$this->load->view('pie_pagina');
	}

	public function todas(){
				$GLOBALS=array();
				$GLOBALS['pagina_noticias'] = 1;
				$this->load->model('data');
				$this->respuesta=$this->data->obtener_noticias();
				var_dump($this->respuesta);
	}
	/*
		INSERT INTO  `ktuxcaco_upta`.`noticias` (
 `id` ,
 `idu` ,
 `titulo` ,
 `descripcion` ,
 `fecha` ,
 `status` ,
 `tipo`
)
VALUES (
NULL ,  '1',  'tercera informacion',  'esta es la 3.', NOW( ) ,  'A',  'N'
);

	*/
}