<?php

include('conexion.php');

	$vbusqueda = $_POST["dbusqueda"];

$query= "

SELECT LI.id_libro, LI.titulo, AU.nombre as Autor, ED.editorial as Editorial, LI.casillero, LI.cantidad FROM libros LI
INNER JOIN autores AU on AU.id_autor = LI.id_autor

INNER JOIN editoriales ED on ED.id_editorial = LI.id_editorial
WHERE
LI.titulo like '$vbusqueda%' OR
AU.nombre like '$vbusqueda%' OR
ED.editorial like '$vbusqueda%' 
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
				<th style="text-align: center;">Casillero</th>
				<th style="text-align: center;">Cantidad</th>
				<th style="text-align: center;">Acciones</th>
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
				<td><?php echo $fila['casillero']; ?></td>
				<td><?php echo $fila['cantidad']; ?></td>
				<td></td>
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
 ?>