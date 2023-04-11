<?php 
	include('conexion.php');

	$dCod = $_POST['vcod'];

	$sql = "DELETE FROM detalle_prestamos WHERE id_detalle = '$dCod'";
	$result = $cnmysql->query($sql);

	if($result){
		include('V_LibrosRetornados.php');
	} else {

		echo "<h1 style='color:#fff;text-align: center;'>Error al eliminar</h1>";
		
		
	}

 ?>