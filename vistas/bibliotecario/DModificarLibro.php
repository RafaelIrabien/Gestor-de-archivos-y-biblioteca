<?php
	include('conexion.php');

	$dCod = $_POST['txtcod'];
	$dTitulo = $_POST['txttitulo'];
	$dAutor = $_POST['cboautor'];
	$dEditorial = $_POST['cboeditorial'];
	$dUbicacion = $_POST['txtubicacion'];
	$dCantidad = $_POST['txtejemplar'];

	$sql = "UPDATE libros SET titulo = '$dTitulo', id_autor = '$dAutor', id_editorial = '$dEditorial', cantidad = '$dCantidad', casillero = '$dUbicacion' WHERE id_libro = '$dCod'";

	$result = $cnmysql->query($sql);


	include('V_Libro.php');

?>