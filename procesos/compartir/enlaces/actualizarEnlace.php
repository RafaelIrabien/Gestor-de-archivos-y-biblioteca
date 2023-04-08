<?php 
	require_once "../../../clases/Compartir.php";

	$enlaces = new Enlaces;

	$datos = array(
					"id_enlace" => $_POST['id_Enlace'],
					"enlace" => $_POST['EnlaceE'],
					"instruccion" => $_POST['InstruccionE']
					);

	echo $enlaces->actualizarEnlace($datos);

 ?>