<?php 
	//Incluimos el archivo para la conexion a la DDBB
	require "../config/Conexion.php";

	Class Registro{

		public function __constructor(){

		}

		public function insertarR($consultor,$cliente,$fehadia,$proyecto,$tipo,$hora,$thora,$descripcion){
			$sql = "INSERT INTO registro(consultor,cliente,fehadia,proyecto,tipo,hora,thora,descripcion) VALUES ('$consultor','$cliente', '$fehadia','$proyecto','$tipo','$hora','$thora','$descripcion');";
			return ejecutarConsulta($sql);
		}


	}

 ?>