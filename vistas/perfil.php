<?php 
	session_start();
	require_once("../clases/Usuario.php"); 

	if (isset($_SESSION['nombre'])) {
		include "header.php";
		include "fondo.php";

 ?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/perfil.css">
</head>
<body>

<div id="DatosUsuario">
	<div class="container">
		<div class="col-sm-12">

			<form action="../procesos/usuario/guardar_imagen.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="Imagen">
		 			 <br><br>
		 			 <input type="submit" value="Aceptar">
			</form>
 </div>
			<br><br>
			<table>
				  <tr>
					<td> 
							 			</td>
				  </tr>
				
				<tbody>
					<tr>
						<td>
						<?php 
						$usuario = new Usuario;
						$usuario->mostrarNombre();
		 				?>
						</td>
					</tr>
				</tbody>
			</table>
		
		
	</div>
</div>
	

</body>
</html>





<?php 
	include "footer.php";
 } else {
 	header("location:../index.php");
 }

 ?>