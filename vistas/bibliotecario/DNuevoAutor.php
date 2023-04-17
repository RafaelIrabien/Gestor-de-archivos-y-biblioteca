<?php  
	include('conexion.php');

	$dAutor = $_POST['vautor'];

	if (!empty($dAutor)) {
		
		$sql = "INSERT INTO autores (nombre) VALUES ('$dAutor')";
		$result = $cnmysql->query($sql);

		if ($result) {

			echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;
				text-align: center;'
		><strong>¡Éxito!</strong> Autor Agregado exitosamente</p>";
		} else {
				echo "<p
				style='	background-color: #EE9393;
						padding: 10px;
						box-sizing: border-box;
						color: #E33E3E;
						border:2px dotted #E33E3E;
						text-align: center;'
				><strong>¡Error!</strong> Autor no fué agregado</p>";
	}


	} else {
	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>¡Error!</strong> Ingrese un autor para Agregar</p>";
}





?>