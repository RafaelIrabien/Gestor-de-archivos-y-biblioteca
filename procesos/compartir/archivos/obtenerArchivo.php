<?php 
	session_start();
	require_once "../../../clases/Compartir.php";

	$Archivo = new Archivos;

	$idArchivo = $_POST['idArchivo'];

	echo $Archivo->obtenerRutaArchivo($idArchivo);

 ?>