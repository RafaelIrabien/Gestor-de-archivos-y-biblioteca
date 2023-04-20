<?php
	include('conexion.php');

	$dCod = $_POST['txtcod'];
	$dTitulo = $_POST['txttitulo'];
	$dAutor = $_POST['cboautor'];
	$dEditorial = $_POST['cboeditorial'];
	$dGenero = $_POST['cbogenero'];
	$dUbicacion = $_POST['txtubicacion'];
	$dCantidad = $_POST['txtejemplar'];
	$dDisponible = $_POST['txtdisponible'];

	$sql_1 = "SELECT * FROM detalle_prestamos WHERE id_libro = '$dCod' AND id_estado = 1";
	$resultado = $cnmysql->query($sql_1);
	$cantidad = mysqli_num_rows($resultado);
	
	if ($dCantidad < $cantidad) {
		echo "<p
		style='	background-color: #EE9393;
			padding: 10px;
			box-sizing: border-box;
			color: #E33E3E;
			border:2px dotted #E33E3E;
			text-align: center;'
		><strong>¡Error!</strong> No puede ingresar menor número de ejemplares, porque el número de prestados excede a este.</p>";
	exit();
}

	
	if ($resultado) {
		
		$nuevaCantidad = $dDisponible - $cantidad;
		$query = "UPDATE libros SET disponibles = '$nuevaCantidad'WHERE id_libro = '$dCod'";

		$respuesta = $cnmysql->query($query);
	} 

	$sql = "UPDATE libros SET titulo = '$dTitulo', id_autor = '$dAutor', id_editorial = '$dEditorial', id_genero = '$dGenero', cantidad = '$dCantidad', disponibles = '$dDisponible', casillero = '$dUbicacion' WHERE id_libro = '$dCod'";

	$result = $cnmysql->query($sql);


		include('V_Libro.php');
	
	




?>





<?php 

// Incluir el archivo de conexión
require_once('conexion.php');

function actualizar_cantidad_ejemplares($dCod, $dCantidad) {
  // Obtener los valores del formulario
  $dCod = $_POST['cod'];
  $dCantidad = $_POST['cantidad'];

  // Consulta para obtener el número de ejemplares actualmente en préstamo
  $sql1 = "SELECT COUNT(*) FROM detalle_prestamos WHERE id_libro = $dCod AND estado = 1";
  $result1 = mysqli_query($cnmysql, $sql1);

  // Obtener el número de filas devueltas
  $num_filas = mysqli_num_rows($result1);

  // Si hay filas, comprobar si la cantidad a añadir es menor que la cantidad en préstamo
  if ($num_filas > 0) {
    $num_ejemplares_prestamo = mysqli_fetch_array($result1)[0];
    if ($dCantidad < $num_ejemplares_prestamo) {
      // Generar un mensaje de error y salir
      echo "Error: No se pueden añadir menos ejemplares de los que están actualmente en préstamo.";
      exit();
    }
  }

  // Calcular la nueva cantidad de ejemplares disponibles
  $sql2 = "SELECT num_ejemplares FROM libros WHERE id = $dCod";
  $result2 = mysqli_query($cnmysql, $sql2);
  $num_ejemplares = mysqli_fetch_array($result2)[0];
  $nueva_cantidad = $num_ejemplares - $num_ejemplares_prestamo;

  // Actualizar la cantidad de ejemplares disponibles en la base de datos
  $sql3 = "UPDATE libros SET num_ejemplares_disponibles = $nueva_cantidad WHERE id = $dCod";
  mysqli_query($cnmysql, $sql3);

  // Actualizar la tabla de libros con los detalles actualizados
  $sql4 = "UPDATE libros SET titulo = '$_POST[titulo]', autor = '$_POST[autor]', num_ejemplares = '$_POST[num_ejemplares]', num_ejemplares_disponibles = '$nueva_cantidad' WHERE id = $dCod";
  mysqli_query($cnmysql, $sql4);

  // Incluir el archivo de vista para mostrar los detalles actualizados del libro
  include('V_Libro.php');
}

 ?>