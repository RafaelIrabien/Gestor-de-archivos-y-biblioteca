<?php
	include("conexion.php");


	$dTitulo = $_POST['txttitulo'];
	$dAutor = $_POST['cboautor'];
	$dEditorial = $_POST['cboeditorial'];
	$dUbicacion = $_POST['txtubicacion'];
	$dCantidad = $_POST['txtejemplar'];

	if (!empty($dTitulo) && !empty($dAutor) && $dEditorial !='0' && !empty($dUbicacion) && !empty($dCantidad)) {
		

		$sql = "INSERT INTO libros (titulo, id_autor, id_editorial,   casillero, cantidad) VALUES ('$dTitulo', '$dAutor', '$dEditorial', '$dUbicacion', '$dCantidad')";

		$result = $cnmysql->query($sql);

		if ($result) {
			include("V_Libro.php");
		
		} else {
			echo "<h1 style='color:#fff;'>Error al agregar libro</h1>";
		}

	} else {
		echo "<h1 style='color:#fff;'>Rellene todos los datos</h1>";
	}

?>