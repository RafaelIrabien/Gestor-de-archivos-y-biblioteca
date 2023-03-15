<?php 
	session_start();
	require_once "../../../clases/Conexion.php";

	$c = new Conectar;
	$conexion = $c->conexion();


	$id = $_SESSION['id_usuario'];

	$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


	$sql = "UPDATE fotos SET foto='$imagen' WHERE id_usuario='$id'";

	$resultado = $conexion->query($sql);

	if ($resultado) {
		echo "Foto actualizada con éxito";
		header("location:../../../vistas/perfil2.php");

	} else {
		echo "Hubo problemas al modificar";
	} 

	

 ?>