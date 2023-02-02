<?php 

	session_start();
	require_once "../../clases/Gestor.php";

	$archivo = new Gestor;
	$idArchivo = $_POST['idArchivo'];
	$idUsuario = $_SESSION['id_usuario'];
	$nombreArchivo = $archivo->obtenerNombreArchivo($idArchivo);

	$rutaEliminar = "../../archivos/" . $idUsuario . "/" . $nombreArchivo;

	if (unlink($rutaEliminar)) {
		echo $archivo->eliminarArchivo($idArchivo);
	} else {
		echo 0;
	}


 ?>