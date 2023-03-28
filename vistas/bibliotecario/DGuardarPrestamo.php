<?php 
	include('conexion.php');

	$dLector = $_POST['Lector'];
	$dFechaDevolucion = $_POST['fechaDevolucion'];
	$dCodLibro = $_POST['CodLibro'];


	if (!empty($dLector) && !empty($dFechaDevolucion) && !empty($dCodLibro)) {
		

		/*
		//Verificamos si hay libros disponibles según el elegido
		$sql = "SELECT disponible FROM stock_libros WHERE id_libro = '$dCodLibro'";

		$result = $cnmysql->query($sql);
		$dato = mysqli_fetch_array($result);

		$cantidad = $dato['disponible'];

		if ($cantidad <= 0) {
			echo "<p
			style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
			><strong>Error!: </strong>No hay libros disponibles...</p>";
			exit();
		}  

		*/


		$sql_2 = "INSERT INTO prestamos(nombre_lector, fecha_entrega, fecha_devolucion) VALUES( '$dLector', CURDATE(), '$dFechaDevolucion')";

		$result_2 = $cnmysql->query($sql_2);


		if ($result_2) {
			
			$query = "SELECT disponibles FROM libros WHERE id_libro = '$dCodLibro'";
			$resultado = $cnmysql->query($query);

			$fila = mysqli_fetch_array($resultado);
			$Disponible = $fila['disponibles'];

			$cantidadNueva = abs($Disponible - 1);

			$query_2 = "UPDATE libros SET disponibles = '$cantidadNueva' WHERE id_libro = '$dCodLibro'";
			$resultado_2 = $cnmysql->query($query_2);




			$sql_3 = "SELECT id_prestamo FROM prestamos ORDER BY id_prestamo DESC LIMIT 1";
			$result_3 = $cnmysql->query($sql_3);
			$dato = mysqli_fetch_array($result_3);
			$idPrestamo = $dato['id_prestamo'];


			$sql_4 = "INSERT INTO detalle_prestamos(id_libro, id_prestamo, id_estado, Fecha_Retorno) VALUES('$dCodLibro', '$idPrestamo', '1', 'NULL')";
			$result_4 = $cnmysql->query($sql_4);

			if ($result_4) {
				echo "<p
				style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;'
				><strong>¡Éxito!: </strong> El préstamo ha sido guardado</p>";
			} else {
				echo "<p
				style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
				><strong>¡Error!: </strong>Los datos presentan errores, verifique por favor</p>";
			}
		}


	} else {
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;'
		><strong>¡Error!: </strong>Falta ingresar datos</p>";
	}

 ?>