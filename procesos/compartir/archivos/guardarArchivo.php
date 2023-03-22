<?php 
	session_start();
	require_once "../../../clases/Compartir.php";

	$archivos = new Archivos;

	$idUsuario = $_SESSION['id_usuario'];

	if ($_FILES['archivos']['size'] > 0) {
		//Creamos una ruta donde esté el id del secretario
		//y se almacenen los archivos a compartir
		$carpetaArchivosC = '../../../archivos/' . $idUsuario . '/Archivos_Compartidos';

		//Si no existe la carpeta entonces la creamos
		if (!file_exists($carpetaArchivosC)) {
			mkdir($carpetaArchivosC, 0777, true);
		}

		//Todos los archivos que bengan en un total
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
			$rutaFinal = $carpetaArchivosC . '/' . $nombreArchivo;

			$datosRegistroArchivo = array(
										  "idUsuario" => $idUsuario,
										  "Nombre" => $nombreArchivo,
										  "Tipo" => $tipoArchivo,
										  "Ruta" => $rutaFinal
											);
			//Hacemos que se suban los archivos
			//Si sube un archivo, entonces que meta un registro en la BD
			if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
				$respuesta = $archivos->agregarArchivo($datosRegistroArchivo);
			}
		} //Fin de for

		echo $respuesta;
	} else {
		echo 0;
	}


 ?>