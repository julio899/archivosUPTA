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
				//var_dump($this->session->userdata);?>
			<div id="pantalla_docente">
				<pre>Presentador de Contenidos</pre>
				<?php 
				if(isset($contenidos_usuario)){
					echo "Usted ha subido <span class=\"badge badge-info\">".count($contenidos_usuario)."</span> CONTENIDOS.";
					?>
						<table class="table">
							<thead>
								<tr>
									<th>Nro.</th>
									<th>Titulo</th>
									<th>Fecha</th>
									<th>Acci&oacute;n</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($i=0; $i < count($contenidos_usuario); $i++) { 
									# recorremos los contenidos para generar la tabla
									
									echo "<tr>
												<td><span class=\"badge badge-warning\">".$contenidos_usuario[$i]['id']."</span></td>
												<td>".$contenidos_usuario[$i]['titulo']."</td>
												<td>".date_format(date_create($contenidos_usuario[$i]['fecha']),"d-m-Y g:i A")."</td>
												<td><a href=\"".base_url().index_page()."/docente/editando/".$contenidos_usuario[$i]['id']."\" class=\"btn btn-warning\">Editar</a></td>
										</tr>";
								}?>
								<!--
								<tr>
									<td>1</td>
									<td>2</td>
									<td>3</td>
									<td>4</td>
								</tr>-->
							</tbody>
						</table>

					<?
					//var_dump($contenidos_usuario);
				}
				?>
			</div>
		<!-- Fin del formulario para actualizar -->
	</div>
</div>
</div>