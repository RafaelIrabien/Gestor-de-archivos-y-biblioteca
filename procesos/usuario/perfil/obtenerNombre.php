<?php 
	require_once "../../../clases/Usuario.php";

	$usuarios = new Usuario;

	echo json_encode($usuarios->obtenerNombreUsuario($_POST['id_Usuario']));


 ?>