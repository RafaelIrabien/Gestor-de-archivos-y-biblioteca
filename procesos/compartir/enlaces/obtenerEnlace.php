<?php 
	require_once "../../../clases/Enlace.php";

	$enlaces = new Enlaces;

	echo json_encode($enlaces->obtenerEnlace($_POST['idEnlace']));
 ?>