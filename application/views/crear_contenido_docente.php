
<div class="container">

<div id="contenedor_docente" class="row">


<?php
if(isset($ok)){
	echo '<div id="alerta" class="alert alert-success">'.$ok.'</div>';
}
if(isset($error)){
	echo '<div id="alerta" class="alert alert-error">'.$error.'</div>';
}
?>	
<form action="<?php echo base_url().'docente/procesar_contenido';?>" method="POST" enctype="multipart/form-data">
	<!-- Barra lateral  de OPCIONES -->
	<div class="span3">
		<style type="text/css">
		p.nota{
			background-color:#DFF5D3;
			padding: 10px;
			border: 1px solid black;
			border-style: dashed;
			font-style: oblique;
			text-align: justify;
			text-indent: 20px;
		}

		/* CSS Created by CSS CHECKBOX */
/**********************************/
/**** www.CSScheckbox.com *********/

/*general styles for all CSS Checkboxes*/
input[type=checkbox].css-checkbox {
	display:none;
}

input[type=checkbox].css-checkbox + label.css-label {
	padding-left:20px;
	height:15px; 
	display:inline-block;
	line-height:15px;
	background-repeat:no-repeat;
	background-position: 0 0;
	font-size:15px;
	vertical-align:middle;
	cursor:pointer;
}

input[type=checkbox].css-checkbox:checked + label.css-label {
	background-position: 0 -15px;
}

.css-label{
	background-image:url(http://csscheckbox.com/checkboxes/dark-check-green.png);
}
.css-label:hover{

	background-color: orange;
}

/*specific classes related to Checkbox skins*/

.lite-green-check{background-image:url(http://csscheckbox.com/checkboxes/lite-green-check.png);}
.lite-blue-check{background-image:url(http://csscheckbox.com/checkboxes/lite-blue-check.png);}
.lite-gray-check{background-image:url(http://csscheckbox.com/checkboxes/lite-gray-check.png);}
.lite-cyan-check{background-image:url(http://csscheckbox.com/checkboxes/lite-cyan-check.png);}
.lite-orange-check{background-image:url(http://csscheckbox.com/checkboxes/lite-orange-check.png);}
.lite-red-check{background-image:url(http://csscheckbox.com/checkboxes/lite-red-check.png);}

.lite-x-cyan{background-image:url(http://csscheckbox.com/checkboxes/lite-x-cyan.png);}
.lite-x-gray{background-image:url(http://csscheckbox.com/checkboxes/lite-x-gray.png);}
.lite-x-blue{background-image:url(http://csscheckbox.com/checkboxes/lite-x-blue.png);}
.lite-x-orange{background-image:url(http://csscheckbox.com/checkboxes/lite-x-orange.png);}
.lite-x-red{background-image:url(http://csscheckbox.com/checkboxes/lite-x-red.png);}
.lite-x-green{background-image:url(http://csscheckbox.com/checkboxes/lite-x-green.png);}

.mac-style{background-image:url(http://csscheckbox.com/checkboxes/mac-style.png);}
.mario-style{background-image:url(http://csscheckbox.com/checkboxes/mario-style.png);}
.alert-style{background-image:url(http://csscheckbox.com/checkboxes/alert-style.png);}
.lite-plus{background-image:url(http://csscheckbox.com/checkboxes/lite-plus.png);}
.dark-plus{background-image:url(http://csscheckbox.com/checkboxes/dark-plus.png);}
.dark-plus-cyan{background-image:url(http://csscheckbox.com/checkboxes/dark-plus-cyan.png);}
.dark-plus-orange{background-image:url(http://csscheckbox.com/checkboxes/dark-plus-orange.png);}
.dark-check-cyan{background-image:url(http://csscheckbox.com/checkboxes/dark-check-cyan.png);}
.dark-check-green{background-image:url(http://csscheckbox.com/checkboxes/dark-check-green.png);}
.dark-check-orange{background-image:url(http://csscheckbox.com/checkboxes/dark-check-orange.png);}


.depressed-lite-small{background-image:url(http://csscheckbox.com/checkboxes/depressed-lite-small.png);}
.elegant{background-image:url(http://csscheckbox.com/checkboxes/elegant.png);}
.depressed{background-image:url(http://csscheckbox.com/checkboxes/depressed.png);}
.chrome-style{background-image:url(http://csscheckbox.com/checkboxes/chrome-style.png);}
.web-two-style{background-image:url(http://csscheckbox.com/checkboxes/web-two-style.png);}
.redditor{background-image:url(http://csscheckbox.com/checkboxes/redditor.png);}

input[type=checkbox].css-checkbox.med + label.css-label.med {
	padding-left:22px;
    height:17px; 
	display:inline-block;
	line-height:17px;
	background-repeat:no-repeat;
	background-position: 0 0;
	font-size:15px;
	vertical-align:middle;
    cursor:pointer;
}

input[type=checkbox].css-checkbox.med:checked + label.css-label.med {

    background-position: 0 -17px;
}
input[type=checkbox].css-checkbox.sme + label.css-label.sme {
	padding-left:22px;
    height:16px; 
	display:inline-block;
	line-height:16px;
	background-repeat:no-repeat;
	background-position: 0 0;
	font-size:15px;
	vertical-align:middle;
    cursor:pointer;
}

input[type=checkbox].css-checkbox.sme:checked + label.css-label.sme{

    background-position: 0 -16px;
}
input[type=checkbox].css-checkbox.lrg + label.css-label.lrg {
	padding-left:22px;
    height:20px; 
	display:inline-block;
	line-height:20px;
	background-repeat:no-repeat;
	background-position: 0 0;
	font-size:15px;
	vertical-align:middle;
    cursor:pointer;
}

input[type=checkbox].css-checkbox.lrg:checked + label.css-label.lrg{

    background-position: 0 -20px;
}


input[type=checkbox].css-checkbox.mlg + label.css-label.mlg {
	padding-left:22px;
    height:18px; 
	display:inline-block;
	line-height:18px;
	background-repeat:no-repeat;
	background-position: 0 0;
	font-size:15px;
	vertical-align:middle;
    cursor:pointer;
}

input[type=checkbox].css-checkbox.mlg:checked + label.css-label.mlg {

    background-position: 0 -18px;
}

		</style>
		
		<p class="nota"><small>Si desea enviar alguna notificaci&oacute;n por el correo sobre este contenido seleccione a que trayecto desea que le llegue la notificaci&oacute;n.</small></p>
		
		<input type="checkbox" name="todos" class="css-checkbox" id="todos" value="10">
		<label for="todos" class="css-label lite-green-check">TODOS</label>
		<br>
		<input type="checkbox" name="trayecto1" class="css-checkbox" id="t1" value="1">
		<label for="t1" class="css-label lite-green-check">Trayecto 1</label>
		<br>
		<input type="checkbox" name="trayecto2" class="css-checkbox" id="t2" value="2">
		<label for="t2" class="css-label lite-green-check">Trayecto 2</label>
		<br>
		<input type="checkbox" name="trayecto3" class="css-checkbox" id="t3" value="3">
		<label for="t3" class="css-label lite-green-check">Trayecto 3</label>
		<br>
		<input type="checkbox" name="trayecto4" class="css-checkbox" id="t4" value="4">
		<label for="t4" class="css-label lite-green-check">Trayecto 4</label>



		<hr>
		<input id="btn_confirmacion" type="submit" class="btn btn-warning btn-large" value="CONFIRMAR">

	</div>
	<!-- fin de barra de opciones-->


	<div class="span9">
		<div id="pantalla_docente">
			<p><b>Creaci&oacute;n de Contenidos</b><br>La informaci&oacute;n generada en esta secci&oacute;n sera publicada en el portal y sera enviado un E-Mail a los alumnos en caso de que asi lo selecciones.</p>
		<input id="titulo" type="text" class="borde" name="titulo" placeholder="Titulo para identificar su noticia..." title="Titulo del contenido." required="required">
		<textarea id="msj_email" class="borde" rows="10" name="contenido" placeholder="Escriba Aqui La Informacion..." title="Descripción del contenido." required="required"></textarea>
		
		<div class="archivo"><br>
			<div id="status">
				<img id="imgPrecarga" src="<?php echo base_url();?>/img/loader_barra.gif" alt="precarga">
			</div>
			<input id="campo_archivo" type="file" name="campo_archivo">
		</div>
		</div><!-- Fin del div pantalla docente--> 
		<!--Agregando Funcionalidad al Loader para los archivos-->
		<script type="text/javascript" src="<?php echo base_url();?>js/funcionalidadCargador.js"></script>
	</div><!-- Fin del divde 9 espacios--> 

</form>

</div>
</div>