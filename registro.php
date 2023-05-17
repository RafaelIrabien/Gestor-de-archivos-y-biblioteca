<?php 
	require_once "clases/Conexion.php";

	$c = new Conectar;
    $conexion = $c->conexion();

    $sql = "SELECT id_rol, rol FROM roles";
    $resultado = mysqli_query($conexion, $sql);


 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/registro.css">

    <link rel="stylesheet" type="text/css" href="librerias/bootstrap_4/bootstrap_2.min.css">
</head>
<body>
	<br>
	<br>
  <div class="wrapper">
	<div id="formContent">
	<div class="container">
		<br>
		<h1 class="text-center">Registro de usuario</h1>
			
		 <div class="col-sm-9 col-center">
			<form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()"> <!-- Inicio del formulario -->

				<label>Nombre:</label>
				<input type="text" name="nombre" id="nombre" class="form-control" required="">
				<br>
				<label>Email o correo:</label>
				<input type="email" name="correo" id="correo" class="form-control" required="">

      				<br>

        				<label for="password">Contraseña:</label>
        				<input type="password" name="password" id="password" class="form-control" required="">

      				<div>
        				<label for="password"></label>
        <!-- checkbox que nos permite activar o desactivar la opcion -->
        				<div style="float: right;">
        				        		
        					<input style="margin-top: 10px;" type="checkbox" id="mostrar_contrasena" title="Click para mostrar contraseña"/>
          					Mostrar contraseña
          				</div>
      				</div>
    				
 				



					<br>
					<label>Rol:</label>
					<select id="Roles" name="Roles" class="form-control">
						<?php 
 							while ($mostrar = mysqli_fetch_array($resultado)) {
 								
 									 $idRol = $mostrar['id_rol'];
 									 $Rol = $mostrar['rol'];
 							
 	 					?>
 	 					
						<option value="<?php echo $idRol; ?>">
 	 						<?php echo $Rol; ?>
 	 					</option>

 	 					<?php 
 	 						} //Fin del while
 	 					 ?>
 	 		
					</select>

					<br>
					<div class="row">
						<div class="col-sm-6 text-left">
						 <button class="btn btn-primary">Registrar</button>
						</div>
						<div class="col-sm-6 text-right">
						 <a href="index.php" class="btn btn-warning">Login</a>
						</div>
					</div>
					

				</form> <!-- Fin del formulario -->
			</div>
			<br>
		</div>
	</div>
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
					swal(":D", "Agregado con éxito", "success");

				} else if (respuesta == 2) {
					swal("El usuario o correo ya existe, por favor escriba otro");

				} else {
					swal(":(", "Falló al agregar", "error");
				}
			}
		});

		return false;
	}
</script>


<script>
$(document).ready(function () {
  $('#mostrar_contrasena').click(function () {
    if ($('#mostrar_contrasena').is(':checked')) {
      $('#password').attr('type', 'text');
    } else {
      $('#password').attr('type', 'password');
    }
  });
});
</script>



</body>
</html>