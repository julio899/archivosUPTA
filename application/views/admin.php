<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>

    <link href="<?php echo base_url();?>img/favicon.ico" title="Icon" type="image/x-icon" rel="icon" /> 
    <link href="<?php echo base_url();?>img/favicon.ico" title="Icon" type="image/x-icon" rel="shortcut icon" />

	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	
	<style>
	div.cabecera>ul{
		width: 100%;
	}
	div.contenido{
		margin-top: 60px;
	}
	ul.navegador{
		background-color:#08c;
	
	}
	ul.navegador>li{
	border:0px;
	border-color: transparent;	
	}
	div.cabecera>ul.navegador>li>a,
	div.cabecera>ul.navegador>li>a:hover{
	color:white;
	border:0px;	
	border-color: transparent;	
	}
	</style>
</head>
<body>
<div class="cabecera navbar navbar-inverse navbar-fixed-top">
	<ul class="navegador nav nav-tabs">
		<li class="active"><a href="<?php echo base_url();?>">PRINCIPAL</a></li>
		<li><a href="#">CONTENIDOS</a></li>
		<li><a href="#">COMENTARIOS</a></li>
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">OPCIONES <b class="caret"></b></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#">CREAR CUENTA DOCENTE</a></li>
				<li><a href="#">SUSPENDER CUENTA</a></li>
			</ul>
		</li>
		<a class="btn btn-danger" href="<?php echo base_url().'identificacion/desconectarse';?>">SALIR</a>
	</ul>
</div>

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
			<!-- Inicio de las Secciones-->
			<section class="dropdowns">
				<div class="page-header">
		            <h1>Bienvenido al Panel  de ADMINISTRADOR</h1>
		          </div>
				<p class="bs-docs-example">
					<pre>Actualmente  nos encontramos en desarrollo de este modulo...<br>La Administracion se realiza actualmente desde el codigo Fuente.<br>
					</pre>
		            <button type="button" class="btn btn-large btn-primary disabled" disabled="disabled">Prueba Desabilitando</button>
		            <button type="button" class="btn btn-large" disabled="">Botones Desabilitados</button>
		        </p>

			</section>
			<!-- Fin  de  las secciones -->
		</div>
	</div>
</div>
<div class="pie_pagina"></div>
</body>
</html>