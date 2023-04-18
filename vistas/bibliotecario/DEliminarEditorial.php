<?php 
	include('conexion.php');

	$dCod = $_POST['vcod'];

	if (!empty($dCod)) {

		$sql_2 = "SELECT id_editorial FROM libros WHERE id_editorial = '$dCod'";

		$result_2 = mysqli_query($cnmysql, $sql_2);

		// Verificar si el id de la editoria existe en la tabla "libros"
		if (mysqli_num_rows($result_2) > 0) {

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;
					text-align: center;'
			><strong>¡Error!</strong> La editorial está siendo utilizada en uno o varios libros</p>";
		} else {
		

		$sql = "DELETE FROM editoriales WHERE id_editorial = '$dCod'";
		$query = $cnmysql->prepare($sql);
		$result = $query->execute();

		if (mysqli_affected_rows($cnmysql) > 0 && $result) {
			
			echo "<p
			style='	background-color: #8FE397;
					padding: 10px;
					box-sizing: border-box;
					color: #1D7034;
					border:2px dotted #4DA459;
					text-align: center;'
			><strong>¡Éxito!</strong> Editorial fué eliminada</p>";

		} else {

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;
					text-align: center;'
			><strong>¡Error!</strong> Editorial no fué eliminada</p>";

		}

		$query->close();
		return $result;

	  }


	
	} else {

		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>¡Error!</strong> Ingrese un código de editorial para eliminar</p>";

	}

 ?>