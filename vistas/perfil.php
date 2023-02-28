<?php 
	session_start();
	require_once("../clases/Usuario.php"); 

	if (isset($_SESSION['nombre'])) {
		include "header.php";
		include "fondo.php";

		require_once "../clases/Conexion.php";
		$c = new Conectar;
		$conexion = $c->conexion();
		$id_Usuario = $_SESSION['id_usuario'];

		$sql = "SELECT id_usuario, nombre, email, password FROM usuarios WHERE id_usuario = '$id_Usuario'";

		$result = mysqli_query($conexion, $sql);
		
 ?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/perfil.css">
	<link rel="stylesheet" type="text/css" href="../css/tablas.css">
</head>
<body>

<br>
<div id="DatosUsuario" class="table-responsive">
	<div class="container" id="datos">
		
		<br>
			
		<h2>Perfil de usuario</h2>
				<br>
	<form id="frmFoto" method="POST" class="table-responsive" enctype="multipart/form-data">
			
	<div id="instruccion">Click en la imagen para subir una foto:</div>
	    <div class="image-upload">
	    	<label for="file-input">
	    		<img src="../img/foto_perfil.png" alt="Click aquí para subir su foto" title="Click aquí para subir su foto">
	    	</label>

	    	<input type="file" name="archivos[]" id="file-input" accept="image/*">
	    </div>
	    	 <br>
	    	<button type="button" class="btn btn-primary" id="btnGuardarFotoPerfil">Guardar</button>

	</form>
	<br>

				<?php  
					while ($dato = mysqli_fetch_array($result)) {
						//$contraseña = 
				?>
				<p><strong>Nombre:</strong> <?php echo $dato['nombre']; ?></p>
				<br>
				<p><strong>Correo:</strong> <?php echo $dato['email']; ?></p>
				<br>
				<p><strong>Contraseña:</strong> <?php echo $dato['password']; ?></p>

				<?php 
					}
				 ?>
<br>
 </div>
</div>
	<br>

 			<!--		
			<br><br>
			<table>
				  <tr>
					<td> 
							 			</td>
				  </tr>
				
				<tbody>
					<tr>
						<td>
						<?php /*
						$usuario = new Usuario;
						$usuario->mostrarNombre();
						*/
		 				?>
						</td>
					</tr>
				</tbody>
			</table> -->
		
		
	
	

</body>
</html>





<?php 
	include "footer.php";
 } else {
 	header("location:../index.php");
 }

 ?>


 <script type="text/javascript" src="../js/Usuario.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){

 		//Evento para guardar foto de perfil
 		$('#btnGuardarFotoPerfil').click(function(){
 			agregarFotoPerfil();
 		});
 	});
 </script>