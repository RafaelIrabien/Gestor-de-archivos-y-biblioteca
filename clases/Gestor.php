<?php 

	require_once "Conexion.php";

	class Gestor extends Conectar{
		public function agregarRegistroArchivo($datos){

			$conexion = Conectar::conexion();

			$sql = "INSERT INTO archivos (id_usuario, id_categoria, nombre, tipo, ruta) VALUES (?, ?, ?, ?, ?)";

			//prepare es para evitar inyecciones sql
			$query = $conexion->prepare($sql);

			$query->bind_param("iisss", $datos["idUsuario"],
										$datos["idCategoria"],
										$datos["nombreArchivo"],
										$datos["tipo"],
										$datos["ruta"]);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}


		public function obtenerNombreArchivo($idArchivo) {
			$conexion = Conectar::conexion();
			$sql = "SELECT nombre FROM archivos WHERE id_archivo = '$idArchivo' ";
			$resultado = mysqli_query($conexion, $sql);
			
			//El nombre va a servir para poder acceder a la ruta
			return mysqli_fetch_array($resultado)['nombre'];
		}



		public function eliminarArchivo($idArchivo){
			$c = Conectar::conexion();

			$sql = "DELETE * FROM archivos WHERE id_archivo = ? ";

			//Prepara la instrucción SQL para su ejecución mediante el método prepare() del objeto de conexion de la BD.
			$query = $c->prepare($sql);

			//Vincula el valor entero de $idArchivo al marcador de posición 'i' en la instrucción SQL. Esto se hace para evitar ataques de inyección SQL.
			$query->bind_param('i', $idArchivo);

			//Se llama al método execute() en el objeto de declaración preparado para ejecutar la declaración SQL. El resultado de la ejecución se almacena en la variable $result y se devuelve a la persona que llama. A continuación, la consulta se cierra con el método close().
			$result = $query->execute();
			$query->close();

			return $result;
		}


		public function obtenerRutaArchivo($idArchivo) {
			$conexion = Conectar::conexion();

			$sql = "SELECT nombre, tipo FROM archivos WHERE id_archivo = '$idArchivo'";
			// El resultado de la consulta se almacena en la variable "$result"
			$result = mysqli_query($conexion, $sql);
			//Las columnas "nombre" y "tipo" se obtienen en un arreglo "$datos"
			$datos = mysqli_fetch_array($result);
			//Se les asignan los valores de las columnas "nombre" y "tipo", 
			$nombreArchivo = $datos['nombre'];
			$extension = $datos['tipo'];

			return self::tipoArchivo($nombreArchivo, $extension);
		}



		public function tipoArchivo($nombre, $extension) {
			//Devuelve una etiqueta img con la fuente establecida en una ruta de archivo construida a partir de la ID de sesión del usuario y el nombre dado.
			$id_Usuario = $_SESSION['id_usuario'];
			$ruta = "../archivos/" . $id_Usuario . "/" . $nombre;

			//Si la extensión del archivo es jpg o alguna extensión permitida, la función devuelve una etiqueta HTML img con el origen establecido en la ruta del archivo construido. Si la extensión no es ninguna de las permitidas, la función no hace nada ni devuelve nada.
			switch ($extension) {
				case 'jpg':
					return '<img src="'.$ruta.'" width="50%" style="margin:auto;
        display:block;">';
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
					// code...
					break;
			}
		}



		public function obtenerArchivoUsuario($idUsuario) {
			$conexion = Conectar::conexion();

			$sql = "SELECT id_archivo, id_usuario, nombre, tipo, ruta FROM archivos WHERE id_usuario = '$idUsuario'";

			$result = mysqli_query($conexion, $sql);

			$resultados = array();


			while ($archivo = mysqli_fetch_array($result)) {
			
			$datos = array(
						"idArchivo" => $archivo['id_archivo'],
						"idUsuario" => $archivo['id_usuario'],
						"Nombre" => $archivo['nombre'],
						"Tipo" => $archivo['tipo'],
						"Ruta" => $archivo['ruta']
							);
				
			$resultados[] = $datos;

			}

			mysqli_close($conexion);

			return $resultados;
			
			
		}

	}

 ?>