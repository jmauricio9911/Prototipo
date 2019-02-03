<?php 
	//Incluimos el archivo para la conexion a la DDBB
	require "../config/Conexion.php";

	Class Proyecto{

		public function __constructor(){

		}

		public function insertarP($nombreconsultor,$cliente,$categoria,$proyecto,$fechaini,$fechafin){
			$sql = "INSERT INTO proyecto(nombre,cliente,categoria,proyecto,fechaini,fechafin) VALUES ('$nombreconsultor','$cliente', '$categoria','$proyecto','$fechaini','$fechafin');";
			$sql.= "UPDATE consultor SET proyecto='1' WHERE consultor='$nombreconsultor';";
			return miltiquery($sql);
		}


	}

 ?>