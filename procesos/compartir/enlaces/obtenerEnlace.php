<?php 
	require_once "../../../clases/Compartir.php";

	$enlaces = new Enlaces;

	echo json_encode($enlaces->obtenerEnlace($_POST['idEnlace']));
 ?>