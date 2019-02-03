<?php
	

	if(isset($_POST["nombre"])){
		$nom = $_POST["nombre"];
	}else{
		$nom = "";
	}
    if(isset($_POST["pass"])){
		$pass = $_POST["pass"];
	}else{
		$pass = "";
	}

	if ($nom == "admin" && $pass == "1234") {
		header("Location: ../vistas/registrar.php");
	}else{

		require_once "../config/global.php";
		$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
		mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

		//Verificar si tenemos un error de conexion
		if (mysqli_connect_errno()) {
			printf("Fallo la conexion a la base de datos: %s\n",mysqli_connect_error());
				exit();
		}

				$conexion;
				$sql = "SELECT * FROM consultor WHERE documento='$nom';";
				$result = mysqli_query($conexion,$sql) or die(mysql_error());
		        $rows = mysqli_num_rows($result);
		        $ro = mysqli_fetch_array($result);
		        $nombre = $ro[1];
				if ($rows==1) {
					session_start();
					$_SESSION["nombre"]=$nombre;
					header("Location: ../vistas/proyecto.php");
				}else{
					header("Location: ../vistas/index.php");
				}
	}
			/*$nom;
		echo "<script src='../public/js/jquery-3.1.1.min.js'></script>";
		echo  "<script>//Funcion para login
					function login(documento){
						$.post('../ajax/consultor.php?opt=mostrar',{documento : documento}, function(data, status){
							data = JSON.parse(data);
							if(data==1){
								alert('hola mundo');
							}else{
								alert('No eres un usuario del sistema');
							}
						})
					}
					login($nom);
				</script>";
				*/

 ?>