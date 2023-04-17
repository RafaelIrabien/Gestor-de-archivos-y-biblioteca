<?php
include('conexion.php');



$dCodLector = $_POST['codLector'];


if (!empty($dCodLector)) {

	$query = " 
	SELECT  LE.nombre, PR.fecha_devolucion, DP.id_estado FROM detalle_prestamos DP
	INNER JOIN prestamos PR ON PR.id_prestamo = DP.id_prestamo
	INNER JOIN lectores LE ON LE.id_lector = PR.id_lector
	WHERE LE.nombre LIKE '$dCodLector%' AND
	
	DP.id_estado = 1";

	$resultado = $cnmysql->query($query);

	$existente = mysqli_num_rows($resultado);

	if ($existente <= 0) {


		echo "<p
		style='	background-color: #8FE397;
				padding: 10px;
				box-sizing: border-box;
				color: #1D7034;
				border:2px dotted #4DA459;
				text-align: center;'
		><strong>Observaciones:</strong> El lector no tiene libros pendientes </p>";
	}else{
		echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>Obsercaciones:</strong> El lector tiene libros pendientes </p>";
	}


}else{
	echo "<p
		style='	background-color: #EE9393;
				padding: 10px;
				box-sizing: border-box;
				color: #E33E3E;
				border:2px dotted #E33E3E;
				text-align: center;'
		><strong>¡Error!</strong> Ingrese nombre del lector</p>";
}




?>