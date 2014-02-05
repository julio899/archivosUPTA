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
	form.from_reg_doc{
		padding: 25px;
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
				<li><a href="<?php echo base_url().'administrador/registro_docentes';?>">CREAR CUENTA DOCENTE</a></li>
				<li><a href="#">SUSPENDER CUENTA</a></li>
			</ul>
		</li>
		<a class="btn btn-danger" href="<?php echo base_url().'identificacion/desconectarse';?>">SALIR</a>
	</ul>
</div>
