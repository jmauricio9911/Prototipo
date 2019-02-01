<!DOCTYPE html>
<html>
<head>
  <title>Regitrar Consultor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
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
	<div class="container">
		<div class="row center">
			<div id="registro" class="col-md-6">
		  		<h2>Registro Consultores</h2>
		  		<form  id="formulario" name="formulario" action="" method="POST">
					<div class="form-group">
						<strong>Consultor</strong>
						<input type="hidden" id="idconsultor" name="idconsultor">
						<input type="text" class="form-control" id=nombre" placeholder="Ingrese Consultor" name=nombre">
					</div>
					<div class="form-group">
						<strong>Documento</strong>
						<input type="number" class="form-control" id="documento" placeholder=" Ingrese Documento" name="documento">
					</div>
					<div class="form-group">
						<strong>Linea</strong>
						<select class="form-control"name="linea" id="linea">
							<option value="">Seleccione Linea</option>
							<option value="PHP">PHP</option>
							<option value="JAVA">JAVA</option>
							<option value="ABAP">ABAP</option>
						</select>
					</div>
					<button type="submit" id="btnGuardar" class="btn btn-primary">Registrar</button>
					<a href="index.php" class="btn btn-warning">Volver</a>
		  		</form>
	  	    </div>
	  	</div>
    </div>
    <script type="text/javascript" src="../scripts/consultor.js"></script>
    <script src="../public/js/bootbox.min.js"></script>
</body>
</html>