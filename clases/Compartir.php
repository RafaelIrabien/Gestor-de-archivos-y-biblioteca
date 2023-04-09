<?php 

	require_once "Conexion.php";

	class Enlaces extends Conectar {

		public function agregarEnlace($datos) {
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO enlaces (id_usuario, enlace, instruccion) VALUES (?, ?, ?)";

			$query = $conexion->prepare($sql);
			$query->bind_param("iss", $datos['id_usuario'],
									  $datos['enlace'],
									  $datos['instruccion']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}


		public function obtenerEnlace($idEnlace) {
			$conexion = Conectar::conexion();

			$sql = "SELECT id_enlace, enlace, instruccion FROM enlaces WHERE id_enlace = '$idEnlace'";

			$result = mysqli_query($conexion, $sql);
			$enlace = mysqli_fetch_array($result);

			$datos = array(
					      "idEnlace" => $enlace['id_enlace'],
					      "Enlace" => $enlace['enlace'],
					      "Instruccion" => $enlace['instruccion']
						   );
			return $datos;
		}



		public function actualizarEnlace($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE enlaces SET enlace = ?, instruccion = ? WHERE id_enlace = ?";

			$query = $conexion->prepare($sql);
			$query->bind_param("ssi", $datos['enlace'],
									  $datos['instruccion'],
									  $datos['id_enlace']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}


		public function eliminarEnlace($idEnlace) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM enlaces WHERE id_enlace = ?";

			$query = $conexion->prepare($sql);
			$query->bind_param("i", $idEnlace);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}


		public function obtenerInstruccion($idEnlace) {
			$conexion = Conectar::conexion();

			$sql = "SELECT instruccion FROM enlaces WHERE id_enlace = '$idEnlace'";

			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			$Instruccion = $datos['instruccion'];
			return $Instruccion;
		}


	} // Fin de la clase Enlaces





	class Archivos extends Conectar {

		public function agregarArchivo($datos) {
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO archivos_compartir (id_usuario, nombre, tipo, ruta, instruccion) VALUES (?, ?, ?, ?, ?)";

			$query = $conexion->prepare($sql);
			$query->bind_param("issss", $datos["idUsuario"],
									    $datos["Nombre"],
									    $datos["Tipo"],
									    $datos["Ruta"],
									    $datos["Instruccion"]);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}


		public function obtenerNombreArchivo($idArchivo) {
			$c = Conectar::conexion();

			$sql = "SELECT nombre FROM archivos_compartir WHERE id_archivo_compartir = '$idArchivo'";

			$resultado = mysqli_query($c, $sql);

			//El nombre va a servir para poder acceder a la ruta
			return mysqli_fetch_array($resultado)['nombre'];
		}



		public function eliminarArchivo($idArchivo) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM archivos_compartir WHERE id_archivo_compartir = ?";

			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idArchivo);

			$result = $query->execute();
			$query->close();

			return $result;
		}



		public function obtenerRutaArchivo($idArchivo) {
			$conexion = Conectar::conexion();

			$sql = "SELECT nombre, tipo FROM archivos_compartir WHERE id_archivo_compartir = '$idArchivo'";

			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			$nombreArchivo = $datos['nombre'];
			$Tipo = $datos['tipo'];

			return self::tipoArchivo($nombreArchivo, $Tipo);
		}


		public function tipoArchivo($nombre, $tipo) {
		//Devuelve una etiqueta img con la fuente establecida en una ruta de archivo construida a partir de la ID de sesión del usuario y el nombre dado.
		$id_Usuario = $_SESSION['id_usuario'];
		$ruta = "../archivos/" . $id_Usuario . "/Archivos_Compartidos/" . $nombre;

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


	public function obtenerInstruccion($idArchivo) {
			$conexion = Conectar::conexion();

			$sql = "SELECT instruccion FROM archivos_compartir WHERE id_archivo_compartir = '$idArchivo'";

			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			$Instruccion = $datos['instruccion'];
			return $Instruccion;
		}


  } //Fin de la clase Archivos


 ?>