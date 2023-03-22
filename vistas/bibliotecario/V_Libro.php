<?php 
	include "conexion.php";

	$tabla = $cnmysql->query('SELECT * FROM libros');

	$NroLibros = mysqli_num_rows($tabla);

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css_l/hoja_libro.css">
	
	<script type="text/javascript" src="js/funcionesLibro.js"></script>
	<script type="text/javascript" src="js/funcionesAutor.js"></script>
</head>
<body>

	<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $('#txtbusqueda').val()
			};

			$.ajax({
					type: "POST",
					data: parametros,
					url: "listarLibros.php",
					beforeSend:function(){
						$('#ListaLi').html("Procesando")
					},
					success:function(datos){
						$('#ListaLi').html(datos);
					}
			});
		})
	</script>

	<div id="ContenidoLi">
		<div id="DatosLi">
			<div id="tablaLi">
				<h1>Lista de libros</h1>
				<div id="busqueda">

					<div id="NuevoLi">
						<button onclick="VNuevoLi();">Agregar libro</button>
						<button onclick="VistaDetalleAutor();">Opciones de autor</button>
						<button onclick="">Opciones de Editorial</button>
					</div>
					

					<div id="BusquedaLi">
					<input type="text" id= "txtbusqueda" name="" placeholder="Titulo,Autor,Editorial,Genero">
					<button type="button" onclick="ListarLibro();">Buscar</button>
					
					</div>
				</div>

				<div id="ListaLi">
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>