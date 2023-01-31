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



	}

 ?>