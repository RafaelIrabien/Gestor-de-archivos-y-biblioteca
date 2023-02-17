<?php 
	session_start();

	if (isset($_SESSION['nombre'])) {

		
		
	require_once "../../clases/Conexion.php";

	$c = new Conectar;
	$conexion = $c->conexion();

	$idUsuario = $_SESSION['id_usuario'];

	$sql = "SELECT id_archivo, id_usuario, nombre, tipo, ruta FROM archivos";

	$result = mysqli_query($conexion, $sql);
	

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="../../librerias/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap_4/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
	<link rel="stylesheet" type="text/css" href="../../librerias/datatable/dataTables.bootstrap4.min.css">


	<title></title>
</head>
<body>

	<div class="tabla">
		<div class="col-sm-7">
			<div class="table-responsive">
				
				<table class="table table-hover" id="tablaArchivosDatatable">
					<br>
					<thead>
						<tr>
							
							<th style="text-align: center;">Nombre</th>
							<th style="text-align: center;">Tipo de archivo</th>
							<th style="text-align: center;">Descargar</th>
						</tr>
					</thead>

					<?php 
						while ($mostrar = mysqli_fetch_array($result)) {

							$rutaDescarga = "../../archivos/".$mostrar['id_usuario']."/".$mostrar['nombre'];
							$nombreArchivo = $mostrar['nombre'];
						
					 ?>

					<tbody>
						<tr>
							
							<td><?php echo $mostrar['nombre']; ?></td>
							<td><?php echo $mostrar['tipo']; ?></td>
							<td>
								<a href="<?php echo $rutaDescarga; ?>" download="<?php $nombreArchivo ?>" class="btn btn-success btn-sm">
									<span class="fas fa-download"></span>
								</a>
							</td>
						</tr>
					<?php 
						} //Fin de while
					 ?>
					</tbody>

				</table>
<br>
			</div>
		</div>
	</div>





</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaArchivosDatatable').DataTable();
	});
</script>


<?php 

	} else {
		header("location:../../index.php");
	}

 ?>