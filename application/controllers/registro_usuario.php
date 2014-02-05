<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro_usuario extends CI_Controller {
	
	public function index()
	{ 
		$this->form_validation->set_rules('name','Nombre','required');
		$this->form_validation->set_rules('apellido','Apellido','required');
		$this->form_validation->set_rules('clave','Clave','required');
		$this->form_validation->set_rules('REclave','Clave','required');
		$this->form_validation->set_rules('email','Correo','required');
		if ($this->form_validation->run()==FALSE || $this->input->post('clave')!=$this->input->post('REclave')) {			
					if( $this->input->post('clave')!=$this->input->post('REclave') ){
							$data=array("error"=>"Las CLAVES no Coinciden");
							$this->load->view('registro_usuario',$data);
					}else{
							$data=array("error"=>"Ingreso algun dato Invalido");
							$this->load->view('registro_usuario',$data);
					}
		}else{
			$this->load->model("data");
			$registros= array('nombre' =>$this->input->post('name'),'apellido' =>$this->input->post('apellido'),'email' =>$this->input->post('email'),'usuario' =>$this->input->post('usuario'),'clave' =>md5($this->input->post('clave')));
			$this->data->registrar_usuario($registros);

		}
	}

	public function verifica(){

		$this->load->model("data");

		if($this->data->verifica($this->input->post('usuario'),md5($this->input->post('clave')))==1){
			//echo "SI";
			redirect('sistema','refresh');
			//$this->load->view('inicio');

		}elseif($this->data->verifica($this->input->post('usuario'),md5($this->input->post('clave')))==-1){
			//echo "Usuario No EXiste";
			redirect('sistema','refresh');
		}
		if($this->data->verifica($this->input->post('usuario'),md5($this->input->post('clave')))==0){
			//echo "Clave Invalida.";
			redirect('sistema','refresh');
		}

	}

}