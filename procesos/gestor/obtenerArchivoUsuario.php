<?php 

	require_once "../../clases/Gestor.php";

	$archivosUsuario = new Gestor;

	echo json_encode($archivosUsuario->obtenerArchivoUsuario($_POST['idUsuario']));


 ?>