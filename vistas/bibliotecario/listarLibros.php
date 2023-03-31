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

SELECT LI.id_libro, LI.titulo, AU.nombre as Autor, ED.editorial as Editorial, GE.genero as Genero, LI.casillero, LI.cantidad, LI.disponibles FROM libros LI
INNER JOIN autores AU on AU.id_autor = LI.id_autor
INNER JOIN editoriales ED on ED.id_editorial = LI.id_editorial
INNER JOIN generos GE on GE.id_genero = LI.id_genero
WHERE
LI.titulo like '$vbusqueda%' OR
AU.nombre like '$vbusqueda%' OR
ED.editorial like '$vbusqueda%' OR
GE.genero like '$vbusqueda%'
ORDER BY LI.id_libro DESC;
"
;


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
				<th style="text-align: center;">Código</th>
				<th style="text-align: center;">Título</th>
				<th style="text-align: center;">Autor</th>
				<th style="text-align: center;">Editorial</th>
				<th style="text-align: center;">Género</th>
				<th style="text-align: center;">Casillero</th>
				<th style="text-align: center;">Cantidad</th>
				<th style="text-align: center;">Disponibles</th>
				<th colspan="2" style="text-align: center;">Acciones</th>
			</tr>

		<tbody>

			<?php 
				while ($fila = mysqli_fetch_array($resultado)) {
			 ?>
			<tr>
				<td><?php echo $fila['id_libro']; ?></td>
				<td><?php echo $fila['titulo']; ?></td>
				<td><?php echo $fila['Autor']; ?></td>
				<td><?php echo $fila['Editorial']; ?></td>
				<td><?php echo $fila['Genero']; ?></td>
				<td><?php echo $fila['casillero']; ?></td>
				<td><?php echo $fila['cantidad']; ?></td>
				<td><?php echo $fila['disponibles']; ?></td>
				<td>
					<span class="btn btn-warning btn-sm" style="cursor:pointer" onclick="VModificarLibro(<?php echo $fila['id_libro']; ?>)">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" style="cursor:pointer" onclick="VEliminarLibro(<?php echo $fila['id_libro']; ?>)">
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
		echo "No Se Encontraron resultados... en libros";
	}

	
	} else {
		header("location:../../index.php");
	}

} else {
	header("location:../inicio.php");
}
 ?>