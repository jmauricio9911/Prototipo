<!DOCTYPE html>
<html>
<head>
	<title>Consultor</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
		<style type="text/css">
	 .center{
		display: flex;
		align-items: center;
		justify-content: center;
		min-height: 100vh;
	 }
	</style>
	<?php

		require_once "../config/global.php";
		$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
		mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

		//Verificar si tenemos un error de conexion
		if (mysqli_connect_errno()) {
			printf("Fallo la conexion a la base de datos: %s\n",mysqli_connect_error());
				exit();
		}
				session_start();
				$nombre =  $_SESSION["nombre"];
				$conexion;
				$sql = "SELECT * FROM consultor WHERE consultor='$nombre' AND proyecto='1';";
				$result = mysqli_query($conexion,$sql) or die(mysql_error());
		        $rows = mysqli_num_rows($result);
		        $ro = mysqli_fetch_array($result);
		        
		        if ($rows==1)
		        	{
		        	?>
		        	<?php

		        			$conexion;
		        			$sql = "SELECT * FROM proyecto WHERE nombre='$nombre'";
		        			$result = mysqli_query($conexion,$sql) or die(mysql_error());
		        			$row = mysqli_fetch_array($result);
		        	 ?>
		        	<div class="container">
		        		<div class="row center">
		        			<div class="col-md-6">
		        				<h1>Registro del Dia</h1>
		        				<form action="" method="POST" id="registrohora" name="registrohora">
		        					<input type="hidden" name="consultor" value="<?=$row[1]?>" id="consultor">
		        					<input type="hidden" name="cliente" value="<?=$row[2]?>" id="cliente">
		        					<input type="hidden" name="proyecto" value="<?=$row[4]?>" id="proyecto">
		        					<div class="form-group">
			        					<strong>Tipo de Desarrollo</strong>
			        					<select name="tipo" id="tipo" class="form-control">
			        						<option value="">Seleccione Tipo</option>
			        						<option value="Apoyo">Apoyo</option>
			        						<option value="CC">Cto.Cambio</option>
			        						<option value="garantia">Garantia</option>
			        						<option value="desarrollo">Desarrollo</option>
			        					</select>
		        				    </div>
		        				    <div class="form-group">
			        					<strong>Hora</strong>
			        					<input placeholder="Ingrese Cantidad de Horas" type="number" name="hora" class="form-control" id="hora">
		        					</div>
		        					<div class="form-group">
		        						<strong>Tipo Hora</strong>
		        						<select name="thora" id="thora" class="form-control">
		        							<option value="">Seleccione Tipo de Hora</option>
		        							<option value="fabrica">fabrica</option>
		        							<option value="sitio">sitio</option>
		        						</select>
		        					</div>
		        					<div class="form-group">
		        						<strong>Descripción</strong>
  										<textarea type="text" id="descripcion" name="descripcion" class="md-textarea form-control" rows="3"></textarea>
									</div>
									<button class="btn btn-primary" type="submit" id="btnGuardar">Guardar</button>
									<a href="index.php" class="btn btn-danger">salir</a>
		        				</form>
		        			</div>
		        		</div>
		        	</div>
		        	<script type="text/javascript" src="../scripts/registrodia.js"></script>
		        	<script src="../public/js/bootbox.min.js"></script>

					 	
    <?}else{?>
					<div class="container">
						<div class="row center">
							<div class="col-md-6">
						  		<h2>Informe Consultor</h2>
						  		<form  id="formularioRegistro" name="formularioRegistro" action="" method="POST">
									<div class="form-group">
										<strong>Cliente</strong>
										<input type="hidden" id="consultor" name="consultor"value="<?=$nombre?>">
										<select name="cliente" class="form-control" id="cliente" required="">
											<option value="">Seleccione Cliente</option>
											<option value="Nutresa">Nutresa</option>
											<option value="Corono">Corona</option>
											<option value="Sura">Sura</option>
										</select>
									</div>
									<div class="form-group">
										<strong>Categoria</strong>
										<select name="categoria" class="form-control" id="categoria" required="">
											<option value="">Seleccione Categoria</option>
											<option value="proyecto">Proyecto</option>
											<option value="incidenete">Incidente</option>
											<option value="requerimiento">Requerimiento</option>
										</select>
									</div>
									<div class="form-group">
										<strong>Proyecto</strong>	
										<input type="text" id="proyecto" class="form-control" name="proyecto" placeholder="Nombre del proyecto" required="">
									</div>
									<div class="form-group">
										<strong>Fecha Inicio</strong>
										<input  placeholder="Fecha inicio del Proyecto" class="form-control" type="date" name="fechaini" id="fechaini" required="">
									</div>
									<div class="form-group">
										<strong>Fecha Fin</strong>
										<input type="date" name="fechafin" id="fechafin" class="form-control" placeholder="Fecha Finalizacion del Proyecto">
									</div>
									<button type="submit" id="btnGuardar" class="btn btn-primary">Registrar</button>
									<a href="index.php" class="btn btn-warning">Volver</a>
						  		</form>
					  	    </div>
					  	</div>
				    </div>
				    <script type="text/javascript" src="../scripts/proyecto.js"></script>
                    <script src="../public/js/bootbox.min.js"></script>
     <?}?>
</body>
</html>