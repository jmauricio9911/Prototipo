
function init(){
	$("#registrohora")
		.on("submit", function(e){
			guardarEditar(e);
	})


}


//Funcion limpiar
function limpiar(){
	$("#consultor").val("");
	$("#cliente").val("");
	$("#proyecto").val("");
	$("#tipo").val("");
	$("#hora").val("");
	$("#thora").val("");
	$("#descripcion").val("");
}

function guardarEditar(e){
	e.preventDefault(); //No se Activa la accion preterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#registrohora")[0]);

	$.ajax({
		url: '../ajax/registrodia.php?opt=guardarEditar',
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