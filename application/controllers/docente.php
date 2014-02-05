<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docente extends CI_Controller {
public $dataSesion;

	public function index()
	{
		//var_dump($this->session->userdata('datos_usuario'));
		$this->dataSesion=$this->session->userdata('datos_usuario');
		if ($this->dataSesion['tipo']=='D') {

				$GLOBALS=array();
				$GLOBALS['pagina_panel_docente'] = 1;
				$this->load->view('cabecera');
				$this->load->view('contenido_docente');
				$this->load->view('pie_pagina');
		}else{
			    $this->session->set_userdata('error',"ha expirado tu sesion Ó Has Intentando acceder de forma no segura");
		    	redirect(base_url().'inicio/error/');
		}	
	}

	public function actualizar(){	
		$this->dataSesion=$this->session->userdata('datos_usuario');
		if ($this->dataSesion['tipo']=='D') {

		$this->load->view('cabecera');
		$this->load->view('contenido_actualizar_docente');
		$this->load->view('pie_pagina');

		}else{
			    $this->session->set_userdata('error',"ha expirado tu sesion Ó Has Intentando acceder de forma no segura");
		    	redirect(base_url().'inicio/error/');
		}
	}/*fin de la Funcion Actualizar*/
	public function modificar(){
		$this->dataSesion=$this->session->userdata('datos_usuario');
		if ($this->dataSesion['tipo']=='D') {

						$this->dataSesion=$this->session->userdata('datos_usuario');

						$this->load->model('data');
						$datos_session=$this->session->userdata('datos_usuario');
						$contenidos=$this->data->contenidos_docente($datos_session['idu']);
						$this->load->view('cabecera');
						$this->load->view('presentar_contenidos_modificar',array('contenidos_usuario'=>$contenidos));
						$this->load->view('pie_pagina');
						}else{
					    $this->session->set_userdata('error',"ha expirado tu sesion Ó Has Intentando acceder de forma no segura");
				    	redirect(base_url().'inicio/error/');
				}
			}/*fin de la funcion modificar*/
	public function modificacion_contenido(){
		$this->dataSesion=$this->session->userdata('datos_usuario');
		if ($this->dataSesion['tipo']=='D') {		
				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('titulo', 'Titulo', 'required');
				$this->form_validation->set_rules('contenido', 'Contenido', 'required');
				$this->form_validation->set_rules('id_contenido', 'Nro_contenido', 'required');
				if ($this->form_validation->run() == FALSE)
				{
							$this->load->view('cabecera');
							$error=array('error'=>validation_errors());
							$this->load->view('contenido_docente',$error);
							$this->load->view('pie_pagina');
				}else{
							$this->load->model('data');
							$datos=array('data'=>$this->input->post());
							if($this->data->actualizar_contenido_docente($datos)==1)
							{
								$ok=array('ok'=>strtoupper("Modifico el Contenido Exitosamente."));
								$this->load->view('cabecera');
								$this->load->view('contenido_docente',$ok);
								$this->load->view('pie_pagina');
							}else{
									$this->load->view('cabecera');
									$error=array('error'=>strtoupper("Faltaron completar campos."));
									$this->load->view('contenido_docente',$error);
									$this->load->view('pie_pagina');
								}
							//var_dump($data);

							
					}


		}else{
			    $this->session->set_userdata('error',"ha expirado tu sesion Ó Has Intentando acceder de forma no segura");
		    	redirect(base_url().'inicio/error/');
		}

	}/*fin de la funcion modificacion contenido*/

	public function editando($id_contenido=''){	
		$this->dataSesion=$this->session->userdata('datos_usuario');
		if ($this->dataSesion['tipo']=='D') {
				$this->load->model('data');
				$this->load->view('cabecera');
				$datos_session=$this->session->userdata('datos_usuario');
				$ids=array('id_contenido' => $id_contenido,'id_docente'=>$datos_session['idu']);
				$contenido_edicion=$this->data->contenido_docente($ids);
				$this->load->view('presentar_contenido_editando',array('contenido_edicion'=>$contenido_edicion));
				$this->load->view('pie_pagina');


		}else{
			    $this->session->set_userdata('error',"ha expirado tu sesion Ó Has Intentando acceder de forma no segura");
		    	redirect(base_url().'inicio/error/');
		}

	}/**/
	
	public function procesar_actualizacion_datos_docente(){

		$this->dataSesion=$this->session->userdata('datos_usuario');
		if ($this->dataSesion['tipo']=='D') {
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation','session'));
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('email', 'Descripcion del E-mail', 'required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('cabecera');
			$error=array('error'=>strtoupper("Faltaron completar campos."));
				$this->load->view('contenido_docente',$error);
			$this->load->view('pie_pagina');
		}else{

			$nombre=$this->input->post('nombre');
			$apellido=$this->input->post('apellido');
			$correo=$this->input->post('email');
			$data_session=$this->session->userdata['datos_usuario'];
			$data=array('nombre' => $nombre,'apellido' => $apellido,'email' => $correo,'idu' =>$data_session['idu']);
			$this->load->view('cabecera');
			$this->load->model('data');
			if($this->data->actualizar_datos_docente($data)==1){
				$temp=$data_session;
				$temp['nombre']=$nombre;
				$temp['apellido']=$apellido;
				$temp['email']=$correo;
				$this->session->set_userdata(array('datos_usuario' =>$temp));
				$ok=array('ok'=>strtoupper("Actualizo los datos Exitosamente. Para poder ver los cambios aplicados Debe Cerrar session y volver a iniciar session."));
				$this->load->view('contenido_docente',$ok);
			}else{
				$error=array('error'=>strtoupper("No se pudieron actualizar los datos"));
				$this->load->view('contenido_docente',$error);
				}
			$this->load->view('pie_pagina');
		}

			

		}else{
			    $this->session->set_userdata('error',"ha expirado tu sesion Ó Has Intentando acceder de forma no segura");
		    	redirect(base_url().'inicio/error/');
		}

	}

	public function crear_contenido(){
				$this->verifica_docente();
				$GLOBALS=array();
				$GLOBALS['pagina_panel_docente'] = 1;
				$this->load->view('cabecera');
				$this->load->view('crear_contenido_docente');
				$this->load->view('pie_pagina');
	}

	public function crear_noticia(){
				$GLOBALS['pagina_noticias'] = 1;
				$this->verifica_docente();
				$this->load->view('cabecera');
				$this->load->view('contenido_docente_crear_noticia');
				$this->load->view('pie_pagina');

	}

	public function notificar(){
				$this->verifica_docente();
				$GLOBALS=array();
				$GLOBALS['pagina_panel_docente'] = 1;
				$this->load->view('cabecera');
				$this->load->view('contenido_docente_notificar');
				$this->load->view('pie_pagina');
	}

	public function procesa_notificacion(){

		$this->load->helper(array('form'));
		$this->load->library(array('form_validation','session'));
		$this->form_validation->set_rules('titulo', 'Titulo', 'required');
		$this->form_validation->set_rules('descripcion_email', 'Descripcion del E-mail', 'required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('cabecera');
			$error=array('error'=>strtoupper("Faltaron completar campos."));
				$this->load->view('contenido_docente',$error);
			$this->load->view('pie_pagina');
		}else{
			$notificacion=$this->input->post();
			//var_dump($notificacion);
			$t=0;
			if(isset($notificacion['todos'])){
				$t=$notificacion['todos'];
			}

			if(isset($notificacion['trayecto1'])){
				$t=$notificacion['trayecto1'];
			}

			if(isset($notificacion['trayecto2'])){
				if ($t==0) {
						$t=$notificacion['trayecto2'];
						}else{
							$t.=",".$notificacion['trayecto2'];
						}
			}

			if(isset($notificacion['trayecto3'])){
				if ($t==0) {
						$t=$notificacion['trayecto3'];
						}else{
							$t.=",".$notificacion['trayecto3'];
						}
			}

			if(isset($notificacion['trayecto4'])){
				if ($t==0) {
						$t=$notificacion['trayecto4'];
						}else{
							$t.=",".$notificacion['trayecto4'];
						}
			}

			if($t==0){

				$this->load->view('cabecera');
				$error=array('error'=>strtoupper("Debe Seleccionar algun trayecto para poder enviarles esta notificacion."));
				$this->load->view('contenido_docente_notificar',$error);
				$this->load->view('pie_pagina');

			}else{

								$titulo = str_replace("_"," ", $this->sanear_string_con($notificacion['titulo']));
							//echo "<br>a trayectos: ".$t;
							//echo "<br>Titulo: ".$notificacion['titulo'];
							//echo "<br>Descripcion: ".$notificacion['descripcion_email'];
							$session=$this->session->userdata;
							//echo "<br>id Docente: ".$session['datos_usuario']['idu'];
							if($t==10){
								//echo "<br>a todos<br>";
								$lista_correos=$this->todos_emails();
								$data=array('id'=>$session['datos_usuario']['idu'],'titulo'=>$titulo,'descripcion'=>$notificacion['descripcion_email'],'lista'=>$lista_correos);
								$this->enviar_correos($data);
							}else{
									$trayectos=explode(',', $t);
									//var_dump($notificacion);
									//var_dump($trayectos);

									for ($i=0; $i <count($trayectos) ; $i++) { 
										$lista=$this->trayecto_emails($trayectos[$i]);
										$data=array('id'=>$session['datos_usuario']['idu'],'titulo'=>$titulo,'descripcion'=>$notificacion['descripcion_email'],'lista'=>$lista);
										$this->enviar_correos($data);
										}
									//var_dump($lista);

							}

			}
		}
	}


	public function registrar_nueva_noticia(){
	//primero cargamos los contenidos para mandarselos a la vista
			$this->load->model('data');
			$this->load->helper('text');
				$GLOBALS=array();
		$this->load->helper(array('form'));
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('titulo', 'Titulo', 'required');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('cabecera');

				$error=array('contenidos'=>$this->data->obtener_contenidos(),'error'=>strtoupper("Falto informacion para poder procesar. <br>".validation_errors()));
				$this->load->view('contenido2',$error);

				$this->load->view('pie_pagina');

		}else{
			//var_dump($this->input->post());
			$noticia=$this->input->post();
			//echo $noticia['titulo']." ".$noticia['descripcion'];
			$datos_session=$this->session->userdata('datos_usuario');
			//echo "<br>".$datos_session['usuario']."<br>".$datos_session['idu']."<br>";
			$this->load->model('data');
			$nueva_noticia=array('idu'=>$datos_session['idu'],'titulo'=>$noticia['titulo'],'descripcion'=>$noticia['descripcion']);
			if($this->data->insertar_noticia($nueva_noticia)==1){
				//obtenemos todos los correos para informarles que se ha generado una nueva noticia
				$correos=$this->data->obtener_email_full();
				$nombre_completo=$this->data->nombre_apellido($datos_session['idu']);

				$datos= array('docente' => $nombre_completo['nombre']." ".$nombre_completo['apellido'],'titulo'=>$noticia['titulo'],'descripcion'=>$noticia['descripcion'],'lista'=>$correos);
				$this->enviar_correos_notificacion_noticia($datos);



			}else{
				$this->load->view('cabecera');
				$error=array('contenidos'=>$this->data->obtener_contenidos(),'error'=>strtoupper("Ha ocurrido un error en el proceso de Registro e la NOTICIA.<br>".validation_errors()));
				$this->load->view('contenido2',$error);
				$this->load->view('pie_pagina');

			}	
			
		}

	}//Fin de la funcion registrar_nueva_noticia

	public function full_emails(){
		$this->load->model('data');
		return $this->data->obtener_email_full();
	}
	public function todos_emails(){
		$this->load->model('data');
		return $this->data->obtener_email_estudiantes();
	}

	public function trayecto_emails($t){
		$this->load->model('data');
		return $this->data->obtener_email_estudiantes_trayecto($t);
	}

	public function enviar_correos_notificacion_noticia($data){
		
		$this->load->library('email');
		$this->load->library('session');
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('upta-file@archivosupta.com.ve', 'NOTICIAS-UPTA / '.$data['docente']);
		$this->email->to($data['lista']); 
		$this->email->subject('Ha sido publicada una noticia por '.$data['docente']);
		$this->email->message('<h3>'.$data['titulo'].'</h3><br><h4>Docente: '.$data['docente'].'</h4><br><p>  '.$data['descripcion'].' </p><hr><pre>Para visualizar el contenido de una mejor forma, puede acceder al portal en la seccion de noticias -> [ <a href="http://archivosupta.com.ve/noticias">http://archivosupta.com.ve/noticias</a>  ]</pre>');	
		if($this->email->send()){
			
				$this->load->view('cabecera');
				$ok=array('ok'=>strtoupper("Se ha sido publicada su NOTICIA satisfactoriamente.<br>"));
				$this->load->view('contenido_docente',$ok);
				$this->load->view('pie_pagina');
		}else{

				$this->load->view('cabecera');
				$error=array('error'=>strtoupper("Se ha producido un error durante el proceso de envio...<br>"));
				$this->load->view('contenido_docente',$error);
				$this->load->view('pie_pagina');
		}
	}

	public function enviar_correos($data){

		$nombre_completo=$this->data->nombre_apellido($data['id']);

		//echo "<br><br><pre>Enviar correos </pre><br><br>";

		$this->load->library('email');
		$this->load->library('session');
		//configuracion
		//$config['charset'] = 'iso-8859-1';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		//$this->email->set_mailtype("html");
		$this->email->initialize($config);
		$this->email->from('upta-file@archivosupta.com.ve', 'NOTIFICACIONES-UPTA / '.$nombre_completo['nombre'].'  '.$nombre_completo['apellido']);
		$this->email->to($data['lista']); 
		$this->email->subject('Nueva notificación enviada por '.$nombre_completo['nombre'].'  '.$nombre_completo['apellido']);
		$this->email->message('<h3>'.$data['titulo'].'</h3><br><h4>Docente: '.$nombre_completo['nombre'].'  '.$nombre_completo['apellido'].'</h4><br><p>  '.$data['descripcion'].' </p>');	

		//$this->email->send();
		if($this->email->send()){
			
				$this->load->view('cabecera');
				$ok=array('ok'=>strtoupper("Se ha enviado satisfactoriamente su noticia...<br>"));
				$this->load->view('contenido_docente',$ok);
				$this->load->view('pie_pagina');
		}else{

				$this->load->view('cabecera');
				$error=array('error'=>strtoupper("Se ha producido un error durante el proceso de envio...<br>"));
				$this->load->view('contenido_docente',$error);
				$this->load->view('pie_pagina');
		}

	}

	public function enviar_correos_contenido_nuevo($data){

		$nombre_completo=$this->data->nombre_apellido($data['id']);

		$this->load->library('email');
		$this->load->library('session');
		//configuracion
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		$this->email->from('upta-file@archivosupta.com.ve', 'CONTENIDOS-UPTA / '.$nombre_completo['nombre'].'  '.$nombre_completo['apellido']);
		$this->email->to($data['lista']); 
		$this->email->subject('Ha sido Cargado un Nuevo Contenido por '.$nombre_completo['nombre'].'  '.$nombre_completo['apellido']);
		if($data['archivo']!=""){
				$this->email->message('<h3>'.$data['titulo'].'</h3><br><h4>Docente: '.$nombre_completo['nombre'].'  '.$nombre_completo['apellido'].'</h4><br><p>  '.$data['descripcion'].' </p><br><a href="'.base_url().substr($data['url'],2).'">Click Aqui Para Descargar</a> <hr><pre>Para visualizar el contenido de una mejor forma, puede acceder al portal -> [ <a href="'.base_url().'contenido/ver_contenido/"'.$data['id'].'>ArchivosUpta.com.ve</a>  ]</pre>' );	
	
		}else{
				$this->email->message('<h3>'.$data['titulo'].'</h3><br><h4>Docente: '.$nombre_completo['nombre'].'  '.$nombre_completo['apellido'].'</h4><br><p>  '.$data['descripcion'].' </p>' );	

		}
		
		//$this->email->send();
		if($this->email->send()){
			
				$this->load->view('cabecera');
				$ok=array('ok'=>strtoupper("Se ha cargado y enviado a los alumnos satisfactoriamente su contenido...<br>"));
				$this->load->view('contenido_docente',$ok);
				$this->load->view('pie_pagina');
		}else{

				$this->load->view('cabecera');
				$error=array('error'=>strtoupper("Se ha producido un error durante el proceso de envio...<br>"));
				$this->load->view('contenido_docente',$error);
				$this->load->view('pie_pagina');
		}

	}

	public function procesar_contenido(){

		$this->load->model('data');
		$this->load->helper('text');
		

				$GLOBALS=array();
		$this->load->helper(array('form','file','string'));
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('titulo', 'Titulo', 'required');
		$this->form_validation->set_rules('contenido', 'Descripcion', 'required');

			if ($this->form_validation->run() == FALSE)
		{
			$error=array('contenidos'=>$this->data->obtener_contenidos(),'error'=>strtoupper("Falto informacion para poder procesar. <br>".validation_errors()));
				
				$this->load->view('cabecera',$error);

				$this->load->view('contenido2',$error);

				$this->load->view('pie_pagina');

		}else{
				$datos=$_POST;
				//var_dump($datos);
				//aplicamos seguridad
				$titu=$this->input->post('titulo', TRUE);
				$conte=$this->input->post('contenido', TRUE);

				$datos_session=$this->session->userdata('datos_usuario');
				$carpeta="./archivos/".$datos_session['idu']."/";
				//con el siguiente comando  vemos si obtiene la informacion de ese derectorio 
				//en caso que no exista el directorio lo creamos con el ID de ese usuario para
				//que los archivos los usuarios no esten mesclados y cada uno posea su carpeta
				if(!get_file_info($carpeta)){ mkdir($carpeta); }				

					if(opendir($carpeta)){
						if(sizeof($_FILES)!=0){
								$nombre_archivo=$this->quitarCosasRaras(trim(utf8_decode($_FILES['campo_archivo']['name'])));

								$titulo =str_replace("_", " ", $this->sanear_string_con($titu));
								$destino=$carpeta.$nombre_archivo;
								
								if($_FILES['campo_archivo']['name']==""){
									//verificamos si creo un contenido sin archivos
									$data=array('idu'=>$datos_session['idu'],'titulo'=>$titulo,'contenido'=>quotes_to_entities($conte),'archivo'=>NULL);
									
									$this->load->model('data');
									if($this->data->insertar_contenido($data)){
										//echo "ok".$nombre_archivo;
										#revisamos si quiso enviar notificacion por correo
										$t=0;
											if(isset($datos['todos'])){
												$t=$datos['todos'];
											}

											if(isset($datos['trayecto1'])){
												$t=$datos['trayecto1'];
											}

											if(isset($datos['trayecto2'])){
												if ($t==0) {
														$t=$datos['trayecto2'];
														}else{
															$t.=",".$datos['trayecto2'];
														}
											}

											if(isset($datos['trayecto3'])){
												if ($t==0) {
														$t=$datos['trayecto3'];
														}else{
															$t.=",".$datos['trayecto3'];
														}
											}

											if(isset($datos['trayecto4'])){
												if ($t==0) {
														$t=$datos['trayecto4'];
														}else{
															$t.=",".$datos['trayecto4'];
														}
											}
											
											if($t==0){

												$this->load->view('cabecera');
												$ok=array('ok'=>strtoupper("Ha sido cargado y publicado exitosamente su contenido."));
												$this->load->view('contenido_docente_notificar',$ok);
												$this->load->view('pie_pagina');
											}
											if($t==10){
													$lista_correos=$this->todos_emails();
													$data=array('id'=>$datos_session['idu'],'titulo'=>$datos['titulo'],'descripcion'=>$datos['contenido'],'lista'=>$lista_correos,'archivo'=>$nombre_archivo,'url'=>$destino);
													$this->enviar_correos_contenido_nuevo($data);
											}
											if($t!=0&&$t!=10){
												$trayectos=explode(',', $t);
												for ($i=0; $i < count($trayectos); $i++) { 													
													$lista_correos=$this->trayecto_emails($trayectos[$i]);
													$data=array('id'=>$datos_session['idu'],'titulo'=>$datos['titulo'],'descripcion'=>$datos['contenido'],'lista'=>$lista_correos,'archivo'=>$nombre_archivo,'url'=>$destino);
													$this->enviar_correos_contenido_nuevo($data);

												}
											}

									}else{
										echo "no";
									}
								}else{
									//en caso que haya agregado un archivo
									if(copy($_FILES['campo_archivo']['tmp_name'], $destino)){
										//echo "<br>Archivo: ".$_FILES['campo_archivo']['name']." Se ha cargado Exitosamente.";
										$data=array('idu'=>$datos_session['idu'],'titulo'=>$datos['titulo'],'contenido'=>quotes_to_entities($datos['contenido']),'archivo'=>$nombre_archivo);
									
										$this->load->model('data');
											if($this->data->insertar_contenido($data)){
												/////////////////////////////////////////
										#revisamos si quiso enviar notificacion por correo
										$t=0;
											if(isset($datos['todos'])){
												$t=$datos['todos'];
											}

											if(isset($datos['trayecto1'])){
												$t=$datos['trayecto1'];
											}

											if(isset($datos['trayecto2'])){
												if ($t==0) {
														$t=$datos['trayecto2'];
														}else{
															$t.=",".$datos['trayecto2'];
														}
											}

											if(isset($datos['trayecto3'])){
												if ($t==0) {
														$t=$datos['trayecto3'];
														}else{
															$t.=",".$datos['trayecto3'];
														}
											}

											if(isset($datos['trayecto4'])){
												if ($t==0) {
														$t=$datos['trayecto4'];
														}else{
															$t.=",".$datos['trayecto4'];
														}
											}
											
											if($t==0){

												$this->load->view('cabecera');
												$ok=array('ok'=>strtoupper("Ha sido cargado y publicado exitosamente su contenido."));
												$this->load->view('contenido_docente_notificar',$ok);
												$this->load->view('pie_pagina');
											}
											if($t==10){
													$lista_correos=$this->todos_emails();
													$data=array('id'=>$datos_session['idu'],'titulo'=>$datos['titulo'],'descripcion'=>$datos['contenido'],'lista'=>$lista_correos,'archivo'=>$nombre_archivo,'url'=>$destino);
													$this->enviar_correos_contenido_nuevo($data);
											}
											if($t!=0&&$t!=10){
												$trayectos=explode(',', $t);
												for ($i=0; $i < count($trayectos); $i++) { 										
													$lista_correos=$this->trayecto_emails($trayectos[$i]);
													$data=array('id'=>$datos_session['idu'],'titulo'=>$datos['titulo'],'descripcion'=>$datos['contenido'],'lista'=>$lista_correos,'archivo'=>$nombre_archivo,'url'=>$destino);
													$this->enviar_correos_contenido_nuevo($data);

												}
											}


											}else{
												echo "no";
											}

									}//fin del if copy si copio a la carpeta de ese usuario
								}
							}

					}else{
						echo "no se pudo habrir la ruta de Archivos.";
					}
				

		}

	}


	public function verifica_docente(){
				$this->dataSesion=$this->session->userdata('datos_usuario');
				if ($this->dataSesion['tipo']!='D') {
					    $this->session->set_userdata('error',"Has Intentando acceder de forma no segura");
				    	redirect(base_url().'inicio/error/');
				}	
	}

public function quitarCosasRaras($cadena){
$replace = array( 
'á' => 'a', 
'Á' => 'A', 
',' => '', 
'´' => '', 
' ' => '_', 
'é' => 'e', 
'É' => 'E', 
'í' => 'i', 
'Í' => 'I', 
'\\' => '', 
'ó' => 'o', 
'Ó' => 'O', 
'\'' => '', 
'*' => '', 
'+' => '', 
'-' => '', 
'|' => '', 
'@' => '', 
'#' => '', 
'$' => '', 
'%' => '', 
'&' => '', 
'?' => '', 
'¿' => '', 
'¡' => '', 
'!' => ''               
); 


return strtolower($this->str_replace_assoc($replace,$cadena)); 
}

public function str_replace_assoc($replace, $subject) { 

   return str_replace(array_keys($replace), array_values($replace), $subject);    
} 

public function sanear_string($string)
{

    $string = trim($string);

    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );

    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        '',
        $string
    );


    return $string;
}

public function sanear_string_con($string)
{

    $string = trim($string);

    $string = str_replace(
        array('à', 'ä', 'â', 'ª', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('è', 'ë', 'ê', 'É','Ê', 'Ë'),
        array('e', 'e', 'e', 'E','E', 'E'),
        $string
    );

    $string = str_replace(
        array('ì', 'ï', 'î', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ò', 'ö', 'ô','Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o','O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ù', 'ü', 'û', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ç', 'Ç'),
        array('c', 'C',),
        $string
    );

    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
        array("\\", "¨", "º", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ":"),
        '',
        $string
    );


    return $string;
}

	}/*fin de clase*/

