<?php 
	include('conexion.php');

	$dCod = $_POST['vcod'];

	$sql = "DELETE FROM libros WHERE id_libro = '$dCod'";
	$result = $cnmysql->query($sql);

	if($result){
		include('V_Libro.php');
	} else {

		echo "<h1 style='color:#fff;text-align: center;'>Error al eliminar</h1>";
		
		
	}

 ?>