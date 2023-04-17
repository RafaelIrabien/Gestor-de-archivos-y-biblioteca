<?php 
	session_start();

	require_once "../../clases/Conexion.php";
  	$c = new Conectar;
  	$conexion = $c->conexion();

  	$id_Usuario = $_SESSION['id_usuario'];
   

  	$sql = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
  	$result = mysqli_query($conexion, $sql);
  	$fila = mysqli_fetch_array($result);
	 // $id = $fila['id_usuario'];
	if($fila['id_rol'] == '3') {

	 if(isset($_SESSION['nombre'])) {
		include "header.php";
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>
	<script type="text/javascript" src="js/funcionesLibro.js"></script>
	<script type="text/javascript" src="js/funcionesAutor.js"></script>
	<script type="text/javascript" src="js/funcionesEditorial.js"></script>
	<script type="text/javascript" src="js/funcionesPrestamo.js"></script>
	<script type="text/javascript" src="js/funcionesGenero.js"></script>


	<script src="../../librerias/jquery-3.4.1.min.js"></script>
	<script src="../../librerias/datatable/jquery.dataTables.min.js"></script>
  	<script src="../../librerias/datatable/dataTables.bootstrap4.min.js"></script>

	<link rel="stylesheet" href="css_l/hoja_index_bibliotecario.css">
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
	
	<title>Biblioteca</title>
</head>
<body>
<br>
	<div id="contenedor">
		
		<header>
			<div id="banner" >
				<div class="table-responsive">
					<img src="img_l/banner.jpg" width="900" height="200">
				</div>
			</div>
		</header>
	

		<nav id="navbar">
		<center>
			<br>
			<ul id="menu">
				<li><a onclick="VistaPrestamo();">Préstamos</a></li>
				<li><a onclick="VistaLibrosPrestados();">Libros prestados</a></li>
				<li><a onclick="VistaLibrosRetornados();">Libros devueltos</a></li>
				<li><a onclick="VistaLibro();">Libros</a></li>
			</ul>
		</center>
	</nav>

	<section>
		<div id="contenido">
			
		</div>
	</section>

	</div>
<br>
</body>
</html>


<?php 
	} else {
		header("location:../../index.php");
	}

} else {
	header("location:../inicio.php");
}

 ?>