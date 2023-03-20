<?php 
	session_start();
	require_once "../../clases/Compartido.php";

	$Archivo = new Archivo;

	$idArchivo = $_POST['idArchivo'];

	echo $Archivo->obtenerRutaArchivo($idArchivo);

 ?>