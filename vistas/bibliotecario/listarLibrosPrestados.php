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


	$vbusqueda = $_POST["dbusqueda"];

	$query= "
	SELECT DP.id_detalle AS 'CodDp', LI.titulo AS 'Titulo del Libro',PR.nombre_lector AS 'Lector', PR.fecha_entrega AS 'Fecha Entrega', PR.fecha_devolucion AS 'Fecha de Devolución', ES.estado AS 'Estado'
	FROM detalle_prestamos DP
	INNER JOIN libros LI on LI.id_libro = DP.id_libro
	INNER JOIN prestamos PR on PR.id_prestamo = DP.id_prestamo
	INNER JOIN estado ES on ES.id_estado = DP.id_estado
	WHERE
	(LI.titulo LIKE '$vbusqueda%' OR
	PR.nombre_lector LIKE '$vbusqueda%')
	AND (ES.id_estado = 1)
	ORDER BY DP.id_detalle DESC";

	$resultado = $cnmysql->query($query);

	$num_filas = mysqli_num_rows($resultado);

	if ($num_filas > 0) {
		

 ?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
	<title></title>
</head>
<body>



	<table class="table table-hover">
		<theader>
			<tr>
				<th style="text-align: center;">Título</th>
				<th style="text-align: center;">Lector</th>
				<th style="text-align: center;">Fecha entrega</th>
				<th style="text-align: center;">Fecha de devolución</th>
				<th style="text-align: center;">Estado</th>
				<th style="text-align: center;">Acciones</th>
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
				<td><?php echo $fila['Estado']; ?></td>
				<td>

				<!--
					<span class="btn btn-warning btn-sm" style="cursor:pointer" onclick="VModificarLibro(<?php //echo $fila['id_libro']; ?>)">
						<span class="fas fa-edit"></span>
					</span>

					<span class="btn btn-danger btn-sm" style="cursor:pointer" onclick="VEliminarLibro(<?php //echo $fila['id_libro']; ?>)">
						<span class="fas fa-thin fa-trash-can"></span>
					</span>
				-->
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
		echo "No se encontraron resultados";
	}

 	} else {
		header("location:../../index.php");
	}

} else {
	header("location:../inicio.php");
}


  ?>