<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="robots" content="noodp, noydir">
<meta name="referrer" content="default" id="meta_referrer">
<meta property="og:type" content="university">
<meta property="og:description" content="comparte informacion de importancia, archivos, tutoriales, para la comunidad UPTA,  comunidad UPTA Maracay Estado Aragua...">
<!-- INICIO de Los METADATOS -->
<META NAME="AUTHOR" CONTENT="Julio Vinachi, María Lozada, Yerrikha Uztaris, Miguel Días"/>
<META NAME="DESCRIPTION" CONTENT="Archivos UPTA, UPTA-FILE, aplicación para mejorar la comunicación docente-estudiante y el envió de información y recursos."/>
<META NAME="KEYWORDS" CONTENT="Archivos UPTA,UPTA-FILE,UPT Aragua Federico Brito Figueroa,Universidad Politécnica Territorial del Estado Aragua Federico Brito Figueroa"/>
<META NAME="Revisit-after" CONTENT="3 days"/>

    <link href="<?php echo base_url();?>img/favicon.ico" title="Icon" type="image/x-icon" rel="icon" /> 
    <link href="<?php echo base_url();?>img/favicon.ico" title="Icon" type="image/x-icon" rel="shortcut icon" />

	<title>UPTAFILE <?php echo date("Y");?> - Archivos UPTA / UPTA MARACAY, Federico Brito Figueroa</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-responsive.css">
<!-- para las Ñ y acentos -->
<!--<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> -->
<!-- archivos usados para el silder-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/estiloUPTA.css" />
<style>
		@font-face {
		  font-family: 'PT Sans Narrow';
		  font-style: normal;
		  font-weight: 400;
		  src: local('PT Sans Narrow'), local('PTSans-Narrow'), url('<?php echo base_url()."font/4.woff";?>') format('woff');
		}
		body,header,footer,html{
			cursor: url('<?php echo base_url()."img/Normal.cur";?>'),default;
			font-family: 'PT Sans Narrow', arial, sans-serif;
			font-size: 17px;
		}

		*{
			cursor: url('<?php echo base_url()."img/Normal.cur";?>'),auto;
		}

		a:hover,input[type='bottom'],input[type='submit'],input[type="checkbox"]:focus,input[type="checkbox"],label{
		cursor: url('<?php echo base_url()."img/Link.cur";?>'),auto;	
		}
		textarea,input[type='text'],input[type='email'],input[type='password']{
		cursor: url('<?php echo base_url()."img/text.cur";?>'),default;	
		}
</style>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.1.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-carousel.js" ></script>


<script>

	$(document).ready(function(){
	    $(".dublincore").hide();
		$('.carousel').carousel();

	});

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45779410-1', 'archivosupta.com.ve');
  ga('send', 'pageview');

</script>
</head>

<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KC9GKJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KC9GKJ');</script>
<!-- End Google Tag Manager -->
<div class="distribucion-cabecera navbar-inverse">
	
	<div class="row-fluid">
	    <div class="span3 div-cont-logo">
	    	<!-- [Logotipo] -->
	    	<h1 class="logo-h1"><a class="brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>img/logo.png" alt="LogoTipo"/> UPTA-FILE <?php echo date("Y");?></a></h1>
	    </div>

	    <div class="span5">
	    	<!--Barra de Menu-->

	    	<div class="navbar">
				<div class="bg-tarsparente">
							<ul class="nav">
								<li <?php if(isset($GLOBALS['pagina_inicio'])){ echo 'class="active"';} ?> ><a href="<?php echo base_url();?>">Inicio</a></li>
								<li <?php if(isset($GLOBALS['pagina_noticias'])){ echo 'class="active"';} ?> ><a href="<?php echo base_url().'noticias';?>">Noticias</a></li>
								<li><a target="_blank" href="https://twitter.com/archivosupta">Twitter</a></li>
								<li <?php if(isset($GLOBALS['pagina_contactos'])){ echo 'class="active"';} ?> ><a href="<?php echo base_url().'contactos';?>">Contactos</a></li>

								<?php 
								if($this->session->userdata('datos_usuario'))
								{
										$data=$this->session->userdata('datos_usuario');
								}

								if(isset($data['tipo'])&&$data['tipo']=='D'){   ?>
          						<li <?php if(isset($GLOBALS['pagina_panel_docente'])){ echo 'class="active"';} ?> ><a href="<?php echo base_url().'docente';?>"> Panel Docente</a></li>
          						<?php 		}//fin del if  ?>

							</ul>
				</div>
			</div>

		<!-- Fin de la barra de menu-->
	    </div>
	    <div class="span4 formu-ingreso">

							<?php 
								if($this->session->userdata('datos_usuario')){
										$data=$this->session->userdata('datos_usuario');
										?>
									<div class="row-fluid">
										<div class="span10">
												<div class="alert alert-success alert-ingreso">
													 <b>Bienvenido </b><?php echo strtoupper($data['nombre']." ".$data['apellido'])."<br>Te has identificado como ".$data['usuario']; ?>
												</div>
										</div>
										
										<div class="span2">
											<a class="btn btn-danger" href="<?php echo base_url().'identificacion/desconectarse';?>">Salir</a>
										</div>
									</div>		
									<?php
									}else{
							?>
			<!-- Inicio de INGRESO-LOGIN -->
								<form class="form-horizontal form-search" action="<?php echo base_url()."identificacion";?>" method="POST">
									<input type="text" name="usuario" class="input-small search-query" id="user" placeholder="Usuario" required="required"/>
									<input type="password" name="clave" class="input-small"  id="pass" placeholder="Clave" required="required"/>
									<input type="submit" class="btn btn-primary" value="Entrar"/>
									<a href="<?php echo base_url().'registro';?>" class="btn btn-warning">Registro</a>
								</form>

			<!-- FIN de INGRESO-LOGIN-->
			<?php
				//fin del else
				}
			?>
	    </div>
    </div>


<div class="row-fluid">
    	<div class="span3">
				<!--Slogan-->
				<p class="slogan2">Innovando Ideas Creativas...</p>
    	</div>

    	<div class="span9">
    		<!-- Barra si esta autenticado-->


				<?php if($this->session->userdata('datos_usuario')){
							$userData=$this->session->userdata('datos_usuario');
							//condicinal si es ADMINISTRADOR

							if($userData['tipo']=='A'){
?>
    <ul id="barra-opt2" class="nav">
    	<li><a href="<?php echo base_url().'administrador';?>"  title="Panel de Administrador"><i class="icon-th icon-white"></i>Panel Administrador</a></li>
    </ul>
<?
							}
							//condicional Muestra esta Barra si es un Docente
							if($userData['tipo']=='D'){
					?>
				<!--inicio de la barra de opciones -->

	<div class="navbar container barra-opciones-new">
    
    <ul id="barra-opt2" class="nav">
    	<li><a href="<?php echo base_url().'docente/crear_contenido';?>"  title="Crea un Contenido &oacute; Gu&iacute;a"><i class="icon-file icon-white"></i>Crear Contenido</a></li>
		<li><a href="<?php echo base_url().'docente/notificar';?>" title="Informar via E-Mail"><i class="icon-envelope icon-white"></i>Notificar por Correo</a></li>
		<li><a href="<?php echo base_url().'docente/crear_noticia';?>" title="Informar de Eventos o Actividades"><i class="icon-bullhorn icon-white"></i>Generar Noticia</a></li>
							
    </ul>
    </div>
				<?php
							}//fin del condicional si el tipo de usuario es 'D' un Docente


			}//fin de la barra si encuentra datos de usuario
			?>
				<!--FIN de la barra de opciones -->
    		<!-- Fin de barra si se autentico-->

    	</div><!-- Fin de span9-->
</div><!-- fin de row-fluid segunda linea-->


</div><!--  [Fin de la nueva cabecera] -->

<?php if(isset($GLOBALS['pagina_inicio'])){
?>


<!-- [INICIO] Silder -->
<div id="myCarousel" class="carousel slide">
	<ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	    <li data-target="#myCarousel" data-slide-to="3"></li>
	    <li data-target="#myCarousel" data-slide-to="4"></li>
	</ol>
		  <!-- Carousel items -->
		  <div class="carousel-inner">

		   		<div class="active item"><img src="./silder/img/slider-bg-1.jpg" alt="img1">
			    	<div class="carousel-caption">
			    		<h4>Innovando Ideas Creativas... </h4>
			    		<p>Promoviendo el Uso de herramientas tecnológicas.</p>
<!-- Botón +1. -->
<div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300"></div>

<!-- Script del Botón +1. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'es'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
			    	</div>
			    </div>
			    
			    <div class="item"><img src="./silder/img/slider-bg-2.jpg" alt="img2">
			    	<div class="carousel-caption">
			    		<h4>Herramientas útil, rapida y facil de usar...</h4>
			    		<p>Desarrollado en funci&oacute;n de las necesidades de la UPTA.</p>
			    	</div>
			    </div>

			    <div class="item"><img src="./silder/img/slider-bg-7.jpg" alt="img7"></div>
			    <div class="item"><img src="./silder/img/slider-bg-8.jpg" alt="img8"></div>
			    
			    <div class="item"><img src="./silder/img/slider-bg-4.jpg" alt="img9">
			    	<div class="carousel-caption">
			    		<h4>Ya no seas un Docente a la Antigua.</h4>
			    		<p>Existen Herramientas que te agilizan el trabajo y brindan una exelente forma de comunicarte con tus alumnos de una manera muy eficiente.<br>Olvidate de estar enviando Multiples veces un contenido.</p>
			        </div>
	    		</div>
		  </div>
	  <!-- Carousel nav -->
	  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
	  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
<!-- [FIN] Silder -->
<?
}//si esta en la pagina de inicio muestro el silder
 ?>
<!-- <h1 class="titulo-principal">Bienvenidos a la paguina principal de UPTA-FILE</h1> -->
