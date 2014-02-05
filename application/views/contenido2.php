<div id="contenido" class="container">
	<?php 

					if($this->session->flashdata('status')){

				echo "<div class=\"row\"><div class=\"span12 alert alert-success\">";
				echo $this->session->flashdata('status');

				echo "</div>
						</div>";
					}
	?>

			<div class="row-fluid">
				<div class="span8">

					
					<div class="row-fluid" id="div_noticias">
						<!-- apartado para las noticias-->
						
								
						<?php
						if(isset($error)){
			echo "<div class=\"row\">
							<div class=\"span2\"><img class\"img-circle\" src=\"".base_url()."/img/bebe_llorando.jpg\"/></div>
							<div class=\"span10 alert alert-error\">";
							//var_dump($error);
							if(is_array($error)){	
								echo '<i class="icon-warning-sign"></i> *'.$error['error'];
							}else{
								echo '<i class="icon-warning-sign"></i> '.$error;
							}

				echo "</div>
						</div>";
						//y si recibimos contenidos los imprimimos
								for ($i=0; $i < count($contenidos); $i++) {
									$date = date_create($contenidos[$i]['fecha']);
									$fecha=date_format($date,"d-m-Y g:i A");
									$tituloReducido = character_limiter($contenidos[$i]['titulo'],52);
									echo '<article><div class="row articulo"> <h2 class="h2articulo"><span class="pesta1">Nro '.$contenidos[$i]['id'].'</span>Publicado por '.$contenidos[$i]['autor'].' / '.$fecha.'<br><span class="titulo">'.$tituloReducido.'</span></h2>';
									$contenidoPresentacionReducida = character_limiter($contenidos[$i]['contenido'],347);
									echo '<div class="span11 contexto"><p>'.nl2br($contenidoPresentacionReducida).'</p>';
									echo '<p><a class="btn btn-large btn-success" href="'.base_url().'contenido/verContenido/'.$contenidos[$i]['id'].'">Ver Detalles »</a></p>';
									
									echo '</div></div></article><hr>';
								}
					}//fin si hay algun error



							if (isset($contenidos)) {
								for ($i=0; $i < count($contenidos); $i++) {
									$date = date_create($contenidos[$i]['fecha']);
									$fecha=date_format($date,"d-m-Y g:i A");
									$tituloReducido = character_limiter($contenidos[$i]['titulo'],52);
									echo '<article><div class="row articulo"> <h2 class="h2articulo"><span class="pesta1">Nro '.$contenidos[$i]['id'].'</span>Publicado por '.$contenidos[$i]['autor'].' / '.$fecha.'<br><span class="titulo">'.$tituloReducido.'</span></h2>';
									$contenidoPresentacionReducida = character_limiter($contenidos[$i]['contenido'],347);
									echo '<div class="span11 contexto"><p>'.nl2br($contenidoPresentacionReducida).'</p>';
									echo '<p><a class="btn btn-large btn-success" href="'.base_url().'contenido/verContenido/'.$contenidos[$i]['id'].'">Ver Detalles »</a></p>';
									
									echo '</div></div></article><hr>';
								}

							}
						?>
								
	
						

					</div>
				</div>


					<!-- INICIO DE BARRA LATERAL -->
					<div class="span4">
						<h4 class="featurette-heading">Ahora estamos en.<br><span class="muted">Twitter Siguenos.</span></h4>
							<pre>Conectado a Twitter</pre>
						<div class="div_twitter">
							<a class="twitter-timeline" href="https://twitter.com/archivosupta" data-widget-id="406089868813426688">Tweets por @archivosupta</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
						<!-- Fin de la divivion del twitter-->	
					</div>
					<!--FIN DE BARRA LATERAL -->
						
					</div>
</div>
