<?php 

	require_once "Conexion.php";

	class Roles extends Conectar {
		 public function obtenerRoles($idRol) {
		 	$conexion = Conectar::conexion();

		 	$sql = "SELECT id_rol, rol FROM roles WHERE id_rol = '$idRol'";

    		$result = mysqli_query($conexion, $sql);

    		$fila = mysqli_fetch_array($result);

    		$datos = array(
					 "idRol" => $fila['id_rol'],
					 "Rol" => $fila['rol']
							);
			return $datos;

			echo $datos($_SESSION['idRol']);
		 }
	}



 ?>