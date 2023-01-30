<?php 

	require_once "../../clases/Categoria.php";

	$categorias = new Categorias;

	//Convertimos el array $datos a un json para que podamos tratarlo en el js
	echo json_encode($categorias->obtenerCategoria($_POST['idCategoria']));

 ?>