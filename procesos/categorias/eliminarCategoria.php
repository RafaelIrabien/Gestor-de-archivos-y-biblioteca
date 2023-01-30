<?php 

	session_start();
	require_once "../../clases/Categoria.php";

	$categorias = new Categorias;

	echo $categorias->eliminarCategoria($_POST['idCategoria']);

 ?>