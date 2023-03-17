<?php 
	session_start();
	require_once "../../../clases/Compartir.php";

	$enlaces = new Enlaces;

	echo $enlaces->eliminarEnlace($_POST['idEnlace']);



 ?>