<?php 
	session_start();

	require_once "../clases/Conexion.php";
  	$c = new Conectar;
  	$conexion = $c->conexion();

  	$id_Usuario = $_SESSION['id_usuario'];

  	$sql = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
  	$result = mysqli_query($conexion, $sql);
  	$fila = mysqli_fetch_array($result);
	
	
	if($fila['id_rol'] == '2') {

		if(isset($_SESSION['nombre'])) {
			include "header.php";
			include "fondo.php";

 ?>

 	<!DOCTYPE html>
 	<html>
 	<head>
 		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 		<link rel="stylesheet" type="text/css" href="../css/tablas.css">
 		<title></title>
 	</head>
 	<body>

 		<div>
		<br>
		<div class="contenido_usuario">
			<br>
		<div class="container">
			<h1 class="display-4">Usuarios</h1>
			
			<br>
			<div id="tablaUsuarios"></div>
		</div>
	</div>
	<br>
	</div>
 	
 	</body>
 	</html>


<?php include "footer.php"; ?>


  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#tablaUsuarios').load('usuarios/tablaUsuarios.php');
  	})
  </script>


  <?php 
 		
 		
 	} else {
 		header("location:../index.php");
 	}

 	} else {
 		header("location:../index.php");
 	}

  ?>
