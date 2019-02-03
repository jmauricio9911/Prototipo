function init(){

	$("#formulario").on("submit",function(e){
		guardarEditar(e);
	})
}


//Funcion limpiar
function limpiar(){
	$("#idconsultor").val("");
	$("#nombre").val("");
	$("#documento").val("");
	$("#linea").val("");
}

function guardarEditar(e){
	e.preventDefault(); //No se Activa la accion preterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: '../ajax/consultor.php?opt=guardarEditar',
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function(datos){
			//bootbox.alert

			swal("Registro Exitoso",datos,"success");
		}
	});
	limpiar();
}

init();