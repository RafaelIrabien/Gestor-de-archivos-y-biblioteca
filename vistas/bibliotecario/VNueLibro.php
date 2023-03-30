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
		


	$tablaAutor = $cnmysql->query("SELECT * FROM autores");

	$tablaEditorial = $cnmysql->query("SELECT * FROM editoriales");

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css_l/hoja_NueLibro.css">
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
	<title></title>
</head>

	<script type="text/javascript">
		$('#FormNuevoLibro').on("submit", function(e){
			e.preventDefault();

			var formData = new FormData(document.getElementById('FormNuevoLibro'));

			$.ajax({
					url: "DNuevoLibro.php",
					type: "POST",
					data: formData,
					dataType: "HTML",
					cache: false,
					contentType: false,
					processData: false
					}).done(function(datos){
						$('#ContenidoLi').html(datos);
					});
		});
	</script>
<body>
	
	<div id="CModLi">
		<div id="formulario">
			<h2>Nuevo libro</h2>

			<form id="FormNuevoLibro" enctype="multipart/form-data" method="POST">
				<div>
					<label for="txttitulo">Título:</label>
					<input type="text" required name="txttitulo" id="txttitulo">
				</div>

				<div>
					<label for="cboautor">Autor:</label>
					<select id="cboautor" name="cboautor">
						<?php 
							while ($fila = mysqli_fetch_array($tablaAutor)) {

								echo "<option value='" . $fila['id_autor'] . "'>" . $fila['nombre'] . "</option>";
							}
						 ?>
					</select>
				</div>

				<div>
					<label for="cboeditorial">Editorial:</label>
					<select id="cboeditorial" name="cboeditorial">
						<?php 
							while ($fila = mysqli_fetch_array($tablaEditorial)) {

								echo "<option value='" . $fila['id_editorial'] . "'>" . $fila['editorial'] . "</option>";
							}
						 ?>
					</select>
				</div>

				<div>
					<label for="txtubicacion">Casillero:</label>
					<input type="text" required id="txtubicacion" name="txtubicacion">
				</div>

				<div>
					<label for="txtejemplar">Cantidad:</label>
					<input type="number" required id="txtejemplar" value="" name="txtejemplar" min="1">
				</div>

				<div>
					<label for="txtdisponible">Disponibles:</label>
					<input type="number" required id="txtdisponible" value="" name="txtdisponible" min="1">
				</div>

				<div id= 'botones'>
					<span class="btn btn-primary" type="submit">Guardar</span>
					<span class="btn btn-secondary" type="button" onclick="VistaLibro();">Cancelar</span>
				</div>

			</form>
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