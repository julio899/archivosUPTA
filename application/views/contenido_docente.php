<div class="container">

<div id="contenedor_docente" class="row">


<?php
if(isset($ok)){
	echo '<div id="alerta" class="alert alert-success">'.$ok.'</div>';
}
?>	
	<!-- Barra lateral  de OPCIONES -->
	<div class="span3">
		<ul class="nav nav-list bs-docs-sidenav affix-top">
          <li class=""><a href="<?php echo base_url().'docente/actualizar';?>"><i class="icon-info-sign"></i> Actualizar Mi Informaci&oacute;n</a></li>
          <li class=""><a href="<?php echo base_url().'docente/modificar';?>"><i class="icon-exclamation-sign"></i> Modificar Contenidos</a></li>
        </ul>
	</div>
	<!-- fin de barra de opciones-->


	<div class="span9">
		<div id="pantalla_docente"><p><b>Bienvenido al panel de Docente</b><br>Desde aqui podras actualizar la informaci&oacute;n de tu cuenta.<br>subir contenidos, enviar informaci&oacute;n u notificaciones de algun cambio a todos tus alumnos<br> y responder a los comentarios de tus alumnos</p></div> 
	</div>
</div>
</div>
