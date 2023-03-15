<?php 
	require_once "../../../clases/Usuario.php";

	$usuarios = new Usuario;

	$datos = array(
				"id_usuario" => $_POST['id_Usuario'],
				"nombre" => $_POST['Nombre'],
				"email" => $_POST['Email']
				  );

	echo $usuarios->actualizarNombreUsuario($datos);

 ?>