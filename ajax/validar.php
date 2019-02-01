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
		
	}

 ?>