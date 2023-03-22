<?php 
	session_start();
	require_once "../../../clases/Compartir.php";

	$a = new Archivos;
	
	$idArchivoC = $_POST['idArchivo'];
	$idUsuario = $_SESSION['id_usuario'];
	$nombreArchivo = $a->obtenerNombreArchivo($idArchivoC);

	$rutaEliminar = "../../../archivos/" . $idUsuario . "/Archivos_Compartidos/" . $nombreArchivo;

	if (unlink($rutaEliminar)) {
		echo $a->eliminarArchivo($idArchivoC);
	} else {
		echo 0;
 	}

 ?>
	
