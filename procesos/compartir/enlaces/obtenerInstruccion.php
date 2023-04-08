<?php 
	session_start();
	require_once "../../../clases/Compartir.php";

	$Enlace = new Enlaces;

	$idEnlace = $_POST['idEnlace'];

	echo $Enlace->obtenerInstruccion($idEnlace);

 ?>