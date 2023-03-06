<?php 

	require_once "../../../clases/Usuario.php";

	$u = new Usuario;
	echo json_encode($u->obtenerFotoPerfil($_POST['idFoto']));
 ?>