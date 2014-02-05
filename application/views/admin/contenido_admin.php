
<div class="contenido container">
	<div class="row-fluid">
		<div class="span3 bs-docs-sidebar">
			<img src="<?php echo base_url();?>img/logo_upta.jpg" class="img-polaroid"><br><br>

			<!--Inicio Barra Lateral-->
			<ul class="nav nav-list bs-docs-sidenav affix">
	          <li class="active"><a href="#"><i class="icon-chevron-right"></i> INICIO</a></li>
	          <li><a href="#"><i class="icon-chevron-right"></i> Historial de Visitas</a></li>
	          <li><a href="#"><i class="icon-chevron-right"></i> Historial de Ingresos</a></li>
	          <li><a href="#"><i class="icon-chevron-right"></i> Ultimas Publicaciones</a></li>
	          <li><a href="#"><i class="icon-chevron-right"></i> Ultimos Comentarios</a></li>
	          
	        </ul>
	        <!-- Fin de Barra lateral-->
		</div>
			
		<div class="span9">

	<?php
			if(isset($error)){
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Ha ocurrido un error!</strong>  '.$error.'</div>';
			}
			if(isset($ok)){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Exito!</strong>  '.$ok.'</div>';
			}

		?>
			<!-- Inicio de las Secciones-->
			<section class="dropdowns">
				<div class="page-header">
		            <h1>Bienvenido al Panel  de ADMINISTRADOR</h1>
		          </div>
				<p class="bs-docs-example">
					<pre>Actualmente  nos encontramos en desarrollo de este modulo...<br>La Administracion se realiza actualmente desde el codigo Fuente.<br>
					</pre>
		            <button type="button" class="btn btn-large" disabled="">Preparando Nuevas Opciones</button>
		            <button type="button" class="btn btn-large btn-primary disabled" disabled="disabled">Extras</button>
		        </p>

			</section>
			<!-- Fin  de  las secciones -->
		</div>
	</div>
</div>