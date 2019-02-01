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

			swal("Buen Trabajo",datos,"success");
		}
	});
	limpiar();
}
//Funcion Listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//Activamos el procedimiento del datatables
		"aServerSide": true,//Paginamos y filtramos realizando por el servidor
		dom: 'Bfrtip',//Definimos los elementos del control de tabla
		buttons:[
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdf'
		],
		"ajax":{
			url: '../ajax/consultor.php?opt=listar',
			type : "get",
			dataType : "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginacion cada 5 registros
		"order": [["0","desc"]]//Ordenar (Columna, orden)
	}).DataTable();
}

init();