<?php 
	session_start();
	require_once "../../../clases/Compartir.php";

	$Enlace = new Enlaces;

	$datos = array(
					"id_usuario" => $_SESSION['id_usuario'],
					"enlace" => $_POST['Enlace'],
					"instruccion" => $_POST['instruccion']
					);

	echo $Enlace->agregarEnlace($datos);

 ?>