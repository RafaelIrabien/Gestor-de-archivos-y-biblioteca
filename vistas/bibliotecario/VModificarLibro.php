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



		$dCodLibro = $_POST['vcod'];

		$sql = "SELECT * FROM libros WHERE id_libro = '$dCodLibro'";

		$result = $cnmysql->query($sql);

		$fila = mysqli_fetch_array($result);

		$Titulo = $fila['titulo'];
		$idAutor = $fila['id_autor'];
		$idEditorial = $fila['id_editorial'];
		$Cantidad = $fila['cantidad'];
		$Disponible = $fila['disponibles'];
		$Casillero = $fila['casillero'];


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
		$('#FormModificarLibro').on("submit", function(e){ 
			e.preventDefault();

			var formData = new FormData(document.getElementById('FormModificarLibro'));

			$.ajax({
					type: "POST",
					data: formData,
					dataType: "HTML",
					url: "DModificarLibro.php",
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
			<h2>Modificar Libro</h2>

			<form id="FormModificarLibro" method="POST">
				<input type="hidden" name="txtcod" id="txtcod" value="<?php echo $dCodLibro; ?>">

				<div>
					<label for="txttitulo">Título:</label>
					<input type="text" name="txttitulo" id="txttitulo" value="<?php echo $Titulo; ?>" required>
				</div>


				<div>
					<label for="cboautor">Autor:</label>
					<select id="cboautor" name="cboautor">
						<?php 
						 while($fila = mysqli_fetch_array($tablaAutor)){

						 	$filaCod = $fila['id_autor'];

						 	echo "<option value='" . $filaCod . "'";

						 	if ($filaCod == $idAutor) {
						 		echo 'selected';
						 	}

						 	echo ">" . $fila['nombre'] . "</option>";
						 }
						 ?>
					</select>
				</div>


				<div>
					<label for="cboeditorial">Editorial:</label>
					<select id="cboeditorial" name="cboeditorial">
						<?php 
						while($fila = mysqli_fetch_array($tablaEditorial)){

							$filaCod = $fila['id_editorial'];

							echo "<option value='" . $filaCod . "'";

							if ($filaCod == $idEditorial) {
								echo 'selected';
							}

							echo ">" . $fila['editorial'] . "</option>";
						}

						 ?>
					</select>
				</div>


				<div>
					<label for="txtubicacion">Casillero:</label>
					<input type="text" id="txtubicacion" name="txtubicacion" value="<?php echo $Casillero; ?>" required>
				</div>


				<div>
					<label for="txtejemplar">Cantidad:</label>
					<input type="number" id="txtejemplar" name="txtejemplar" value="<?php echo $Cantidad; ?>" min="1" required>
				</div>

					<div>
					<label for="txtdisponible">Disponibles:</label>
					<input type="number" id="txtdisponible" name="txtdisponible" value="<?php echo $Disponible; ?>" min="1" required>
				</div>


				<div id="botones">
					<span class="btn btn-warning" type="submit">Modificar</span>
					<span class="btn btn-secondary" onclick="VistaLibro();">Cancelar</span>
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