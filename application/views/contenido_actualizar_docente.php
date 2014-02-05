<div class="container">
<div  id="contenedor_docente" class="row">
	<div class="span3">
		<!-- Inicio Barra lateral de navegacion -->
		<ul class="nav nav-list bs-docs-sidenav affix-top">
          <li class="active"><a href="<?php echo base_url().'docente/actualizar';?>"><i class="icon-info-sign"></i> Actualizar Mi Informaci&oacute;n</a></li>
          <li class=""><a href="<?php echo base_url().'docente/modificar';?>"><i class="icon-exclamation-sign"></i> Modificar Contenidos</a></li>
          
        </ul>
        <!-- FIN de Barra lateral de navegacion -->
	</div>
	<div class="span9">
		<!-- Inicio delformulario para actualizar -->
				<?php $data_session=$this->session->userdata['datos_usuario'];
				//var_dump($this->session->userdata);?>
			<div id="pantalla_docente">
				<pre>Si deseas actualizar tu informaci&oacute;n. Lo puedes realizar desde aqu&iacute;</pre>
				<form class="form-inline" action="<?php echo base_url().'docente/procesar_actualizacion_datos_docente';?>" method="post">

          		<div class="control-group">
				    <label class="control-label" for="nombre">Nombre:</label>
					<input id="nombre" type="text" class="borde" name="nombre" placeholder="Nombre" required="required" value="<?php echo $data_session['nombre'];?>">
				</div>

          		<div class="control-group">
				    <label class="control-label" for="apellido">Apellido:</label>
					<input id="apellido" type="text" class="borde" name="apellido" placeholder="Apellido" required="required" value="<?php echo $data_session['apellido'];?>">

				    <label class="control-label" for="email">Correo Electronico:</label>
				<input id="email" type="email" class="borde" name="email" placeholder="E-mail" required="required" value="<?php echo $data_session['email'];?>">
				
				</div>
				<center><input type="submit" class="btn-large btn-primary" name="btnActualizar" value="ACTUALIZAR"></center>
				</form>
		
			</div>
		<!-- Fin del formulario para actualizar -->
	</div>
</div>
</div>