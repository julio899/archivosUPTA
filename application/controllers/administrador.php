<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function index()
	{
			//primero cargamos los contenidos para mandarselos a la vista
			$this->load->model('data');
			$this->load->helper('text');
				$GLOBALS=array();
				$GLOBALS['pagina_inicio'] = 1;
				$data=$this->session->userdata('datos_usuario');


		if($data['tipo']=='A'){
			$this->load->view('admin/cabecera_admin.php');
			$this->load->view('admin/contenido_admin.php');
			$this->load->view('admin/pie_pagina_admin.php');
		}else{
			$this->load->view('cabecera');

				$error=array('contenidos'=>$this->data->obtener_contenidos(),'error'=>strtoupper("Has intentado ingresar de una forma no segura.<br>NO ERES ADMINISTRADOR Y TAMPOCO POSEES PRIVILEGIOS".validation_errors()));
				$this->load->view('contenido2',$error);

				$this->load->view('pie_pagina');
		}
	}

	public function registro_docentes(){

			$this->load->view('admin/cabecera_admin');
			$this->load->view('admin/registrar_docente_admin');
			$this->load->view('admin/pie_pagina_admin');
	}

	public function procesar_registro_docente(){

		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('Apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('pass', 'clave', 'required');
		$this->form_validation->set_rules('Repass', 'confirmacion', 'required');
		$this->form_validation->set_rules('correo', 'Correo', 'required');
		//var_dump($_POST);

			if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('admin/cabecera_admin');

				$error=array('error'=>strtoupper("Falto informacion para poder procesar. <br>".validation_errors()));
				$this->load->view('admin/registrar_docente_admin',$error);

				$this->load->view('admin/pie_pagina_admin');

		}else{
				//si no son iguales las claves
				if($this->input->post('pass')!=$this->input->post('Repass')){
						$error=array('error'=>strtoupper("Las claves no coinciden"));
						
						$this->load->view('admin/cabecera_admin');
						$this->load->view('admin/registrar_docente_admin',$error);
						$this->load->view('admin/pie_pagina_admin');
				}else{
						$this->load->model('data');
						$datos=array('nombre'=>$this->input->post('nombre'),'apellido'=>$this->input->post('Apellido'),'pass'=>$this->input->post('pass'),'correo'=>$this->input->post('correo'));
						
						if($this->data->registrar_docente($datos)==1){
							$ok=array('ok'=>"Se ha registrado la cuenta de forma Satisfactoria");
						$this->load->view('admin/cabecera_admin');
						$this->load->view('admin/contenido_admin',$ok);
						$this->load->view('admin/pie_pagina_admin');
						}
				}
		}

	}
}