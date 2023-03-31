<?php 
	include('conexion.php');

	$dEditorial = $_POST['veditorial'];

	if (!empty($dEditorial)) {
		
		$sql = "INSERT INTO editoriales (editorial) VALUES ('$dEditorial')";
		$result = $cnmysql->query($sql);

		if ($result) {
			
			echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;
				text-align: center;'
		><strong>¡Exito!</strong> Editorial agregada exitosamente</p>";

		} else {

			echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>¡Error!</strong> Editorial no fué agregada</p>";

		}
	} else {

		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>¡Error!</strong> Ingrese una editorial para agregar</p>";

	}

 ?>