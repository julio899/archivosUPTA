<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {

	public function index()
	{

				$GLOBALS=array();
				$GLOBALS['pagina_contactos'] = 1;
				$this->load->view('cabecera');
				$this->load->view('contenido_contactos');
				$this->load->view('pie_pagina');
	}

}/*fin de clase*/