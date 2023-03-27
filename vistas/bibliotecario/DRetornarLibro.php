<?php 
	include('conexion.php');

	$dcodLP = $_POST['vcod'];


	$sql = "UPDATE detalle_prestamos SET id_estado = '2', Fecha_Retorno=  CURDATE() WHERE id_detalle = '$dcodLP'";

	$result = $cnmysql->query($sql);

	if ($result) {
		include('V_LibrosPrestados.php');
	} else {
		echo "<h1 style='color:#fff;'>Error al retornar</h1>";
	}


 ?>