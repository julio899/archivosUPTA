<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function index()
	{	
		$this->load->view('cabecera');
		$this->load->view('form_registro');
		$this->load->view('pie_pagina');
	}

	public function verificacion(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('campo_nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('campo_apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('campo_email', 'Correo Electronico', 'trim|required');
		$this->form_validation->set_rules('campo_clave', 'Clave', 'trim|required|matches[campo_reclave]|sha1');
		$this->form_validation->set_rules('campo_trayecto', 'Trayecto', 'required');
		$this->form_validation->set_rules('campo_seccion', 'Secci&oacute;n', 'required');
		$this->form_validation->set_rules('campo_turno', 'Turno', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('cabecera');
			//echo "<div id=\"contenido\" class=\"container\">";
			//echo "<pre>Falto informacion para poderse registrar</pre><div class=\"alert alert-error\">";
			//echo validation_errors();
			//echo "</div></div>"; 
			$error=array('error'=>validation_errors());
			$this->load->view('form_registro',$error);
			$this->load->view('pie_pagina');
		}else{
			//echo "else";
			//var_dump($this->input->post());
			$this->registrar($this->input->post());
		}

	}

	private function registrar($data=''){
	//	echo "datos a registrar <br>";
	//	var_dump($data);

		//verifico si ya esta registrado este correo
		if($this->verificaEmail($data['campo_email'])==0){

		$usuario=explode("@", $data['campo_email']);
		//	echo "<br>usuario:".$usuario[0];
	
		 $data = array(
               'usuario' => $usuario[0],
               'clave' => $data['campo_clave'],
               'nombre' => $data['campo_nombre'],
               'apellido' => $data['campo_apellido'],
               'trayecto' => $data['campo_trayecto'],
               'seccion' => $data['campo_seccion'],
               'turno' => $data['campo_turno'],
               'fecha' => date('Y-m-d H:i:s'),
               'tipo' => 'E',
               'email' => $data['campo_email']
          );
      //return $this->db->insert('cuentas',$data);
		//var_dump($this->db->insert('cuentas',$data));
		if($this->db->insert('cuentas',$data)){
			$this->enviarEmailCreacion($data['email'],$data);
		}
		//fin de verificar si esta registrado
		}else{ 

		$this->load->model('data');

				$error=array('contenidos'=>$this->data->obtener_contenidos(),'error'=>"Lo sentimos pero, Este correo ya existe registrado en el sistema.<br>Intenta registrarte con una cuenta de correo diferente.");
				$this->load->view('cabecera');
				$this->load->view('contenido2',$error);
				$this->load->view('pie_pagina');
				
				}

	}

	public function verificaEmail($correo=""){
		$query=$this->db->query('SELECT * FROM  `cuentas` WHERE  `email` LIKE  \''.$correo.'\' LIMIT 1');
		$row = $query->row_array();
		return count($row);
	}



	public function enviarEmailCreacion($email='',$data=''){
		$this->load->library('email');
		$this->load->library('session');
		//configuracion
		//$config['charset'] = 'iso-8859-1';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		//$this->email->set_mailtype("html");
		$this->email->initialize($config);
		$this->email->from('upta-file@ktuxca.com', 'UPTA FILE');
		$this->email->to($email); 
		$this->email->subject('..::Registro Satisfactorio::..');
		$this->email->message('<h3>Bienvenido a Upta-file</h3><br><p>Hola '.strtoupper($data['nombre']).' '.strtoupper($data['apellido']).' tu cuenta ha sido registrada satisfactoriamente.<br><br><b>USUARIO:'.$data['usuario'].'</b><br><br><br>Ahora podras recibir toda la informaci&oacute;n y materiales de apoyo al momento.</p>');	

		$this->email->send();

		$this->session->set_flashdata('status', 'Felicitaciones <b>'.strtoupper($data['nombre']).' '.strtoupper($data['apellido']).'</b>, Te has Registrado satisfactoriamente.<br>Por favor verifque su correo ya que alli se le enviara su nombre de usuario.');
		redirect();
		//echo $this->email->print_debugger();
	}
}