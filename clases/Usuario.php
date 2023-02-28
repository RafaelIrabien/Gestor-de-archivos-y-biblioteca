<?php 

require_once "Conexion.php";


class Usuario extends Conectar{
	public function agregarUsuario($datos){
		//Mandamos a llamar a la conexión
		$conexion = Conectar::conexion();

		//self quiere decir que esta mandando a llamar un metodo sobre la misma clase
		//Si esto es verdad o si ya existe retorna un 2, de lo contrario registra
		if (self::buscarUsuarioRepetido($datos['nombre'])) {
			return 2; 
		} else if (self::buscarCorreoRepetido($datos['correo'])) {
			return 2;
		} else {

			$sql = "INSERT INTO usuarios (id_rol,
										  nombre,
									      email,
									      password)
		                   VALUES (?, ?, ?, ?)";

			//prepare() es un metodo del api de mysqli
			$query = $conexion->prepare($sql);

			//Este es donde vamos a agregar todos los datos que vienen aqui
			//Hay que agregar el tipo de dato que va a cachar (nombre es 	string, entonces se pone una s)
			$query->bind_param('isss',  $datos['idRol'],
									  	$datos['nombre'],
								  	  	$datos['correo'],
								  	  	$datos['password']
								  	  );

			//Se ejecuta el query y lo cerremos
			$exito = $query->execute();
			$query->close();
        	return $exito;

		}

		
	}



	//Metodo para buscar en la BD si existe un usuario
	public function buscarUsuarioRepetido($nombre) {
			$conexion = Conectar::conexion();

			$sql = "SELECT nombre FROM usuarios WHERE nombre = '$nombre'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if ($datos != "" || $datos == $nombre) {
				return 1;
			
			} else {
				return 0;
			}
			
		}


	//Metodo para buscar en la BD si existe un correo
	public function buscarCorreoRepetido($correo) {
			$conexion = Conectar::conexion();

			$sql = "SELECT email FROM usuarios WHERE email = '$correo' ";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if ($datos != "" || $datos == $correo) {
				return 1;
			
			} else {
				return 0;
			}
			
		}


	public function login($nombre, $password){
		$conexion = Conectar::conexion();

		$sql = "SELECT COUNT(*) AS existeUsuario FROM usuarios WHERE nombre = '$nombre' AND password = '$password' ";

		$result = mysqli_query($conexion, $sql);

		//Esto nos esta regresando un contador de registros, si existe un registro con los parametros (nombre y password) con eso es suficiente
		$respuesta = mysqli_fetch_array($result)['existeUsuario'];

		if ($respuesta > 0) {
			//Creamos una sesión de usuario y un id para el usuario
			$_SESSION['nombre'] = $nombre;

			$sql = "SELECT id_usuario, id_rol FROM usuarios WHERE nombre = '$nombre' AND password = '$password' ";
			$result = mysqli_query($conexion, $sql);
			$idUsuario = mysqli_fetch_array($result)['id_usuario'];

			$_SESSION['id_usuario'] = $idUsuario;
			

			return 1;
		} else {
			return 0;
		}
	}


	public function guardarImagen(){
	$conexion = Conectar::conexion();
	//Decimos que extraiga la imagen en bits
	//Vamos a recuperar la imagen por el metodo $_FILES
	//Recuperamos el nombre que tiene la imagen (tmp_name)
	$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

	$sql = "INSERT INTO usuarios(imagen) VALUES('$Imagen')";

	//Almacene la imagen en nuestra BD
	$resultado = $conexion->query($sql);

	if ($resultado) {
		echo "Si se insertó";
	} else {
		echo "No se insertó";
	}

	}

	

	public function agregarFotoPerfil($datos) {
		$conexion = Conectar::conexion();
		
		$sql = "INSERT INTO fotos (id_usuario, foto) VALUES (?, ?)";

		$query = $conexion->prepare($sql);

		$query->bind_param("is", $datos["idUsuario"],
								 $datos["Foto"]);

		$respuesta = $query->execute();
		$query->close();
		return $respuesta;
	}





} //Fin de la clase Usuarios

 ?>