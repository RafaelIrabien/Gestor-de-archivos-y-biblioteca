<?php 
	require_once "../../../clases/Enlace.php";

	$enlaces = new Enlaces;

	$datos = array(
					"id_enlace" => $_POST['id_Enlace'],
					"enlace" => $_POST['EnlaceE']
					);

	echo $enlaces->actualizarEnlace($datos);

 ?>