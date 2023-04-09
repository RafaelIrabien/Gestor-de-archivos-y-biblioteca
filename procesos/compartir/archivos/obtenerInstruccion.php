<?php 
	session_start();
	require_once "../../../clases/Compartir.php";

	$archivo = new Archivos;

	$idArchivo = $_POST['idArchivo'];

	echo $archivo->obtenerInstruccion($idArchivo);

 ?>