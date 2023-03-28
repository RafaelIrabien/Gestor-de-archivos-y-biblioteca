<?php 
	include('conexion.php');

	$dcodLP = $_POST['vcod'];

	//Actualizamos la cantidad disponible de ejemplares del libro retornado
	$query_1 = "SELECT id_libro FROM detalle_prestamos WHERE id_detalle = '$dcodLP'";
	$r = $cnmysql->query($query_1);
	$row = mysqli_fetch_array($r);
	$idLibro = $row['id_libro'];

	
	$query = "SELECT disponibles FROM libros WHERE id_libro = '$idLibro'";
	$resultado = $cnmysql->query($query);
	$fila = mysqli_fetch_array($resultado);
	$Disponible = $fila['disponibles'];

	$cantidadNueva = abs($Disponible + 1);

	$query_2 = "UPDATE libros SET disponibles = '$cantidadNueva' WHERE id_libro = '$idLibro'";
	$resultado_2 = $cnmysql->query($query_2);


	//Actualizamos el estado del prestamo de Pendiente a Devuelto y redireccionamos a la vista Libros Prestados 
	$sql = "UPDATE detalle_prestamos SET id_estado = '2', Fecha_Retorno=  CURDATE() WHERE id_detalle = '$dcodLP'";

	$result = $cnmysql->query($sql);


	if ($result) {

		include('V_LibrosPrestados.php');
	} else {
		echo "<h1 style='color:#fff;'>Error al retornar</h1>";
	}
	

	
	



	


 ?>