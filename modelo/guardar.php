<?php 
	//Incluimos el archivo para la conexion a la DDBB
	require "../config/Conexion.php";

	Class Consultor{

		public function __constructor(){

		}
		//Metodo para Ingresar registros
		public function insertar($nombre,$documento,$linea){
			$sql="INSERT INTO consultor(consultor,documento,linea) VALUES ('$nombre','$documento','$linea')";
			//llamos el metodo ejecutarConsulta
			return ejecutarConsulta($sql);
		}

		//Metodo para mostrar los registros a editar o modificar 
		public function mostrar($idconsultor){
			$sql = "SELECT * FROM consultor WHERE idconsultor='$idconsultor'";
			return ejecutarConsultaSimpleFila($sql);
		}
		//Metodo para listar Los registros
		public function listar(){
			$sql = "SELECT * FROM consultor;";
			return ejecutarConsulta($sql);
		}

		public function login($documento){
			$sql = "SELECT * FROM consultor WHERE documento='documento'";
		}


	}

 ?>