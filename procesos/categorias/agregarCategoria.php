<?php 
	
	session_start();
	require_once "../../clases/Categoria.php";

	$Categorias = new Categorias();

	$datos = array (
					"id_usuario" => $_SESSION['id_usuario'],
					"categoria" => $_POST['categoria']
					);

	echo $Categorias->agregarCategoria($datos);

 ?>