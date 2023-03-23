<?php 
	include('conexion.php');

	$dCod = $_POST['vcod'];

	if (!empty($dCod)) {
		

		$sql = "DELETE FROM editoriales WHERE id_editorial = '$dCod'";

		$result = $cnmysql->query($sql);

		if ($result) {
			
			echo "<p
			style='	background-color: #8FE397;
					padding: 10px;
					box-sizing: border-box;
					color: #1D7034;
					border:2px dotted #4DA459;'
			><strong>¡Exito!</strong> Editorial fué eliminada</p>";

		} else {

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;'
			><strong>¡Error!</strong> Editorial no fué eliminada</p>";

		}
	
	} else {

		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>¡Error!</strong> Ingrese un código de editorial para eliminar</p>";

	}

 ?>