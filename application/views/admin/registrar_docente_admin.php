<div class="container contenido">
	<div class="row-fluid">

		<div class="span3">
			<img src="<?php echo base_url();?>img/logo_upta.jpg" class="img-polaroid"><br><br>

			<!--Inicio Barra Lateral-->
			<ul class="nav nav-list bs-docs-sidenav">
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
				    <form class="from_reg_doc" action="<?php echo base_url().'administrador/procesar_registro_docente'?>" method="post">
				    	<legend><strong>Registro de Docentes</strong></legend>
						

						<div class="row-fuid">
							<div class="span3">
						    	<label for="nombre">Nombre del Docente</label>
							</div>

							<div class="span9">
						    	<input id="nombre" type="text" name="nombre" placeholder="Nombre del Docente…" required="required">
						    </div>
						</div>
						

						<div class="row-fuid">
							<div class="span3">
						    <label for="Apellido">Apellido</label>
							</div>
							<div class="span9">
								 <input type="text" name="Apellido" placeholder="Apellido" required="required">
							</div>
						</div>



						<div class="row-fuid">
							<div class="span3">
								<label for="pass">Contrase&ntilde;a</label>
							</div>
							<div class="span9">
							<input type="password" name="pass" id="pass" required="required">
							</div>
						</div>




						<div class="row-fuid">
							<div class="span3">
							<label for="Repass">REPITA la Contrase&ntilde;a</label>
							</div>
							<div class="span9">
							<input type="password" name="Repass" id="Repass" required="required">
							</div>
						</div>

						<div class="row-fuid">
							<div class="span3">
						    	<label for="correo">Correo Electronico</label>
						    </div>
						    <div class="span9">
						    	<input type="email" id="correo" name="correo" placeholder="Correo@Electronico.com" required="required">
							</div>
						</div>


						<div class="row-fuid">
							<div class="span3">
						    </div>
						    <div class="span9">
						    <button type="submit" class="btn btn-primary btn-large">Registrar</button>
							</div>
						</div>
							
						    
				    </form>

		</div>

	</div>
</div>