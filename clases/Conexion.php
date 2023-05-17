<?php 


class Conectar{
	public function conexion(){
		$servidor = "localhost";
		$usuario = "root";
		$password = "Quelafuerzateacompañe";
		$base = "plataforma";

		$conexion = mysqli_connect($servidor, $usuario, $password, $base);
		$conexion->set_charset('utf8mb4');
		return $conexion;
	}
}

 ?>