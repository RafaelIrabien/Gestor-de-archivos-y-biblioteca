<?php 
	require_once "Conexion.php";

	class Archivo extends Conectar {

		public function obtenerRutaArchivo($idArchivo) {
			$conexion = Conectar::conexion();

			$sql = "SELECT id_usuario, nombre, tipo, ruta FROM archivos_compartir WHERE id_archivo_compartir = '$idArchivo'";

			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			$nombreArchivo = $datos['nombre'];
			$Tipo = $datos['tipo'];
			$id_Usuario = $datos['id_usuario'];

			return self::tipoArchivo($id_Usuario, $nombreArchivo, $Tipo);
		}


		public function tipoArchivo($idUsuario, $nombre, $tipo) {
		//Devuelve una etiqueta img con la fuente establecida en una ruta de archivo construida a partir de la ID de sesión del usuario y el nombre dado.

		
		$ruta = "../archivos/" . $idUsuario . "/Archivos_Compartidos/" . $nombre;

		//Si la extensión del archivo es jpg o alguna extensión permitida, la función devuelve una etiqueta HTML img con el origen establecido en la ruta del archivo construido. Si la extensión no es ninguna de las permitidas, la función no hace ni devuelve nada.
		switch ($tipo) {
			case 'jpg':
				return '<img src="'.$ruta.'" width="50%" style="margin: auto; display: block;">';
				break;

				case 'png':
					return '<img src="'.$ruta.'" width="50%" style="margin:auto;
        display:block;">';
					break;

				case 'png':
					
					break;

				case 'pdf':
					return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';

					break;

				case 'mp4':
					return '<video src="'. $ruta .'" controls width="50%" style="margin:auto; display:block;"></video>';
					break;

				case 'mp3':
					return '<audio src="'. $ruta .'" controls width="500" height="200" type="audio/mpeg" style="margin:auto; display:block;"></audio>';
					break;

				case 'flac':
					return '<audio src="'. $ruta .'" controls width="500" height="200" type="audio/mpeg" style="margin:auto; display:block;"></audio>';
					break;

				case 'doc':
					return '<iframe src="wordpress.com/viewer?url='.$ruta.'&embedded=true" width="600" height="780" style="border: none;"></iframe>'; 
					break;


				default:

				break;
		}

	}


	} //Fin de la clase Archivo
	

 ?>