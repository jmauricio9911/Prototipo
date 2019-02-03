<?php 

	require_once "../modelo/proyecto.php";

	$proyectos = new Proyecto();
	//Registro proyecto Consultor
	$idproyecto ="";
	$nombreconsultor=isset($_POST["consultor"])?limpiarCadena($_POST["consultor"]):"";
   	$cliente=isset($_POST["cliente"])?limpiarCadena($_POST["cliente"]):"";
   	$categoria=isset($_POST["categoria"])?limpiarCadena($_POST["categoria"]):"";
	$proyecto=isset($_POST["proyecto"])?limpiarCadena($_POST["proyecto"]):"";
	$fechaini=isset($_POST["fechaini"])?limpiarCadena($_POST["fechaini"]):"";
   	$fechafin=isset($_POST["fechafin"])?limpiarCadena($_POST["fechafin"]):"";
 
   		switch ($_GET["opt"]){
   			case 'guardarEditar':
			if (empty($idproyecto)){
				$rspta = $proyectos->insertarP($nombreconsultor,$cliente,$categoria,$proyecto,$fechaini,$fechafin);
				echo $rspta ? "Consultor registrado" : "Error al  Registrar Consultor";
			}else{
				$rspta = $proyecto->editar($idcategoria,$consultor,$documento,$linea);
				echo $rspta ? "Categoria Actualizada" : "Error al Actualizada Categoria";
			}
			break;

		case 'listar':
				$rspta=$consultor->listar($idconsultor);
				$data = array();
				while ($reg=$rspta->fetch_object()) {
					$data[] = array(
						"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idconsultor.')"><i class="fa fa-pencil"></i></button>',
						"1"=>$reg->consultor,
						"2"=>$reg->documento,
						"3"=>($reg->linea)
					);
				}
				$results = array(
					"sEcho"=>1,//Informacion para el  datatables
					"iTotalRecords"=>count($data),//enviamos el total registros al datable
					"iTotalDisplayRecords"=>count($data),//enviamos el total registros a visualizar
					"aaData"=>$data
				);
				echo json_encode($results);
			break;
	}

 ?>