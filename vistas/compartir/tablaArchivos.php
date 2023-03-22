
<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		
	
	require_once "../../clases/Conexion.php";
	
	//Requerimos el id del usuario
	$id_Usuario = $_SESSION['id_usuario'];

	//Instaciamos la clase Conexion
	$conexion = new Conectar;

	//Llamamos al método conexion()
	$conexion = $conexion->conexion();
	$sql = "SELECT id_archivo_compartir, nombre, tipo, ruta FROM archivos_compartir WHERE id_usuario = '$id_Usuario' ";
	$result = mysqli_query($conexion, $sql);

	$sql2 = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
	$result2 = mysqli_query($conexion, $sql2);
	$fila = mysqli_fetch_array($result2);

	if ($fila['id_rol'] == '2') {
		
	

 ?>


	<div class="tabla">
	<div class="col-sm-10">
	<div class="table-responsive">
		<h1 class="display-4">Archivos</h1>
		<br>
			<div id="btn">
				<span class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalCompartir">
				  <span class="fa-solid fa-file-arrow-up"></span>
				 	Agregar archivo
				</span>
			</div>

		<table class="table table-hover" id="tablaArchivosDatatable">
			<thead>
				 <tr>
				 	<th style="text-align: center;">Nombre</th>
					<th style="text-align: center;">Tipo</th>
					<th style="text-align: center;">Acciones</th>
				 </tr>
			</thead>
			<br>
			
			<tbody>
				<?php 
				//Arreglo de extensiones validas
				$extensionesValidas = array(
											'png',
											'jpg',
											'pdf',
											'mp4',
											'mp3',
											'flac'
												);

				
				//Bucle que se repite las veces que sean necesarias
				while ($mostrar = mysqli_fetch_array($result)) {
					$nombreArchivo = $mostrar['nombre'];
					$rutaDescarga = "../archivos/" . $id_Usuario . "/Archivos_Compartidos/" . $nombreArchivo;
					$idArchivoC = $mostrar['id_archivo_compartir'];
			 	?>
			
				<tr>
					<td><?php echo $nombreArchivo; ?></td>
					<td><?php echo $mostrar['tipo']; ?></td>
					<td>
					
						<a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
							<span class="fas fa-download"></span>
						</a>

						<?php 
							for ($i=0; $i < count($extensionesValidas) ; $i++) { 
								if ($extensionesValidas[$i] == $mostrar['tipo']) {
									
							
						 ?>

						<span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalVisualizarArchivos" onclick="obtenerArchivoPorId('<?php echo $idArchivoC; ?>')">
							<span class="fas fa-eye"></span>
						</span>

						<?php 
								}
							}
						 ?>
				    
						<span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivoC; ?>')">
							<span class="fas fa-thin fa-trash-can"></span>
					</span>
				    </td>
				</tr>

				<?php 
					} //Fin del while
				 ?> 
			</tbody>
		</table>
		<br>
	</div>
  </div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaArchivosDatatable').DataTable();
		});
	</script>


<?php 
	} else {
		header("location:../inicio.php");
	}


	}else {
		header("location:../../index.php");
	}

 ?>