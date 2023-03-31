<?php
	include('conexion.php');

	$dCod = $_POST['txtcod'];
	$dTitulo = $_POST['txttitulo'];
	$dAutor = $_POST['cboautor'];
	$dEditorial = $_POST['cboeditorial'];
	$dGenero = $_POST['cbogenero'];
	$dUbicacion = $_POST['txtubicacion'];
	$dCantidad = $_POST['txtejemplar'];
	$dDisponible = $_POST['txtdisponible'];

	$sql_1 = "SELECT * FROM detalle_prestamos WHERE id_libro = '$dCod' AND id_estado = 1";
	$resultado = $cnmysql->query($sql_1);
	$cantidad = mysqli_num_rows($resultado);
	
	if ($dCantidad < $cantidad) {
		echo "<p
		style='	background-color: #EE9393;
			padding: 10px;
			box-sizing: border-box;
			color: #E33E3E;
			border:2px dotted #E33E3E;
			text-align: center;'
		><strong>Error!</strong> No puede ingresar menor número de ejemplares, porque el número de prestados excede a este.</p>";
	exit();
}
	
	$nuevaCantidad = $dCantidad - $cantidad;

	$sql = "UPDATE libros SET titulo = '$dTitulo', id_autor = '$dAutor', id_editorial = '$dEditorial', id_genero = '$dGenero', cantidad = '$nuevaCantidad', disponibles = '$dDisponible', casillero = '$dUbicacion' WHERE id_libro = '$dCod'";

	$result = $cnmysql->query($sql);


		include('V_Libro.php');




?>