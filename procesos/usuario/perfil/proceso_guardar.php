<?php 
	session_start();
	require_once "../../../clases/Conexion.php";

	$c = new Conectar;
	$conexion = $c->conexion();

	$id_Usuario = $_SESSION['id_usuario'];
	$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

	$sql = "INSERT INTO fotos (id_usuario, foto) VALUES ('$id_Usuario', '$imagen')";
	$resultado = $conexion->query($sql);

	if ($resultado) {
		header("location:../../../vistas/perfil2.php");
	} else {
		echo "Hubo un error al guardar la imagen";
	}

	


 ?>