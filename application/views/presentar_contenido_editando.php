<div class="container">
<div  id="contenedor_docente" class="row">
	<div class="span3">
		<!-- Inicio Barra lateral de navegacion -->
		<ul class="nav nav-list bs-docs-sidenav affix-top">
          <li class=""><a href="<?php echo base_url().index_page().'/docente/actualizar';?>"><i class="icon-info-sign"></i> Actualizar Mi Informaci&oacute;n</a></li>
          <li class="active"><a href="<?php echo base_url().index_page().'/docente/modificar';?>"><i class="icon-exclamation-sign"></i> Modificar Contenidos</a></li>
          
        </ul>
        <!-- FIN de Barra lateral de navegacion -->
	</div>
	<div class="span9">
		<!-- Inicio delformulario para actualizar -->
				<?php $data_session=$this->session->userdata['datos_usuario'];
				
				?>
			<div id="pantalla_docente">

				<?php
					if(isset($contenido_edicion)){
						?>
					<pre>EDICION DEL CONTENIDO BAJO EL NUMERO <span class="badge badge-success"><?php echo $contenido_edicion[0]['id']?></span> PUBLICADO EL <span class="label label-info"><?php echo date_format(date_create($contenido_edicion[0]['fecha']),"d-m-Y g:i A"); ?></span></pre>
					<form action="<?php echo base_url().index_page().'/docente/modificacion_contenido';?>" method="POST">
						<input id="titulo" type="text" class="borde" name="titulo" placeholder="Titulo para identificar su noticia..." value="<?php echo $contenido_edicion[0]['titulo']?>" required="required">
						<textarea id="msj_email" class="borde" rows="10" name="contenido" placeholder="Escriba Aqui La Informacion..." required="required"><?php echo $contenido_edicion[0]['contenido']?></textarea>
						<input type="hidden" name="id_contenido" value="<?php echo $contenido_edicion[0]['id']?>">
						<input type="submit" class="btn btn-warning btn-large" value="CONFIRMAR">
					</form>					

					<?php
				}
				?>
			</div>
		<!-- Fin del formulario para actualizar -->
	</div>
</div>
</div>