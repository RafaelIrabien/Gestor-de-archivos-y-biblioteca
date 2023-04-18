<?php 
	include('conexion.php');

	$dCod = $_POST['vcod'];
	$dGenero = $_POST['vgen'];

	if (!empty($dGenero) && !empty($dCod)) {
		
		$sql = "UPDATE generos SET genero = '$dGenero' WHERE id_genero = '$dCod'";
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
			><strong>¡Éxito!</strong> Género fué modificado</p>";

		} else {

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;
					text-align: center;'
			><strong>¡Error!</strong> Género no fué modificado</p>";

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
		><strong>¡Error!</strong> Ingrese un código y un género para modificar</p>";

	}

 ?>