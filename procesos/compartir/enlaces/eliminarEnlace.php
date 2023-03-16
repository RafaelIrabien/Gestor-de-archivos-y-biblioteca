<?php 
	session_start();
	require_once "../../../clases/Enlace.php";

	$enlaces = new Enlaces;

	echo $enlaces->eliminarEnlace($_POST['idEnlace']);



 ?>