$(document).ready(function(){
$("#imgPrecarga").hide();
/*Opciones de los check*/
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


/*si preciona el Boton Confirmar*/
	$('input#btn_confirmacion').click(function(event){
	var contenidoTitulo=$("#titulo").val().split();
	var contenidoInformacion=$("#msj_email").val().split();
if($("#titulo").val().length < 6){
alert("El titulo es muy corto. \nDebes colocar un titulo mas descriptivo \nDebe contener almenos 7 caracteres.");
}else if($("#msj_email").val().length < 6){
alert("El contenido es excesivamente corto.\n Debes ampliar mas el contenido.");

}else{


		if(confirm('Esta Seguro de Confirmar este contenido.?\nPorfavor Revise ya que sera publicado.')){
	$("#imgPrecarga").show();
	$("#info_carga").html('');
	$("#status").append('<span id="info_carga" class="label label-info">Su Archivo Esta siendo Cargado <i class="icon-arrow-up"> </i> en estos Momentos Porfavor Espere...</span>');
		}else{
			event.preventDefault();
			$("#status").hide();
			
		}


}// fin de los elseif  si el titulo o  el contenido son muy cortos

	});

});
