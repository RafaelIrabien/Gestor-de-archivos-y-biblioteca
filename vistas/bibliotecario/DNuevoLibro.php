<?php
	include("conexion.php");


	$dTitulo = $_POST['txttitulo'];
	$dAutor = $_POST['cboautor'];
	$dEditorial = $_POST['cboeditorial'];
	$dGenero = $_POST['cbogenero'];
	$dUbicacion = $_POST['txtubicacion'];
	$dCantidad = $_POST['txtejemplar'];
	$dDisponible = $_POST['txtdisponible'];

	if (!empty($dTitulo) && !empty($dAutor) && $dEditorial !='0' && !empty($dGenero) && !empty($dUbicacion) && !empty($dCantidad) && !empty($dDisponible)) {
		

		$sql = "INSERT INTO libros (titulo, id_autor, id_editorial, id_genero, casillero, cantidad, disponibles) VALUES ('$dTitulo', '$dAutor', '$dEditorial', '$dGenero', '$dUbicacion', '$dCantidad', '$dDisponible')";

		$result = $cnmysql->query($sql);

		if ($result) {
			include("V_Libro.php");
		
		} else {
			echo "<h1 style='color:#fff;text-align: center;'>Error al agregar libro</h1>";
		}

	} else {
		echo "<h1 style='color:#fff;text-align: center;'>Rellene todos los datos</h1>";
	}

?>