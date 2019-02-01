<?php 

	require_once "../modelo/guardar.php";

	$consultor = new Consultor();

	$idconsultor=isset($_POST["idconsultor"])? limpiarCadena($_POST["idconsultor"]):"";
	$nombre=isset($_POST["nombre"])?limpiarCadena($_POST["nombre"]):"";
	$documento=isset($_POST["documento"])?limpiarCadena($_POST["documento"]):"";
	$linea=isset($_POST["linea"])?limpiarCadena($_POST["linea"]):"";
   
	switch ($_GET["opt"]){
		case 'guardarEditar':
			if (empty($idconsultor)) {
				$rspta = $consultor->insertar($nombre,$documento,$linea);
				echo $rspta ? "Consultor registrado" : "Error al  Registrar Consultor";
			}else{
				$rspta = $consultor->editar($idcategoria,$consultor,$documento,$linea);
				echo $rspta ? "Categoria Actualizada" : "Error al Actualizada Categoria";
			}
			break;
		case 'mostrar':
				$rspta=$consultor->login($idconsultor);
				echo json_encode($rspta);
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
		default:
			# code...
			break;
	}
 ?>