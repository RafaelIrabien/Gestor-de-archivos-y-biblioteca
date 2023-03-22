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

						<button type="button" onclick="ModificarAutor();">Modificar</button>
					</form>
				</div>


			<div id="CajaMensaje">
				
			</div>


			</div>
		</div>
	</div>

</body>
</html>