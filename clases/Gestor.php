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

			$sql = "DELETE FROM archivos WHERE id_archivo = ? ";

			//Prepara la instrucción SQL para su ejecución mediante el método prepare() del objeto de conexion de la BD.
			$query = $c->prepare($sql);

			//Vincula el valor entero de $idArchivo al marcador de posición 'i' en la instrucción SQL. Esto se hace para evitar ataques de inyección SQL.
			$query->bind_param('i', $idArchivo);

			//Se llama al método execute() en el objeto de declaración preparado para ejecutar la declaración SQL. El resultado de la ejecución se almacena en la variable $result y se devuelve a la persona que llama. A continuación, la consulta se cierra con el método close().
			$result = $query->execute();
			$query->close();

			return $result;
		}



	}

 ?>