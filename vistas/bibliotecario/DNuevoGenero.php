<?php 
	include('conexion.php');

	$dGenero = $_POST['vgenero'];

	if (!empty($dGenero)) {
		
		$sql = "INSERT INTO generos (genero) VALUES ('$dGenero')";
		$result = $cnmysql->query($sql);

		if ($result) {
			
			echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;'
		><strong>¡Éxito!</strong> Género agregado exitosamente</p>";

		} else {

			echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>¡Error!</strong> Género no fué agregado</p>";

		}
	} else {

		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>¡Error!</strong> Ingrese un género para agregar</p>";

	}

 ?>