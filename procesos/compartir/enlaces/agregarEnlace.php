<?php 
	session_start();
	require_once "../../../clases/Enlace.php";

	$Enlace = new Enlaces;

	$datos = array(
					"id_usuario" => $_SESSION['id_usuario'],
					"enlace" => $_POST['enlace']
					);

	echo $Enlace->agregarEnlace($datos);

 ?>