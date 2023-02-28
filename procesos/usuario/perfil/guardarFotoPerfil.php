<?php 
	session_start();
	require_once "../../../clases/Usuario.php";

	$Perfil = new Usuario;
	$idUsuario = $_SESSION['id_usuario'];

	if ($_FILES['archivos']['size'] > 0) {
		//Creamos una ruta en la que esté el ID de usuario
		//y la carpeta en la que se almacenará la foto de perfil
		$carpetaPerfilUsuario = '../../../archivos/'.$idUsuario.'/Foto_Perfil';

		//Si no existe la carpeta entonces la creamos
		if (!file_exists($carpetaPerfilUsuario)) {
			mkdir($carpetaPerfilUsuario, 0777, true);
		}

		//Todos los archivos que vengan en un total
		$totalFotos = count($_FILES['archivos']['name']);

		for ($i=0; $i < $totalFotos; $i++) { 
			$nombreFoto = $_FILES['archivos']['name'][$i];

			//Para la extensión de la imagen
			$explode = explode('.', $nombreFoto);
			$tipoImagen = array_pop($explode);

			//Todas las imágenes que se suban estarán guardadas en el tmp_name
			$rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];

			$rutaFinal = $carpetaPerfilUsuario. "/" . $nombreFoto;

			$datosRegistroFoto = array(
									"idUsuario" => $idUsuario,
									"Foto" => $nombreFoto
										);

			//Hacemos que se suban los archivos
			//Si sube un archivo, entonces que meta un registro en la BD
			if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
				$respuesta = $Perfil->agregarFotoPerfil($datosRegistroFoto);
			}
		} //Fin de for
		echo $respuesta;
	} else {
		echo 0;
	}



 ?>