<style type="text/css" media="screen">
div.form_registro{
	margin-left: 10%;
	margin-top: 100px;
	width: 50%;
}
div.formulario{
	margin-top: 25px;
}
div.formulario>h3,
div.formulario>pre{
	margin-left: 30px;
}
input#inputReClave,input#inputClave,input#inputNombre,input#inputApellido,#inputEmail{
	width: 350px;
}
#formu{
	margin:55px;
}
</style>
<div class="formulario row-fluid show-grid">

      <h3>Informaci&oacute;n de Registro UPTA</h3>
         
          <?php if(isset($error)){
          	echo "<div class=\"alert alert-error\">$error</div>";
          }else{

          			echo "<pre>Bienvenido al Registro</pre>";
          }?>
          
 <form id="formu" action="<?php echo current_url()."/verificacion";?>" method="post">
          		








				


<div class="row-fluid">

  <div class="span4">
  	     		<div class="control-group">
				    <label class="control-label" for="inputNombre">Nombre</label>
				    <div class="controls">
				    <input name="campo_nombre" type="text" id="inputNombre" placeholder="Su Nombre" required="required">
					</div>
				</div>

  </div>
  	

  	<div class="span4">
          		<div class="control-group">
				    <label class="control-label" for="inputApellido">Apellido</label>
				    <div class="controls">
				    <input name="campo_apellido" type="text" id="inputApellido" placeholder="Apellido" required="required">
					</div>
				</div>
	</div>

  	<div class="span4">
          		<div class="control-group">
				    <label class="control-label" for="inputEmail">Correo Electronico</label>
				    <div class="controls">
				      <input name="campo_email" type="email" id="inputEmail" placeholder="correo@dominio.com" required="required">
				    </div>
				</div>
	</div>
</div>


<div class="row-fluid">
<div class="span2 offset10"></div>
</div>

<div class="row-fluid">


  <div class="span4">
          		<div class="control-group">
				    <label class="control-label" for="inputClave">Contrase&ntilde;a</label>
          			<div class="controls">
				    <input name="campo_clave" type="password" id="inputClave" required="required">
				   	</div>
				</div>
  </div>
  <div class="span4">
          		<div class="control-group">
				    <label class="control-label" for="inputReClave">Repita la Contrase&ntilde;a</label>
          			<div class="controls">
				    <input name="campo_reclave" type="password" id="inputReClave" required="required">
				   	</div>
				</div>
</div>
  <div class="span4">
  				<div class="control-group">
					<label for="trayecto">Trayecto</label>
						<div class="controls">
							    <select name="campo_trayecto" id="trayecto">
								  <option>1</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								</select>
						</div>
				</div>	
</div>


</div>

<div class="row-fluid">

  <div class="span4">
  				<div class="control-group">
					<label for="trayecto">Turno</label>
						<div class="controls">
							    <select name="campo_turno" id="trayecto" required="required">
								  <option></option>
								  <option>MA&Ntilde;ANA</option>
								  <option>TARDE</option>
								  <option>NOCHE</option>
								</select>
						</div>
				</div>	
</div>
<div class="span4">	
  				<div class="control-group">
					<label for="seccion">Secci&oacute;n</label>
						<div class="controls">
								<input name="campo_seccion" id="seccion" type="number" name="quantity" min="1" max="5"  required="required">
						</div>
				</div>
				
  </div>

  <!-- Boton para registrar-->
  <div class="span4"><input type="submit" class="btn-large btn-primary" name="" value="REGISTRAR"></div>
</div>

          </form>	
</div> <!--Fin de la Div Form Registro -->
