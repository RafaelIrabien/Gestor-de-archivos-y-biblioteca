<?php 
	session_start();
	include('conexion.php');

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

	<link rel="stylesheet" type="text/css" href="css_l/hoja_DetEditorial.css">
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
	<title></title>
</head>
	<script type="text/javascript">
		
		$(function ListarDefault(){
			var parametros = {};

			$.ajax({
					type: "POST",
					data: parametros,
					url: "listarGenero.php",
					beforeSend:function(){
						$('#listGeneros').html("Procesando")
					},
					success:function(datos){
						$('#listGeneros').html(datos);
					}
			});
		})


		function tiempoReal(){
			var tabla = $.ajax({
								datatype: "text",
								async: false,
								url: "listarGenero.php",
						}).responseText;

						document.getElementById('listGeneros').innerHTML = tabla;
		}

		setInterval(tiempoReal, 1000);
		
	</script>

<body>
	<div id="contenidoDetEditorial">
		<div id="cajaMayor">
			<h2>Opciones de Género</h2>

			<div id="caja1">
				<fieldset>
					<legend>Lista de géneros</legend>
					<div id="listGeneros">
						
					</div>
				</fieldset>
			</div>

			<div id="caja2">
				<div id="agregarEditorial">
					<form id="FormAgregarGenero">
						<input type="text" id="txtGenero" placeholder="Nuevo género" required>

						<span class="btn btn-primary" type="button" onclick="GuardarGenero();">Agregar género</span>
					</form>
				</div>

				<hr>

				<div id="modificarEditorial">
					<form id="FormModificarEditorial">
						<input type="text" id="txtcodGeneroMod" placeholder="Código de género" required>
		
						<input type="text" id="txtGeneroMod" placeholder="Nuevo género" required>

						<span class="btn btn-warning" type="button" onclick="ModificarGenero();">Modificar género</span>
					</form>
				</div>

				<hr>

				<div id="EliminarEditorial">
					<form id="FormEliminarEditorial">
						<input type="text" id="txtcodGeneroEli" placeholder="Ingrese código de género" required>

						<span class="btn btn-danger" type="button" onclick="EliminarGenero();">Eliminar género</span>
					</form>
				</div>

			</div>

			<div id="CajaMensaje">
				
			</div>

			<div id="Regreso">
				<span class="btn btn-secondary" onclick="VistaLibro();">Regresar</span>
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