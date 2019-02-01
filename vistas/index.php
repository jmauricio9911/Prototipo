<!DOCTYPE html>
<html>
<head>
	<title>Netw</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6" style="left: center;">
				<h1>Login</h1>
				<form action="../ajax/validar.php" method="POST">
					<div  class="form-group">
						<strong>Usuario</strong>
						<input type="text" class="form-control mb-2 mr-sm-2" id="nombre" name="nombre">
					</div>
					<div class="form-group">
						<strong>Contraseña</strong>
						<input type="password" class="form-control" id="pass" name="pass">
					</div>
					<button class="btn btn-primary">Enviar</button>
					<button class="btn btn-danger">Cancelar</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>