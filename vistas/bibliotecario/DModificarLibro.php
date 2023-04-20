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
	$copias_prestadas = 0;
	
	
  // Consulta para obtener el número de ejemplares actualmente en préstamo
  $sql1 = "SELECT COUNT(*) AS copias_prestadas FROM detalle_prestamos WHERE id_libro = '$dCod' AND id_estado = 1";
  $result1 = mysqli_query($cnmysql, $sql1);

  $fila = mysqli_fetch_assoc($result1);
	$copias_prestadas = $fila["copias_prestadas"];


  // Validación de la cantidad de copias a agregar

    if ($dDisponible < $copias_prestadas) {
      // Generar un mensaje de error y salir
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


    // Cálculo del nuevo número de copias disponibles
		$copias_disponibles = $dCantidad - $copias_prestadas;

		if ($copias_disponibles != $dCantidad) {
  			$copias_disponibles = $dCantidad - $copias_prestadas;
}
  


  // Actualizar la tabla de libros con los detalles actualizados
  $sql4 = "UPDATE libros SET titulo = '$dTitulo', id_autor = '$dAutor', id_editorial = '$dEditorial', id_genero = '$dGenero', cantidad = '$dCantidad', disponibles = '$copias_disponibles', casillero = '$dUbicacion' WHERE id_libro = '$dCod'";
  
  mysqli_query($cnmysql, $sql4);

  // Incluir el archivo de vista para mostrar los detalles actualizados del libro
  include('V_Libro.php');

  mysqli_close($cnmysql);

 ?>