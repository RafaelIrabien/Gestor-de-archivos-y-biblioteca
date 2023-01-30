<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" type="text/css" href="librerias/bootstrap_4/bootstrap.min.css">
</head>
<body>
	<br>
	<br>
	
	<div class="container">
		<h1 class="text-center">Registro de usuario</h1>

		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">

				<form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()"> <!-- Inicio del formulario -->

					<label>Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required="">
					<label>Email o correo</label>
					<input type="email" name="correo" id="correo" class="form-control" required="">
					<label>Contraseña</label>
					<input type="password" name="password" id="password" class="form-control" required="">

					<br>
					<div class="row">
						<div class="col-sm-6 text-left">
						 <button class="btn btn-primary">Registrar</button>
						</div>
						<div class="col-sm-6 text-right">
						 <a href="index.php" class="btn btn-success">Login</a>
						</div>
					</div>
					

				</form> <!-- Fin del formulario -->
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

<script type="text/javascript" src="librerias/jquery-3.6.3.min.js"></script>
<script type="text/javascript" src="librerias/sweetalert.min.js"></script>

<script type="text/javascript">
	function agregarUsuarioNuevo(){
		$.ajax({
			method: "POST",
			data: $('#frmRegistro').serialize(),
			url: "procesos/usuario/registro/agregarUsuario.php",
			success:function(respuesta){
				respuesta = respuesta.trim();

				//Si logra agregar un usuario sale un mensaje
				if (respuesta == 1) {
					//Se reinicia el formulario
					$('#frmRegistro')[0].reset();
					swal(":D", "Agregado con exito", "success");

				} else if (respuesta == 2) {
					swal("El usuario o correo ya existe, por favor escriba otro");

				} else {
					swal(":(", "Fallo al agregar", "error");
				}
			}
		});

		return false;
	}
</script>
</body>
</html>