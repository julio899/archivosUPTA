<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estudiante extends CI_Controller {

	public function index()
	{
		redirect();
		/*
		echo "Datos de la cuenta del Estudiante<br><pre>";
		var_dump($this->session->userdata('datos_usuario'));
		echo "</pre>";*/
	}
}