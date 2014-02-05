<?php
class Errors extends CI_Controller
{
	private $data = array();
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
	}
 
	function error_404()
	{
        //Esta es la vista que muestra el error 404 personalizado
		$this->load->view('cabecera');
		$this->load->view('errores/error_404');
		$this->load->view('pie_pagina');
	}
}
?>