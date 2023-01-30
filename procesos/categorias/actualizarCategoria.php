<?php 

	require_once "../../clases/Categoria.php";

	$categorias = new Categorias;

	$datos = array(
				"id_categoria" => $_POST['id_Categoria'],
				"categoria" => $_POST['categoriaU'] 
					);

	echo $categorias->actualizarCategoria($datos);

 ?>