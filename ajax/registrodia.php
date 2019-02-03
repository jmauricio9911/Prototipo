<?php 

	require_once "../modelo/registrodia.php";

	$registro = new Registro();
	//Registro proyecto Consultor
	$idregistro ="";
	$consultor=isset($_POST["consultor"])?limpiarCadena($_POST["consultor"]):"";
  	$cliente=isset($_POST["cliente"])?limpiarCadena($_POST["cliente"]):"";
  	$fehadia=date("Y-d-m");
  	$proyecto=isset($_POST["proyecto"])?limpiarCadena($_POST["proyecto"]):"";
  	$tipo=isset($_POST["tipo"])?limpiarCadena($_POST["tipo"]):"";
  	$hora=isset($_POST["hora"])?limpiarCadena($_POST["hora"]):"";
  	$thora=isset($_POST["thora"])?limpiarCadena($_POST["thora"]):"";
  	$descripcion=isset($_POST["descripcion"])?limpiarCadena($_POST["descripcion"]):"";
 
   		switch ($_GET["opt"]){
   			case 'guardarEditar':
			if (empty($idproyecto)){
				$rspta = $registro->insertarR($consultor,$cliente,$fehadia,$proyecto,$tipo,$hora,$thora,$descripcion);
				echo $rspta ? "Registro del dia Correcto" : "Error al Registrar dia";
			}else{
				$rspta = $registro->editar($idcategoria,$consultor,$documento,$linea);
				echo $rspta ? "Categoria Actualizada" : "Error al Actualizada Categoria";
			}
			break;

		case 'listar':
				$rspta=$registro->listar($idregistro);
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