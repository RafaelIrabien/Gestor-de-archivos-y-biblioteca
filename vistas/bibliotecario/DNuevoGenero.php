<?php 
	include('conexion.php');

	$dGenero = $_POST['vgenero'];

	if (!empty($dGenero)) {
		
		$sql = "INSERT INTO generos (genero) VALUES ('$dGenero')";
		$query = $cnmysql->prepare($sql);
		$result = $query->execute();

		if ($result) {
			
			echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;
				text-align: center;'
		><strong>¡Éxito!</strong> Género agregado exitosamente</p>";

		} else {

			echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>¡Error!</strong> Género no fué agregado</p>";

		}

		$query->close();
		return $result;


	} else {

		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>¡Error!</strong> Ingrese un género para agregar</p>";

	}

 ?>