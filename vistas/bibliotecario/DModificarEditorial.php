<?php 
	include('conexion.php');

	$dCod = $_POST['vcod'];
	$dEditorial = $_POST['vedi'];

	if (!empty($dEditorial) && !empty($dCod)) {
		
		$sql = "UPDATE editoriales SET editorial = '$dEditorial' WHERE id_editorial = '$dCod'";

		$result = $cnmysql->query($sql);

		if ($result) {
			
			echo "<p
			style='	background-color: #8FE397;
					padding: 10px;
					box-sizing: border-box;
					color: #1D7034;
					border:2px dotted #4DA459;'
			><strong>¡Exito!</strong> Editorial fué modificada</p>";

		} else {

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;'
			><strong>¡Error!</strong> Editorial no fué modificada</p>";

		}

	} else {

		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>¡Error!</strong> Ingrese un código y una editorial para modificar</p>";

	}

 ?>