<?php
	include('conexion.php');

	$dCod = $_POST['txtcod'];
	$dTitulo = $_POST['txttitulo'];
	$dAutor = $_POST['cboautor'];
	$dEditorial = $_POST['cboeditorial'];
	$dUbicacion = $_POST['txtubicacion'];
	$dCantidad = $_POST['txtejemplar'];

	$sql_1 = "SELECT * FROM detalle_prestamos WHERE id_ibro = '$dCod' AND id_estado = 1";
	$resultado = $cnmysql->query($sql_1);
	$cantidad = mysqli_num_rows($resultado);
	
	if ($dCantidad < $cantidad) {
		echo "<p
		style='	background-color: #EE9393;
			padding: 10px;
			box-sizing: border-box;
			color: #E33E3E;
			border:2px dotted #E33E3E;'
		><strong>Error!</strong> No puede ingresar menor número de ejemplares, porque el número de prestados execede a este.</p>";
	exit();
}
	
	$nuevaCantidad = $dCantidad - $cantidad;

	$sql = "UPDATE libros SET titulo = '$dTitulo', id_autor = '$dAutor', id_editorial = '$dEditorial', cantidad = '$nuevaCantidad', casillero = '$dUbicacion' WHERE id_libro = '$dCod'";

	$result = $cnmysql->query($sql);


		include('V_Libro.php');




?>