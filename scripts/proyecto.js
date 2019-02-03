
function init(){

	$("#formularioRegistro")
		.on("submit", function(e){
			guardarEditar(e);
	})

}


//Funcion limpiar
function limpiar(){
	$("#cliente").val("");
	$("#categoria").val("");
	$("#proyecto").val("");
	$("#fechaini").val("");
	$("#fechafin").val("");
}

function guardarEditar(e){
	e.preventDefault(); //No se Activa la accion preterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formularioRegistro")[0]);

	$.ajax({
		url: '../ajax/proyecto.php?opt=guardarEditar',
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function(datos){
			bootbox.alert(datos);
		}
	});
	limpiar();
}
init();