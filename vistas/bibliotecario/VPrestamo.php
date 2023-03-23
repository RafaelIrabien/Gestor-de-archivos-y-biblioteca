<?php 
	session_start();
	include "conexion.php";

	$id_Usuario = $_SESSION['id_usuario'];
   

  	$sql1 = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
  	$result1 = $cnmysql->query($sql1);
  	$fila1 = mysqli_fetch_array($result1);
	 // $id = $fila['id_usuario'];
	if($fila1['id_rol'] == '3') {

	 if(isset($_SESSION['nombre'])) {
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css_l/hoja_prestamo.css">
	<title></title>
</head>

	<script type="text/javascript">

		$(function VistaDefault(){
			var parametros = {
				"dbusqueda" : $('#txtbusqueda').val()
			};

			$.ajax({
				type: "POST",
				data: parametros,
				url: "listarStockLibros.php",
				beforeSend:function(){
					$('#ListaLibros').html("Procesando")
				},
				success:function(datos){
					$('#ListaLibros').html(datos);
				}
			});
		})
	</script>

<body>
	<div id="ContPrestamo">
		
		<div id="ContDatos">
			<h1>Préstamo</h1>
			<form id="FormPrestamo">
				<div>
					<label>Nombre del lector:</label>
					<div>
						<input type="text" name="lector">
					</div>
				</div>

				<div id="MsjVerificarLector">
					
				</div>

				<div>
					<label for="dtpFecha">Fecha Devolución:</label>
					<input type="date" name="dtpFecha" id="dtpFecha" step="1" min="" max="" value="">
				</div>

				<div>
					<label for="txtCodLibro">Códico Libro:</label>
					<div>
						<input type="number" id="txtCodLibro" name="txtCodLibro" min="1">
					</div>
				</div>

				<div id="MsjVerificarLibro">
					
				</div>

				<div id="botones">
					<button type="button" onclick="GuardarPrestamo();">
						Guardar Préstamo
					</button>
					<button type="button" onclick="VistaInicio();">
						Cancelar Préstamo
					</button>
				</div>

				<div id="MsjVerificarPrestamo">

				</div>
			</form>
		</div>


		<div id="ContListLibros">
			<h1>Lista de libros</h1>
				<div id="busqueda">
						
				<input type="text" id="txtbusqueda" placeholder="Titulo, Autor, Editorial, Genero">
				<button type="button">Buscar</button>
				</div>

				<div id="ListaLibros">
					
				</div>
		</div>
	</div>

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