<?php 
	session_start();
	require_once "../../../clases/Usuario.php";

	$usuarios = new Usuario;

	echo $usuarios->eliminarUsuario($_POST['id_Usuario']);


 ?>