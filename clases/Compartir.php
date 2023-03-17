<?php 

	require_once "Conexion.php";

	class Enlaces extends Conectar {

		public function agregarEnlace($datos) {
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO enlaces (id_usuario, enlace) VALUES (?, ?)";

			$query = $conexion->prepare($sql);
			$query->bind_param("is", $datos['id_usuario'],
									 $datos['enlace']);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}


		public function obtenerEnlace($idEnlace) {
			$conexion = Conectar::conexion();

			$sql = "SELECT id_enlace, enlace FROM enlaces WHERE id_enlace = '$idEnlace'";

			$result = mysqli_query($conexion, $sql);
			$enlace = mysqli_fetch_array($result);

			$datos = array(
					      "idEnlace" => $enlace['id_enlace'],
					      "Enlace" => $enlace['enlace']	
						   );
			return $datos;
		}



		public function actualizarEnlace($datos) {
			$conexion = Conectar::conexion();

			$sql = "UPDATE enlaces SET enlace = ? WHERE id_enlace = ?";

			$query = $conexion->prepare($sql);
			$query->bind_param("si", $datos['enlace'],
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


	} // Fin de la clase Enlaces





	class Archivos extends Conectar {

		public function agregarArchivo($datos) {
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO archivos_compartir (id_usuario, nombre, tipo, ruta) VALUES (?, ?, ?, ?)";

			$query = $conexion->prepare($sql);
			$query->bind_param("isss", $datos["idUsuario"],
									   $datos["Nombre"],
									   $datos["Tipo"],
									   $datos["Ruta"]);
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


	} //Fin de la clase Archivos


 ?>