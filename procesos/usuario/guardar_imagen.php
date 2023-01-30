<?php 

	include("conexion.php");

	//Decimos que extraiga la imagen en bits
	//Vamos a recuperar la imagen por el metodo $_FILES
	//Recuperamos el nombre que tiene la imagen (tmp_name)
	$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

	$sql = "INSERT INTO usuarios(imagen) VALUES('$Imagen')";

	//Almacene la imagen en nuestra BD
	$resultado = $conexion->query($sql);

	if ($resultado) {
		echo "Si se insertó";
	} else {
		echo "No se insertó";
	}

 ?>