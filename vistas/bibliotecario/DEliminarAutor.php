<?php 
	include('conexion.php');

	$dCod = $_POST['vcod'];

	if (!empty($dCod)) {
		
		$sql_2 = "SELECT id_autor FROM libros WHERE id_autor = '$dCod'";
		$result_2 = $cnmysql->query($sql_2);

		if ($result_2->num_rows > 0) {

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;
					text-align: center;'
			><strong>¡Error!</strong> Autor está siendo utilizado</p>";
		} else {



		$sql = "DELETE FROM autores WHERE id_autor = '$dCod'";
		$result = $cnmysql->query($sql);

		

		if (mysqli_affected_rows($cnmysql) > 0 && $result) {
			
		echo "<p
			style='	background-color: #8FE397;
					padding: 10px;
					box-sizing: border-box;
					color: #1D7034;
					border:2px dotted #4DA459;
					text-align: center;'
			><strong>¡Éxito!</strong> Autor fué eliminado</p>";

		}else{

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;
					text-align: center;'
			><strong>¡Error!</strong> Autor no fué eliminado</p>";

		}


	}


		


}else{

	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>¡Error!</strong> Ingrese un código de autor para eliminar</p>";
}


 ?>		