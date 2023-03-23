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

	<link rel="stylesheet" type="text/css" href="css_l/hoja_DetAutor.css">
	<title></title>
</head>

	<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {};

			$.ajax({
					type: "POST",
					data: parametros,
					url: "listarAutor.php",
					beforeSend:function(){
						$('#listAutores').html("Procesando");
					},
					success:function(datos){
						$('#listAutores').html(datos);
					}
			});
		})


		function tiempoReal(){
			var tabla = $.ajax({
								datatype: "text",
								async: false,
								url: "listarAutor.php",
							}).responseText;

							document.getElementById('listAutores').innerHTML = tabla;
		}

		setInterval(tiempoReal, 1000);

	</script>

<body>
	<div id="contenidoDetAutor">
		<div id="cajaMayor">
			<h1>Opciones de autor</h1>

			<div id="caja1">
				<fieldset>
					<legend>Lista de autores</legend>
					<div id="listAutores">
						
					</div>
				</fieldset>
			</div>

			<div id="caja2">
				<div id="agregarAutor">
					<form id="FormAgregarAutor">
						<input type="text" name="txtautor" id="txtautor" placeholder="Nuevo autor" required>
						<button type="button" onclick="GuardarAutor();">Agregar autor</button>
					</form>
				</div>

				<hr>

				<div id="modificarAutor">
					<form id="FormModificarAutor">
						<input type="text" name="txtcodautorMod" id="txtcodautorMod" placeholder="Código de autor" required>
						<input type="text" name="txtautorMod" id="txtautorMod" placeholder="Cambiar nombre por ..." required>

						<button type="button" onclick="ModificarAutor();">Modificar autor</button>
					</form>
				</div>

				<hr>

				<div id="EliminarAutor">
					<form id="FormEliminarAutor">
						<input type="text" id="txtcodautorEli" placeholder="Ingrese código de autor" required>
						<button type="button" onclick="EliminarAutor();">Eliminar autor</button>
					</form>
				</div>


			</div>

			<div id="CajaMensaje">
				
			</div>

			<div id="Regreso">
				<button onclick="VistaLibro();">Regresar</button>
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