<?php 
	session_start();
	include('conexion.php');

	$id_Usuario = $_SESSION['id_usuario'];
   

  	$sql1 = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
  	$result1 = $cnmysql->query($sql1);
  	$fila1 = mysqli_fetch_array($result1);
	 // $id = $fila['id_usuario'];
	if($fila1['id_rol'] == '3') {

	 if(isset($_SESSION['nombre'])) {


	 	$nombreLector = $_POST['dbusqueda'];

	$query= "
	SELECT DP.id_detalle AS 'CodDp', LI.titulo AS 'Titulo del Libro', LE.nombre AS 'Lector', PR.fecha_entrega AS 'Fecha Entrega',PR.fecha_devolucion AS 'Fecha de Devolución', DP.Fecha_Retorno AS 'Fecha de Retorno'
	FROM detalle_prestamos DP
	INNER JOIN libros LI ON LI.id_libro = DP.id_libro
	INNER JOIN prestamos PR ON PR.id_prestamo = DP.id_prestamo
	INNER JOIN estado ES ON ES.id_estado = DP.id_estado
	INNER JOIN lectores LE ON LE.id_lector = PR.id_lector
	WHERE
	LE.nombre LIKE '$nombreLector%'
	AND
	ES.id_estado = '2';
 ";


	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {
		

 ?>




<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
	<title></title>
</head>
<body>

	<table class="table table-hover">
		<theader>
			<tr>
				<th style="text-align: center;">Título</th>
				<th style="text-align: center;">Lector</th>
				<th style="text-align: center;">Fecha de entrega</th>
				<th style="text-align: center;">Fecha de devolución</th>
				<th style="text-align: center;">Fecha de retorno</th>
				<th style="text-align: center;">Eliminar</th>
			</tr>

		<tbody>

			<?php 
				while ($fila = mysqli_fetch_array($resultado)) {
			 ?>
			<tr>
				<td><?php echo $fila['Titulo del Libro']; ?></td>
				<td><?php echo $fila['Lector']; ?></td>
				<td><?php echo $fila['Fecha Entrega']; ?></td>
				<td><?php echo $fila['Fecha de Devolución']; ?></td>
				<td><?php echo $fila['Fecha de Retorno']; ?></td>

				<td>
					<span class="btn btn-danger btn-sm" onclick="VEliminarLibroDevuelto(<?php echo $fila['CodDp']; ?>)">
						<span class="fas fa-thin fa-trash-can"></span>
					</span>
				</td>
			</tr>
			<?php 
				}
			 ?>
		</tbody>
		</theader>
	</table>

</body>
</html>


 <?php 

 		}else{
		echo "No Se Encontraron resultados";
	}

 	} else {
		header("location:../../index.php");
	}

} else {
	header("location:../inicio.php");
}


  ?>