<div id="ver_contenido">

		<div id="contenedor_noticias" class="row">
		<!-- Barra lateral  de OPCIONES -->

		<!-- fin de barra de opciones-->


			<div class="span12">
				<h1>Detalle de Publicaci&oacute;n</h1>
				<div class="bloque-contenido borde_amarillo"><h3 class="breadcrumb">
<?php 
//var_dump($publicacion[0]);
$fecha=date_create($publicacion[0]['fecha']);
$fecha_formato=date_format($fecha,"d-m-Y G:s a");
?>
<h2 class="h2articuloDetalle"><span class="pesta1">Nro <?php echo $publicacion[0]['id'];?></span>Publicado por <i class="icon-briefcase"></i> <?php echo utf8_decode(utf8_encode(strtoupper($autor['nombre']." ".$autor['apellido']))); ?> / <?echo $fecha_formato;?><br><span class="titulo">T&iacute;tulo: <?php echo utf8_decode(utf8_encode($publicacion[0]['titulo']));?></span></h2>

<!-- Antigua Forma de  Presentar la información
					<a href="#"><?php echo utf8_decode(utf8_encode($publicacion[0]['titulo']));?></a>  

					<span class="divider">/</span> Publicado por <i class="icon-briefcase"></i> <?php echo utf8_decode(utf8_encode(strtoupper($autor['nombre']." ".$autor['apellido']))); ?></h3>
-->
					<p><?php echo nl2br(utf8_decode(utf8_encode($publicacion[0]['contenido'])));
							 if(isset($publicacion[0]['nombre_archivo'])){
							 	if(strlen($publicacion[0]['nombre_archivo'])>3){
									echo '<br><center><a href="'.base_url().'archivos/'.$publicacion[0]['idu'].'/'.$publicacion[0]['nombre_archivo'].'" class="btn btn-info" TARGET = "_blank">Click Aqui para Descargar Archivo</a></center>';
							  	}							 			
							 }
					?>
					</p><div class="fecha">Fecha: <?php echo $publicacion[0]['fecha']?></div>
				
				</div>			
			</div>
	</div>

<!-- Inicio de los comentarios -->
<?php
		if (isset($this->session->userdata['datos_usuario'])) {
		$datos_session=$this->session->userdata['datos_usuario'];
?>
		<!-- <div id="contenedor_comentario_noticias" class="row">
		</div>-->
				<?php 
						if(isset($comentarios)){
							//var_dump($comentarios);
							if(count($comentarios)>0){
								?>
						<div id="contenedor_comentarios">
								<?php
								for ($p=0; $p < count($comentarios); $p++) { 
									# recorrrmos los comentarios para imprimirlos
									?>
									<div class="row comentario-individual">
									
									<div class="span2 caja-fecha-comentario-individual">
										<label><?php 
									if($comentarios[$p]['tipo']=='D'){
															echo '<i class="icon-briefcase"></i> '.$comentarios[$p]['nombre_apellido'];
													}else{
															echo '<i class="icon-user"></i> '.$comentarios[$p]['nombre_apellido'];
													}
													
													?></label>
										<pre>Fecha: <?php echo date_format(date_create($comentarios[$p]['fecha']), 'd-m-Y g:i:s a');?></pre>
									</div>

									<div class="span9 caja-comentario-individual"><p><?php echo nl2br($comentarios[$p]['comentario']);?></p></div>
									</div>
									<?
								}/*fin del for*/
								?>
						</div><!--Cierre del bloque de comentarios -->
								<?php
							}
						}
				?>

	<div class="row">
		<hr>
		<?php 
		
			//var_dump($datos_session);
			if($datos_session['tipo']=='D'||$datos_session['tipo']=='E'){
				$tipo_cuenta="";
				if($datos_session['tipo']=='D'){$tipo_cuenta="DOCENTE";}else{$tipo_cuenta="ESTUDIANTE";}
					echo "<div class=\"span2\">Tipo de Cuenta: ".$tipo_cuenta."<br><br> Bienvenido <br>".$datos_session['nombre']." ".$datos_session['apellido']."</div>";
					//echo "<div class=\"span10\"><pre>Si deseas realizar un comentario o hacer una consulta sobre el contenido lo puede realizar en esta secci&oacute;n.</pre> </div>";
				?>
				<div class="span10">
				
					<div class="row">
						<div class="span10">
							<pre>Si deseas realizar un comentario o hacer una consulta sobre el contenido lo puede realizar en esta secci&oacute;n.</pre>
						</div>
					</div>
					<div class="row">
					<form action="<?php echo base_url().'contenido/EnviarComentario';?>" method="POST">
					
						<div class="span7">
							<textarea id="comentario_usuario" class="borde" rows="4" name="comentario" placeholder="Escriba Aqui su comenario o Consulta..." minlength="5"  title="su mensaje debe contener almenos 5 caracteres." required="required"></textarea>
						</div>
						<div class="span3">
							<div class="row">
								<div class="span3">
								<!--
								<pre>en session <?php //echo $this->session->userdata('captcha');?></pre>
								-->
									<?php echo $captcha;?>
									<input type="text" name="captcha" class="borde capcha" min-length="7" maxlength="7" title="Debe contener 7 caracteres." required="required">
								</div>
							</div>
							<div class="row">
								<div class="span3">
									<input type="submit" class="btn btn-success btn-large" value="CONFIRMAR" onclick="confirm('Esta Seguro de enviar este comentario?');">
					
								</div>
							</div>
						</div>
					</form>
					</div>
					
				</div>
				<?
			}
		}else{

		}
		?>

	</div>
</div>