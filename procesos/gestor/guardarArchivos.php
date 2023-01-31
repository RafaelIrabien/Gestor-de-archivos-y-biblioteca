<?php 

	session_start();
	require_once "../../clases/Gestor.php";

	$Gestor = new Gestor();
	//Primero hay que obtener lo que es del select de categorias
	$idCategoria = $_POST['categoriasArchivos'];
	$idUsuario = $_SESSION['id_usuario'];

	
	if ($_FILES['archivos']['size'] > 0) {
		//Creamos una ruta donde esté el id de usuario
		//La carpeta en la que se almacenarán
		$carpetaUsuario = '../../archivos/'.$idUsuario;

		//Si no existe la carpeta entonces la creamos
		if (!file_exists($carpetaUsuario)) {
			mkdir($carpetaUsuario, 0777, true);
		}

		//Todos los archivos que vengan en un total
		$totalArchivos = count($_FILES['archivos']['name']);

		for ($i=0; $i < $totalArchivos; $i++) {
			$nombreArchivo = $_FILES['archivos']['name'][$i];
			//Para la extensión o tipo de archivo
			//explode() se encarga de dividir o separar una cadena
			$explode = explode('.', $nombreArchivo);
			//array_pop() extrae el último elemento del final del array
			$tipoArchivo = array_pop($explode);

			//Todos los archivos que subamos estarán guardados en el tmp_name
			$rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
			
			$rutaFinal = $carpetaUsuario. "/" . $nombreArchivo;

			$datosRegistroArchivo = array(
										"idUsuario" => $idUsuario,
										"idCategoria" => $idCategoria,
										"nombreArchivo" => $nombreArchivo,
										"tipo" => $tipoArchivo,
										"ruta" => $rutaFinal
											);

			//Hacemos que se suban los archivos
			//Si sube un archivo, entonces que meta un registro a la BD
			if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
				$respuesta = $Gestor->agregarRegistroArchivo($datosRegistroArchivo);
			}
		} //Fin de for

		echo $respuesta;

	} else {
		echo 0;
	}
	
 ?>