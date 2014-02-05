<div class="container">

<div id="contenedor_docente" class="row">
<form action="<?php echo base_url().index_page()."/docente/procesa_notificacion";?>" method="post">

<?php
if(isset($ok)){
	echo '<div id="alerta" class="alert alert-success">'.$ok.'</div>';
}
if(isset($error)){
	echo '<div id="alerta" class="alert alert-error">'.$error.'</div>';
}
?>	
	<!-- Barra lateral  de OPCIONES -->
	<div class="span3">


		<br>
		<br>
		<label>TODOS
		<input name="todos" type="checkbox" id="todos" value="10"></label>
		<label>Trayecto 1
		<input name="trayecto1" type="checkbox" id="t1" value="1"></label>
		<label>Trayecto 2
		<input name="trayecto2" type="checkbox" id="t2" value="2"></label>
		<label>Trayecto 3
		<input name="trayecto3" type="checkbox" id="t3" value="3"></label>
		<label>Trayecto 4
		<input name="trayecto4" type="checkbox" id="t4" value="4"></label>
		<script type="text/javascript">
		$(document).ready(function(){

			$("#todos").click(function(){
				
				if(this.checked){
					$("#t1").removeAttr("checked");
					$("#t2").removeAttr("checked");
					$("#t3").removeAttr("checked");
					$("#t4").removeAttr("checked");
					$("#t1").attr("disabled","disabled");
					$("#t2").attr("disabled","disabled");
					$("#t3").attr("disabled","disabled");
					$("#t4").attr("disabled","disabled");
				}else{

					$("#t1").removeAttr("disabled");
					$("#t2").removeAttr("disabled");
					$("#t3").removeAttr("disabled");
					$("#t4").removeAttr("disabled");
				}
			});

			$('input[type=submit]').click(function(){
				//var todos=$('#todos');
				//alert('todos: '+todos.find('checked')+'\nt1: ');


			});

		});
		</script>
	</div>
	<!-- fin de barra de opciones-->


	<div class="span9">
		<div id="pantalla_docente">
			<p><b>Bienvenido al panel de envio de notificaciones por correo</b><br>Desde aqui podras informar y enviar correo a tus alumnos</p>
			<label>Titulo para describir la notificaci&oacute;n: </label><input id="titulo" type="text" class="borde" name="titulo" placeholder="Titulo para identificar su noticia..." required="required">
			<textarea id="msj_email" class="borde" rows="10" name="descripcion_email" placeholder="Escriba Aqui La Informacion..." required="required"></textarea>
			<br><hr>
			<input type="submit" value="Confirmar" class="btn btn-success btn-large">
			
		</div> 

				
	</div>
</form>

</div><!-- FIN DEL ROW CONTENIDO DOCENTE-->

</div><!-- FIN DEL CONTENEDOR-->