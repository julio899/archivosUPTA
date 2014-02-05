<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Identificacion extends CI_Controller {

	public function index()
	{

		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('clave', 'Clave', 'required');

			//primero cargamos los contenidos para mandarselos a la vista
			$this->load->model('data');
			$this->load->helper('text');
				$GLOBALS=array();
				$GLOBALS['pagina_inicio'] = 1;

		if ($this->form_validation->run() == FALSE)
		{

				$this->load->view('cabecera');

				$error=array('contenidos'=>$this->data->obtener_contenidos(),'error'=>strtoupper("Falto informacion para poderse IDENTIFICAR. <br>".validation_errors()));
				$this->load->view('contenido2',$error);

				$this->load->view('pie_pagina');

		}else{
			//echo "else";
			//var_dump($this->input->post());
			$info=$this->existe_usuario($this->input->post());
			if(count($info)==0){
				$this->load->view('cabecera');

				$error=array('contenidos'=>$this->data->obtener_contenidos(),'error'=>"usuario o clave invalido");
				
				$this->load->view('contenido2',$error);

				$this->load->view('pie_pagina');
			}else{
				$this->session->set_userdata('datos_usuario',$info);
				switch ($info['tipo']) {
					case 'A':
						# si es un Estudiante
						redirect(base_url().'administrador');
						break;
					case 'D':
						# si es un DOCENTE
						redirect(base_url().'docente');
						break;
					case 'E':
						# si es un Estudiante
						redirect(base_url().'estudiante');
						break;
					
					default:
						redirect(base_url());
						break;
				}

				/*fin del switch para redireccionar segun su cuenta*/

			}
		}
	}

	private function existe_usuario($data=''){
		//echo $data['usuario'];
		//echo "<br>".$data['clave'];
		$query=$this->db->query('SELECT * FROM  `cuentas` WHERE  `usuario` LIKE  \''.$data['usuario'].'\' AND  `clave` LIKE  \''.sha1($data['clave']).'\' LIMIT 1');
		$row = $query->row_array();
		return $row;

	}
	
	public function desconectarse(){
		 $this->session->set_userdata(array());
		 $this->session->sess_destroy();
		 redirect(base_url());
		//echo "desconeccion";
	}

}
