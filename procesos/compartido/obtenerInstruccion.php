<?php 
	session_start();
	require_once "../../clases/Compartido.php";

	$archivo = new Archivo;

	$idArchivo = $_POST['idArchivo'];

	echo $archivo->obtenerInstruccion($idArchivo);

 ?>