<div id="contenido" class="container">
		
	<div id="contenedor_noticias" class="row">
			<!-- Barra lateral  de OPCIONES -->
			<div class="span3">
				<!--<ul class="nav nav-list bs-docs-sidenav affix-top">
		          <li class="active"><a href="#typography"><i class="icon-info-sign"></i> Actualizar Mi Informaci&oacute;n</a></li>
		          <li class=""><a href="#code"><i class="icon-exclamation-sign"></i> Modificar Contenidos</a></li>
		          <li class=""><a href="#tables"><i class="icon-eye-open"></i> Visualizar Comentarios</a></li>
		        </ul>-->
			</div>
			<!-- fin de barra de opciones-->

			<div class="span9">
				<h1>CREACION DE NOTICIAS</h1>
				<!--Formulario para envio de la informacion-->
				<form action="<?php echo base_url().index_page()."docente/registrar_nueva_noticia";?>" class="form-horizontal" method="post">
					<label>Titulo para describir la noticia: </label><input id="titulo" type="text" class="input-xxlarge borde" name="titulo" placeholder="Escriba algun Titulo para identificar su noticia..." required="required">
					<label>Descripci&oacute;n: </label><textarea class="input-block-level borde" rows="10" name="descripcion" placeholder="Escriba Aqui La Informacion..." required="required"></textarea><br><hr>
						<input type="submit" value="Confirmar" class="btn btn-success btn-large">
				</form>

			</div>
	</div>
</div>