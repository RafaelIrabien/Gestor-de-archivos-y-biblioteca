<?php  
	include('conexion.php');

	$dCod = $_POST['vcod'];
	$dAutor = $_POST['vautor'];

	if (!empty($dAutor) && !empty($dCod)) {
		

		$sql = "UPDATE autores SET nombre = '$dAutor' WHERE id_autor = '$dCod'";

		$result = $cnmysql->query($sql);

		if ($result) {
			
			echo "<p
			style='	background-color: #8FE397;
					padding: 10px;
					box-sizing: border-box;
					color: #1D7034;
					border:2px dotted #4DA459;'
			><strong>¡Exito!</strong> Autor fué modificado</p>";

		} else {

			echo "<p
			style='	background-color: #EE9393;
					padding: 10px;
					box-sizing: border-box;
					color: #E33E3E;
					border:2px dotted #E33E3E;'
			><strong>Error!</strong> Autor no fue modificado</p>";

		}
	} else {

		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>Error!</strong> Ingrese un código y un autor para modificar</p>";

	}

?>