<?php 
	include('conexion.php');

	$dCod = $_POST['vcod'];

	if (!empty($dCod)) {
		

		$sql = "DELETE FROM generos WHERE id_genero = '$dCod'";

		$result = $cnmysql->query($sql);

		if ($result) {
			
			echo "<p
			style='	background-color: #8FE397;
					padding: 10px;
					box-sizing: border-box;
					color: #1D7034;
					border:2px dotted #4DA459;
					text-align: center;'
			><strong>¡Éxito!</strong> Género fué eliminado</p>";

		} else {

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;
					text-align: center;'
			><strong>¡Error!</strong> Género no fué eliminado</p>";

		}
	
	} else {

		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>¡Error!</strong> Ingrese un código de género para eliminar</p>";

	}

 ?>