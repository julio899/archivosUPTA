<div class="container">
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
				<h1>NOTICIAS</h1>
				<?php
					if (isset($noticias)) {
						echo "<pre>Existen ".count($noticias)." Noticias.</pre>";
						for ($i=0; $i < count($noticias); $i++) { 
						echo '<div class="bloque-noticia">';
							# Mostramos la Noticia
							echo "<h3 class=\"breadcrumb\"><a href=\"\">".utf8_decode($noticias[$i]['titulo'])."</a>  <span class=\"divider\">/</span> <i class=\"icon-briefcase\"></i> ".$noticias[$i]['nombre']." ".$noticias[$i]['apellido']."</h3>";
							echo "<p>".nl2br(utf8_decode($noticias[$i]['descripcion']))."</p>";
							//$fecha=date_format($noticias[$i]['fecha'], "Y-m-d");
							echo "<div class=\"fecha\">Fecha: ".$noticias[$i]['fecha']."</div>";
						echo "</div>";
						}
					}
				?>
			</div>
	</div>
</div>