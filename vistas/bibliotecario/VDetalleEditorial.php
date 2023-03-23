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
	<title></title>
</head>
	<script type="text/javascript">
		
		$(function ListarDefault(){
			var parametros = {};

			$.ajax({
					type: "POST",
					data: parametros,
					url: "listarEditorial.php",
					beforeSend:function(){
						$('#listEditoriales').html("Procesando")
					},
					success:function(datos){
						$('#listEditoriales').html(datos);
					}
			});
		})


		function tiempoReal(){
			var tabla = $.ajax({
								datatype: "text",
								async: false,
								url: "listarEditorial.php",
						}).responseText;

						document.getElementById('listEditoriales').innerHTML = tabla;
		}

		setInterval(tiempoReal, 1000);
		
	</script>

<body>
	<div id="contenidoDetEditorial">
		<div id="cajaMayor">
			<h1>Opciones de Editorial</h1>

			<div id="caja1">
				<fieldset>
					<legend>Lista de editoriales</legend>
					<div id="listEditoriales">
						
					</div>
				</fieldset>
			</div>

			<div id="caja2">
				<div id="agregarEditorial">
					<form id="FormAgregarEditorial">
						<input type="text" id="txtEditorial" placeholder="Nueva editorial" required>

						<button type="button" onclick="GuardarEditorial();">Agregar editorial</button>
					</form>
				</div>

				<hr>

				<div id="modificarEditorial">
					<form id="FormModificarEditorial">
						<input type="text" id="txtcodEditorialMod" placeholder="Código de editorial" required>

						<input type="text" id="txtEditorialMod" placeholder="Cambiar editorial por ..." required>

						<button type="button" onclick="ModificarEditorial();">Modificar Editorial</button>
					</form>
				</div>

				<hr>

				<div id="EliminarEditorial">
					<form id="FormEliminarEditorial">
						<input type="tetx" id="txtcodEditorialEli" placeholder="Ingrese código de editorial" required>

						<button type="button" onclick="EliminarEditorial();">Eliminar editorial</button>
					</form>
				</div>

			</div>

			<div id="CajaMensaje">
				
			</div>

			<div id="Regreso">
				<button onclick="VistaLibro();">Volver</button>
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