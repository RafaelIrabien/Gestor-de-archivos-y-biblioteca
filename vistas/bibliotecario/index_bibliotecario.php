<?php 
	session_start();
	include "header.php";
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/vistas.js"></script>

	<link rel="stylesheet" href="css_l/hoja_index_bibliotecario.css">
	<title>Biblioteca</title>
</head>
<body>
<br>
	<div id="contenedor">
		
		<header>
			<div id="banner">
				<div>
					<img src="img_l/banner.jpg" width="900" height="200">
				</div>
			</div>
		</header>
	

		<nav id="navbar">
		<center>
			<ul id="menu">
				<li><a onclick="VistaPrestamo();">Prestamos</a></li>
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

</body>
</html>


<?php 

 ?>